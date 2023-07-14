<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PhotoController extends Controller
{
    //
    public function add_photo()
    {
        if(session('username_admin') and session('id_admin')){
            $list_product = DB::table('product')->select('*')->get();
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            return view('photo.add_picture')->with('list_product', $list_product)->with('list_photo',$list_photo);
        }else if(session('username') and session('id')){
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    public function save_photo(Request $request)
    {
        $data = array();
        $exits = DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product', $request->id_product)->whereNotExists(function ($query) {
            $query->select('status')->from('table2')->where('status', '=', 1);
        });






            $request->validate(['fileImg' => 'required|image|max:2048']);
           $data['status'] = $request->status;
           if($request->status==='1' ){
               return redirect('/add_photo')->with('error','Add photo failed');

           }else if($request->status==='0' ){
               echo 'last';
               $data['id_product'] = $request->product;
               $get_image = $request->file('fileImg');
               if ($get_image) {
                  $upload_path = '/upload/';
                   $new_image = $upload_path . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                   $get_image->move('upload', $new_image);
                   $data['value'] = $new_image;
                   DB::table('photo')->insert($data);
                   return redirect('add_photo')->with('success', 'add Photo success');
               }
               $data['value'] = '';
               DB::table('photo')->insert($data);
               return redirect('add_photo')->with('success', 'add Photo success');

           }

        }


    public function show_photo()
    {
        if(session('username_admin') and session('id_admin')){
            $photo = DB::table('photo')->join('product', 'product.id_product', '=', 'photo.id_product')->where('photo.deleted_at','=',null)->select('*')->orderBy('photo.id_photo','Desc')->paginate(5);
            $data_last = session()->get('value_admin');
            if($key=request()->key){
                $photo = DB::table('photo')->join('product', 'product.id_product', '=', 'photo.id_product')->where('photo.deleted_at','=',null)->select('*')->where('product.name_product','like','%'.$key.'%')->paginate(5);
            }
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            return view('photo.list_picture')->with('photo', $photo)->with('list_photo',$list_photo);
        }else{
            return redirect()->back();
        }

    }

    public function unlike($id_photo)
    {
        $id_product=DB::table('photo')->where('id_photo','=',$id_photo)->select('*')->first();
        $list_item=DB::table('photo')->where('id_product','=',$id_product->id_product)->where('status','=',1)->select('id_photo')->first();

        DB::update('update photo set status=? where id_photo=? and id_product=? and status=?', [0, $id_photo,$list_item->id_photo,1]);
        Session::flash('success','Change status failed');
        return redirect()->back();
    }
    public function like($id_photo)
    {
        $product=DB::table('photo')->where('id_photo',$id_photo)->pluck('id_product')->first();
        DB::table('photo')->where('id_product',$product)->update(['status'=>0]);
        DB::table('photo')->where('id_photo',$id_photo)->update(['status' => 1]);
        return redirect()->back();
    }
    //delete picture
    public function delete_picture($id_photo)
    {
        DB::table('photo')->where('id_photo','=',$id_photo)->update(['deleted_at'=>now()]);
        return back();
    }
    public function delete_all_photo(Request $request){
        $ids=$request->ids;
        DB::table('photo')->where('id_photo','=',$ids)->update(['deleted_at'=>now()]);
        return response()->json();
    }
    public function filter(Request $request){
        $roles=$request->roles;
        $data_last = session()->get('value_admin');
        $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();

       if($roles==''){
        return redirect('show_photo');
       }else {
        $photo=DB::table('photo')->join('product','photo.id_product','=','product.id_product')->select('*')->orderBy('photo.id_photo','DESC')->where('photo.status',$roles)->get();
        return view('photo.filter')->with('photo',$photo)->with('list_photo',$list_photo);
       }



    }
}
