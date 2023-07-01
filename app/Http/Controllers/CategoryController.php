<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function save_category(Request $request){
        $data=array();
        $data['name']=$request->name_category;
        DB::table('category')->insert($data);
        return redirect('/profile_category')->with('success','add category success');
    }
    public function update(Request $request, $id){
        $data=array();
        $data['name']=$request->name_category;


        DB::table('category')->where('id',$id)->update($data);
        return redirect('/profile_category')->with('success','update category success');
        }
    public function delete($id){
        $category=DB::table('category')->where('id',$id);
        $category->delete();
        return redirect('/profile_category');
    }
    public function delete_all(Request $request){
        $ids=$request->ids;
        $category=DB::table('category')->where('id',$ids)->delete();
        return response()->json(["success"=>"category have been deleted"]);
    }
    //view edit
    public function edit($id){
        $student=DB::select('select * from category where id=?',[$id]);
        $data_last = session()->get('value');
        $list_photo = DB::table('user')->join('photo', 'user.id_photo', '=', 'photo.id_photo')->select('*')->where('user.id_photo', $data_last)->first();

        return view('category.edit')->with('student',$student)->with('list_photo',$list_photo);
    }
    public function list_category(){
        if(session('username_admin') and session('id_admin')){
            $all_list_login=DB::table('category')->orderBy('id','DESC')->paginate(5);
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            if($key=request()->key){
                $all_list_login=DB::table('category')->where('name','like','%'.$key.'%')->paginate(5);
            }
            return view('category.profile_category')->with('all_list_login',$all_list_login)->with('list_photo',$list_photo );
           
        }else if(Session('member') and session('id')){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
       
    }
}
