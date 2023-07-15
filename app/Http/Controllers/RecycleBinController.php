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
            $recycle_product=DB::table('product')->join('photo','photo.id_product','=','product.id_product')->join('category','category.id','=','product.id_category')->whereNotNull('product.deleted_at')->where('photo.status','=',1)->orderBy('product.deleted_at','DESC')->paginate(10);
            return view('recycle_bin.recycle_bin_product')->with('recycle_product',$recycle_product)->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function recycle_bin_category(){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $recycle_category=DB::table('category')->whereNotNull('category.deleted_at')->orderBy('category.deleted_at','DESC')->paginate(10);
            return view('recycle_bin.recycle_bin_category')->with('recycle_category',$recycle_category)->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function recycle_bin_photo(){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $recycle_photo=DB::table('photo')->join('product','product.id_product','=','photo.id_product')->whereNotNull('photo.deleted_at')->orderBy('photo.deleted_at','DESC')->paginate(10);
            return view('recycle_bin.recycle_bin_photo')->with('recycle_photo',$recycle_photo)->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function restore_product($id_product){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('product')->where('id_product','=',$id_product)->update(['deleted_at'=>null]);
            return redirect('/recycle_bin/product')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function restore_photo($id_photo){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('photo')->where('id_photo','=',$id_photo)->update(['deleted_at'=>null]);
            return redirect('/recycle_bin/photo')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function restore_category($id_category){
        if(session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('category')->where('id','=',$id_category)->update(['deleted_at'=>null]);
            return redirect('/recycle_bin/category')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function delete_product($id_product){
        if (session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('photo')->where('id_product','=',$id_product)->delete();
            DB::table('product')->where('id_product','=',$id_product)->delete();
            return redirect('/recycle_bin/product')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function delete_photo($id_photo){
        if (session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('photo')->where('id_photo','=',$id_photo)->delete();
            return redirect('/recycle_bin/photo')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
    public function delete_category($id){
        if (session('username_admin') && session('id_admin')){
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            DB::table('category')->where('id','=',$id)->delete();
            return redirect('/recycle_bin/category')->with('list_photo',$list_photo);
        }else{
            return redirect('/login');
        }
    }
}
