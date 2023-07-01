<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmail;
use App\Models\Photo;
use App\Models\product;

use App\Models\UserModel;

class AdminController extends Controller
{
    //return page admin
    public function dashboard(){
        if(session('username_admin',null) and session('id_admin',null)){
            $data_last = session()->get('value_admin');
            $product=product::all()->count();
           $category=DB::table('category')->count();
           $photo=Photo::all()->count();
           $feedback=DB::table('feedback')->count();
           $user=DB::table('user')->where('user_type','usr')->count();
           $count=DB::table('feedback')->join('user','feedback.id_user','=','user.id')->groupBy('user.username')->select('user.username',DB::raw('count(*) as total'))->limit(3)->get();
           $new_product=DB::table('product')->join('category','product.id_category','=','category.id')->select('*')->orderBy('id_product','DESC')->limit(3)->get();
            $list_photo = DB::table('user')->select('*')->where('user.avatar', $data_last)->first();
            $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->orderBy('id_product','desc')->select('*')->paginate(5);
            return view('admin.admin')->with('last',$list_product)->with('list_photo',$list_photo)->with('product',$product)->with('category',$category)->with('photo',$photo)->with('feedback',$feedback)->with('user',$user)->with('count',$count)->with('new_product',$new_product);
        }else{
            return redirect ('/login');
        }

    }
    //xu ly page register
    public function register(){
        return view('register');
    }
    public function addRegister(Request $request){
        $request->validate(['Name'=>'required|unique:user,username','Email'=>'required|unique:user,email|email','Phone'=>'required|min:10|max:10','Password'=>'min:6']);
        $task = new UserModel();
        $task->username=$request->Name;
        $task->email = $request->Email;
        $task->phone=$request->Phone;
        $task->password=md5($request->Password);
        $task->user_type='usr';
        $task->save();
        $users = UserModel::all();
        $message = [
            'type' => 'Create task',
            'task' => $task->username,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $users)->delay(now()->addSeconds(5));


        return redirect()->back();
    }

    //tra ve page login
    public function check_login(Request $request){
        $Email=$request->email;
        $Password=md5($request->password);
        $result=DB::table('user')->where('email',$Email)->where('password',$Password)->where('user_type','adm')->first();
        $result2=DB::table('user')->where('email',$Email)->where('password',$Password)->where('user_type','usr')->first();
        if($result){
            Session::put('username_admin',$result->username);
            Session::put('id_admin',$result->id);
            Session::put('value_admin',$result->avatar);
            return redirect('/admin/dashboard');
        }elseif($result2){
            Session::put('member',$result2->username);
            Session::put('id',$result2->id);
            Session::put('value',$result2->avatar);
            Session::put('password',$result2->password);
            return redirect('/');
        }else{
            Session::put('message','Email or Password is wrong.Please Enter Again');
            return redirect('/login');
        }
    }
    public function login(){
        return view('login');
    }
    //xu ly logout xoa name va id
    public function logout(){
        Session::put('username_admin',null);
        Session::put('id_admin',null);
        return redirect('login');
    }
    public function logout1(){
        Session::put('member',null);
            Session::put('id',null);
            Session::put('value',null);
        return redirect('/');
    }
    
}