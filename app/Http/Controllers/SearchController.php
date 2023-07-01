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
        $category=DB::table('category')->orderBy('id','DESC')->select('*')->get();
        $product = DB::table('product')->join('photo', 'photo.id_product', '=', 'product.id_product')->where('product.name_product', 'like', '%' . $get_name . '%')->orwhere('product.money','like','%' .$get_name. '%')->select('*')->get();
        return view('index.search')->with('product', $product)->with('category',$category);
    }
}
