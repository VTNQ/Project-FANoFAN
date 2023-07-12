<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecycleBinController extends Controller
{
    public function recycle_bin_product(){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $recycle_product=DB::table('product')->join('photo','photo.id_product','=','product.id_product')->join('category','category.id','=','product.id_category')->where('product.deleted_at','=',!null)->get();
            return view('recycle_bin.recycle_bin_product')->with('recycle_product',$recycle_product)->with('list_photo',$list_photo);
        }

    }
}
