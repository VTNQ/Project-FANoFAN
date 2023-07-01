<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class CeilingFanController extends Controller
{
    //

    public function ShowProduct1()
    {
        $data = DB::table('product')->where('id_category', '=', '12')->join('category', 'product.id_category', '=', 'category.id')->join('photo', 'product.id_product', '=', 'photo.id_product')->get();
        return view('index.CeilingFan')->with('product', $data);
    }






    public function ShowProduct($id_product)
    {
       
        

        
        $data2 = DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->join('category', 'product.id_category', '=', 'category.id')->where('product.id_product', $id_product)->first();
        $data3=DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product',$id_product)->get();
        $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
      
        $feedback=DB::table('feedback')->select('*')->get();
        $show_comment=DB::table('user')->join('feedback','user.id','=','feedback.id_user')->join('product','feedback.id_product','=','product.id_product')->select('*')->where('product.id_product',$id_product)->get();
        return view('index.CeilingFan')->with('photo', $data2)->with('data3',$data3)->with('category',$category)->with('Show_comment',$show_comment)->with('feedback',$feedback);
    }


    public function addFeedback(Request $request, $id_product)
    {
        $fee=new feedback;
        $feedback = $request->input('Message');
        $id = Session::get('id');
        if(Session::get('id')){
            $fee->id_user=$id;
            $fee->id_product=$id_product;
            $fee->comment=$feedback;
            $fee->date_to=Carbon::now('Asia/Ho_Chi_Minh');
            $fee->save();
            return redirect()->back();
        }
         
        
    }
    public function categories_list($id){
        $row=DB::table('category')->join('product','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->where('category.id',$id)->get();
        $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
        return view('index.categories_list')->with('category',$category)->with('row',$row);
    }
}
