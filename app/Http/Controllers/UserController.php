<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data_last = session()->get('value');
        $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
        return view('user.User')->with('list_photo', $list_photo);
    }

    public function my_account()
    {
        if(session('member') && session('id')){
            $data_session = session()->get('id');
            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            $list_user = DB::select('select username,password,email,phone from user where id=?', [$data_session]);
            return view('user.my_account')->with('list_user', $list_user)->with('list_photo', $list_photo);
        }else if(session('username_admin') and session('id_admin')){
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    public function EditUsername(request $request)
    {
        $request->validate(['new_username'=>'required|unique:user,username']);
        $data_session = session('id');
        $new_username = $request->input('new_username');
        DB::update('update user set username =? where id=?', [$new_username, $data_session]);
        session()->flash('success', 'UserName Was Update!');
        return redirect('/user/my_account');
    }

    public function EditEmail(request $request)
    {
        $request->validate(['new_email'=>'required|unique:user,email']);
        $data_session = session()->get('id');
        $new_email = $request->input('new_email');
        DB::update('update user set email =? where id=?', [$new_email, $data_session]);
        session()->flash('success', 'Email Was Update!');
        return redirect('/user/my_account');
    }

    public function EditPhone(request $request)
    {
        $request->validate(['new_phone'=>'required']);
        $data_session = session()->get('id');
        $new_phone = $request->input('new_phone');
        DB::update('update user set phone =? where id=?', [$new_phone, $data_session]);
        session()->flash('success', 'Phone Was Update!');
        return redirect('/user/my_account');
    }

    public function EditPassword(request $request)
    {
        $request->validate(['old_password'=>'required','new_password'=>'required|min:8','re_new_password'=>'required|min:8']);
        $data_session = session()->get('id');
        $old_password = md5($request->old_password);
        $new_password = md5($request->new_password);
        $re_new_password = md5($request->re_new_password);
        $password = DB::table('user')->where('password', $old_password)->first();
        if ($password and $new_password == $re_new_password) {
            DB::update('update user set password=? where id=? ', [$new_password, $data_session]);
            Session()->flash('message', 'Reset Password success');
            return redirect('/user/my_account');
        } else if (!$password and $new_password == $re_new_password) {
            Session()->flash('old', 'Old password incorrect');
            return redirect('/user/my_account');
        } else if ($password and $re_new_password !== $new_password) {
            Session()->flash('accept', 'New password does not match the re-enter Password ');
            return redirect('/user/my_account');
        } else if (!$password and $new_password !== $re_new_password) {
            Session()->flash('same', 'Old password and re-enter password is incorrect');
            return redirect('/user/my_account');
        }
    }

    public function history_feedback()
    {
        if(!Session('id') && !Session('member')){
           return redirect('login');
        }else if(Session('id') and Session('member')){
            $data_session = session()->get('id');
            $data_feedback=DB::table('feedback')->join('product','product.id_product','=','feedback.id_product')->join('user','user.id','=','feedback.id_user')->join('photo','photo.id_product','=','product.id_product')->where('user.id','=',$data_session)->where('photo.status','=',1)->orderBy('feedback.date_to','DESC')->select('*')->paginate(5);
            return view('user.history_feedback')->with('data_feedback', $data_feedback);
        }

    }
    public function upload_photo(Request $request){
        $request->validate(['fileImg'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048']);
        $data=array();
        $id_user=session()->get('id');
        $get_image=$request->file('fileImg');
        if($get_image){
            $get_name_image= $get_image->getClientOriginalExtension();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99). '.' .$get_image->getClientOriginalExtension();
            $get_image->move('upload',$new_image);
            $data['avatar']=$new_image;
            DB::table('user')->where('id',$id_user)->update($data);

            return redirect('user/my_account')->with('success','update Photo success');
        }


        return redirect('user/my_account')->with('failed','update Photo failed');
    }
}
