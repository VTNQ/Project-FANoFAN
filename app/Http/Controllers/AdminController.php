<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Jobs\SendEmail;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;
use App\Models\product;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //return page admin
    public function dashboard()
    {
        if (session('username_admin', null) and session('id_admin', null)) {
            $data_last = session()->get('value_admin');
            $product = product::all()->count();
            $category = DB::table('category')->count();
            $photo = Photo::all()->count();
            $feedback = DB::table('feedback')->count();
            $user = DB::table('user')->where('user_type', 'usr')->count();
            $count = DB::table('feedback')->join('user', 'feedback.id_user', '=', 'user.id')->groupBy('user.username')->select('user.username', DB::raw('count(*) as total'))->limit(3)->get();
            $new_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->select('*')->orderBy('id_product', 'DESC')->limit(3)->get();
            $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
            $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->orderBy('id_product', 'desc')->select('*')->paginate(5);
            return view('admin.admin')->with('last', $list_product)->with('list_photo', $list_photo)->with('product', $product)->with('category', $category)->with('photo', $photo)->with('feedback', $feedback)->with('user', $user)->with('count', $count)->with('new_product', $new_product);
        } else {
            return redirect('/login');
        }

    }


    //xu ly page register
    public function register()
    {
        return view('register');
    }

    public function addRegister(Request $request)
    {
        $request->validate(['Name' => 'required|unique:user,username', 'Email' => 'required|unique:user,email|email', 'Phone' => 'required|min:10|max:10', 'Password' => 'min:6']);
        $task = new UserModel();
        $task->username = $request->Name;
        $task->email = $request->Email;
        $task->phone = $request->Phone;
        $task->password = md5($request->Password);
        $task->user_type = 'usr';
        $task->save();
        $users = UserModel::all();
        $message = [
            'type' => 'Create task',
            'task' => $task->username,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $users)->delay(now()->addSeconds(5));


        return redirect('/login');
    }

    //tra ve page login
    public function check_login(Request $request)
    {
        $Email = $request->email;
        $Password = md5($request->password);
        $result = DB::table('user')->where('email', $Email)->where('password', $Password)->where('user_type', 'adm')->first();
        $result2 = DB::table('user')->where('email', $Email)->where('password', $Password)->where('user_type', 'usr')->first();
        if ($result) {
            Session::put('username_admin', $result->username);
            Session::put('id_admin', $result->id);
            Session::put('value_admin', $result->avatar);
            return redirect('/admin/dashboard');
        } elseif ($result2) {
            Session::put('member', $result2->username);
            Session::put('id', $result2->id);
            Session::put('email', $result2->email);
            Session::put('value', $result2->avatar);
            Session::put('password', $result2->password);
            return redirect('/');
        } else {
            Session::put('message', 'Email or Password is wrong.Please Enter Again');
            return redirect('/login');
        }
    }

    public function login()
    {
        return view('login');
    }

    //xu ly logout xoa name va id
    public function logout()
    {
        Session::put('username_admin', null);
        Session::put('id_admin', null);
        return redirect('/');
    }

    public function logout1()
    {
        Session::put('member', null);
        Session::put('id', null);
        Session::put('value', null);
        return redirect('/');
    }
public function feedback(){
    $data_last = session()->get('value_admin');
    $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
    $feedback=DB::table('feedback')->join('user','feedback.id_user','=','user.id')->join('product','feedback.id_product','=','product.id_product')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->get();
    return view('feedback.feedback')->with('list_photo',$list_photo)->with('feedback',$feedback);
}
    public function filter_date(Request $request){
        $data_last = session()->get('value_admin');
        $start_date= $request->start_date;
        $End_date= $request->End_date;

        $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
        $filter=DB::table('feedback')->join('user','feedback.id_user','=','user.id')->join('product','feedback.id_product','=','product.id_product')->join('photo','photo.id_product','=','product.id_product')->whereBetween('feedback.date_to',[$start_date,$End_date])->where('photo.status',  '=',1)->get();
        return view('feedback.filter_date')->with('filter',$filter)->with('list_photo',$list_photo);
    }
public function Change_pass(){
    $data_last = session()->get('value_admin');
    $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
    return view('admin.change_password')->with('list_photo',$list_photo);
}
public function Change_password(Request $request){
   $validator=Validator::make($request->all(),['old_password'=>'required','New_password'=>'required|min:8','re_New_password'=>'required']);
   if ($validator->fails()) {
    return redirect()->back()
        ->withErrors($validator)
        ->withInput();
}
    $data_session = session()->get('id_admin');
        $old_password = md5($request->old_password);
        $new_password = md5($request->New_password);
        $re_new_password = md5($request->re_New_password);
        $password = DB::table('user')->where('password', $old_password)->first();
        if ($password and $new_password == $re_new_password) {
            DB::update('update user set password=? where id=? ', [$new_password, $data_session]);
            Session()->flash('message', 'Reset Password success');
            return redirect('/change_pass');
        } else if (!$password and $new_password == $re_new_password) {
            Session()->flash('old', 'Old password incorrect');
            return redirect('/change_pass');
        } else if ($password and $re_new_password !== $new_password) {
            Session()->flash('accept', 'New password does not match the re-enter Password ');
            return redirect('/change_pass');
        } else if (!$password and $new_password !== $re_new_password) {
            Session()->flash('same', 'Old password and re-enter password is incorrect');
            return redirect('/change_pass');
        }
}
}
