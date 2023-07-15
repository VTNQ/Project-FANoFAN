<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    //
    public function index()
    {
        //code here
        return view('search');
    }
    public function Search(Request $request)
    {
        $get_name = $request->input('search');
        if(!session('id')){
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->where('category.deleted_at','=',null)->get();
            $product=DB::table('product')->join('photo','product.id_product','=','photo.id_product')->where('product.deleted_at','=',Null)->where('photo.deleted_at','=',Null)->where('photo.status','=',1)->where('product.name_product','like','%'.$get_name.'%')->select('*')->get();
            return view('index.Search')->with('product', $product)->with('category',$category);
        }else{
            $data_session = session()->get('id');
            $avatar = DB::table('user')->select('avatar')->where('id', $data_session)->first();
            $category=DB::table('category')->orderBy('id','DESC')->select('*')->where('category.deleted_at','=',null)->get();
            $product=DB::table('product')->join('photo', 'photo.id_product','=','product.id_product')->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->where('photo.status','=',1)->where('product.name_product', 'like', '%'.$get_name.'%')->select('*')->get();
            return view('user.Search')->with('product', $product)->with('category',$category)->with('avatar',$avatar);
        }

    }
}
