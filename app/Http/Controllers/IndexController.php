<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $data_session = session()->get('id');
        if (!$data_session) {
            $data_last = session()->get('value');
            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->join('category', 'product.id_category', '=', 'category.id')->get();
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            return view('index.index')->with('photo', $data2)->with('list_photo', $list_photo)->with('category',$category);
        }elseif($data_session){
            $data_last = session()->get('value');
            $list_photo = DB::table('user')->select('*')->where('id', $data_session)->first();
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->where('photo.status','1')->join('category', 'product.id_category', '=', 'category.id')->get();
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
            return view('index.contact');
        }elseif($data_session){
            $data_last = session()->get('value');
            $list_photo = DB::table('user')->join('photo', 'user.id_photo', '=', 'photo.id_photo')->select('*')->where('user.id_photo', $data_last)->first();
            return view('user.Contact')->with('list_photo', $list_photo);
        }
    }
   
}
