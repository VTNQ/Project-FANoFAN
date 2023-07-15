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
        if ($result     ) {
            Session::put('username_admin', $result->username);
            Session::put('id_admin', $result->id);
            Session::put('value_admin', $result->avatar);
            Session::put('email_admin', $result->email);
            return redirect('/admin/dashboard');
        }elseif($result and session('id')){
            return redirect('/');
        } elseif ($result2) {
            Session::put('member', $result2->username);
            Session::put('id', $result2->id);
            Session::put('email', $result2->email);
            Session::put('value', $result2->avatar);
            return redirect('/');
        } else {
            Session::put('message', 'Email or Password is wrong.Please Enter Again');
            return redirect('/login');
        }
    }

    public function login()
    {
        if(session('id')){
            return  redirect()->back();
        }else{
            return view('login');
        }

    }

    //xu ly logout xoa name va id
    public function logout()
    {
        Session::put('username_admin', null);
        Session::put('id_admin', null);
        Session::put('id_product',null);
        Session::put('id_product1',null);
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
    if (session('username_admin', null) and session('id_admin', null)){
        $data_last = session()->get('value_admin');
        $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
        $feedback=DB::table('feedback')->join('user','feedback.id_user','=','user.id')->join('product','feedback.id_product','=','product.id_product')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->orderBy('feedback.date_to','DESC')->paginate(5);
        if ($key = request()->key){
            $feedback=DB::table('feedback')->join('user','feedback.id_user','=','user.id')->join('product','feedback.id_product','=','product.id_product')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->where('user.username','like','%'.$key.'%')->orwhere('product.name_product','like','%'.$key.'%')->where('photo.status','=',1)->orderBy('feedback.date_to','DESC')->paginate(5);
        }
        return view('feedback.feedback')->with('list_photo',$list_photo)->with('feedback',$feedback);
    }else{
        return redirect('login');
    }

}
public function Change_pass(){
    if(session('username_admin', null) and session('id_admin', null)){
        $data_last = session()->get('value_admin');
        $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
        return view('admin.change_password')->with('list_photo',$list_photo);
    }else{
        return redirect('/login');
    }

}
public function Change_password(Request $request){


    $data_session = session()->get('id_admin');
        $old_password = md5($request->old_password);
        $new_password = md5($request->New_password);
        $re_new_password = md5($request->re_New_password);
        $password = DB::table('user')->where('password', $old_password)->where('user_type','adm')->first();
        if ($password and $new_password == $re_new_password) {
            DB::update('update user set password=? where id=?   ', [$new_password, $data_session]);
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
