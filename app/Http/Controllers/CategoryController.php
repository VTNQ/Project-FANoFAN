<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function save_category(Request $request)
    {
        $request->validate(['name_category'=>'required|unique:category,name']);
        $data = array();
        $data['name'] = $request->name_category;
        DB::table('category')->insert($data);
        return redirect('/profile_category')->with('success', 'add category success');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name_category'=>'required|unique:category,name']);
        $data = array();
        $data['name'] = $request->name_category;


        DB::table('category')->where('id', $id)->update($data);
        return redirect('/profile_category')->with('success', 'update category success');
    }

    public function delete_all(Request $request)
    {
        $ids = $request->ids;
        DB::table('category')->where('id','=',$ids)->update(['deleted_at'=>now()]);
        return response()->json(["success" => "category have been deleted"]);
    }
    public function delete($id)
    {
        DB::table('category')->where('id','=',$id)->update(['deleted_at'=>now()]);
        return redirect('/profile_category');
    }
    public function edit($id)
    {
        if (!session('username_admin') and !session('id_admin')) {
            return redirect('/login');
        } elseif (session('username_admin') and session('id_admin')) {
            $category = DB::select('select * from category where id=?', [$id]);
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->where('avatar', $data_last)->select('*')->first();
            return view('category.edit')->with('category', $category)->with('list_photo', $list_photo);
        }
    }

    public function list_category()
    {
        if (session('username_admin') and session('id_admin')) {
            $all_list_login = DB::table('category')->orderBy('id', 'DESC')->where('deleted_at','=',null)->paginate(5);
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            if ($key = request()->key) {
                $all_list_login = DB::table('category')->where('name', 'like', '%' . $key . '%')->where('deleted_at','=',null)->paginate(5);
            }
            return view('category.profile_category')->with('all_list_login', $all_list_login)->with('list_photo', $list_photo);
        } else{
            return redirect()->back();
        }
    }
}
