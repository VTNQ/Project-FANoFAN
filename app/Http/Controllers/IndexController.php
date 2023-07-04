<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    //
    public function index()
    {
        $data_session = session()->get('id');
        if (!$data_session) {

            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->join('category', 'product.id_category', '=', 'category.id')->where('status',1)->get();
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            return view('index.index')->with('photo', $data2)->with('list_photo', $list_photo)->with('category',$category);
        }elseif($data_session){

            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->where('photo.status','1')->join('category', 'product.id_category', '=', 'category.id')->paginate(5);
            return view('user.Home')->with('list_photo',$list_photo)->with('photo',$data2)->with('category',$category);
        }
    }
    public function about(){
        $data_session = session()->get('id');
        if(!$data_session){
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            return view('index.about')->with('category',$category);
        }elseif($data_session){
            $data_last = session()->get('value');
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            $list_photo = DB::table('user')->join('photo', 'user.id_photo', '=', 'photo.id_photo')->select('*')->where('user.id_photo', $data_last)->first();
            return view('user.About')->with('list_photo', $list_photo)->with('category',$category);
        }
    }
    public function contact(){
        $data_session = session()->get('id');

        if(!$data_session){
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            return view('index.contact')->with('category',$category);
        }elseif($data_session){
            $data_last = session()->get('value');
            $name=session()->get('member');
            $email=session()->get('email');
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            return view('user.Contact')->with('list_photo', $list_photo)->with('category',$category)->with('email',$email)->with('name',$name);
        }
    }
   public function postContact(Request $request){
    $data_session = session()->get('id');
    if(!$data_session){
        Mail::send('mails.contact',['name'=>$request->name,'email'=>$request->email,'content'=>$request->message],function($mail) use($request){
            $mail->to('tranp6648@gmail.com');
            $mail->from($request->email);
            $mail->subject('contact');
        });
        session()->flash('success','Contact sent successfully');
        return redirect()->back();
    }else if($data_session){
        Mail::send('mails.contact',['name'=>$request->name,'email'=>$request->email,'content'=>$request->message],function($mail) use($request){
            $mail->to('tranp6648@gmail.com');
            $mail->from($request->email);
            $mail->subject('contact');
        });
        session()->flash('success','Contact sent successfully');
        return redirect()->back();
    }
   }
}
