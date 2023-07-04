<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function product()
    {
        if (session('username_admin') and session('id_admin')) {
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $list_category = DB::table('category')->select('*')->get();
            $list_product = DB::table('product')->select('*')->get();
            return view('Product.add_product')->with('list_category', $list_category)->with('list_product', $list_product)->with('list_photo', $list_photo);
        } else {
            return redirect('/login');
        }

    }

    public function show_add_product()
    {
        if (session('username_admin') and session('id_admin')) {
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->orderBy('id_product', 'DESC')->select('*')->paginate(5);
            if ($key = request()->key) {
                $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->select('*')->where('product.name_product', 'like', '%' . $key . '%')->paginate(5);
                $totalProduct = $list_product->lastItem();
                return view('product.filter_product')->with('list_product', $list_product)->with('list_photo', $list_photo)->with('totalProduct',$totalProduct);
            } else {
                $totalProduct = $list_product->count();
                return view('product.list_product')->with('list_product', $list_product)->with('list_photo', $list_photo)->with('totalProduct',$totalProduct);
            }
        }else{
            return redirect('/login');
        }

    }


    public function add_product(Request $request)
    {
        $data = array();
        $request->validate(['nameProduct' => 'required', 'Price' => 'required', 'description' => 'required']);
        $data['name_product'] = $request->nameProduct;
        $data['id_category'] = $request->category;
        $data['money'] = $request->Price;
        $data['content'] = $request->description;
        DB::table('product')->insert($data);

        return redirect('/add_Product')->with('success', 'add Product success');
    }

    public function delete_product($id)
    {


        DB::table('product')->where('id_product', $id)->delete();

        return redirect('/list_product')->with('success', 'delete Product success');
    }

    public function edit_product($id_product)
    {
        $data_last = session()->get('value_admin');
        $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
        $student = DB::table('product')->select('*')->where('id_product', $id_product)->get();
        $list_category = DB::table('category')->select('*')->get();
        return view('Product.edit_product')->with('student', $student)->with('list_category', $list_category)->with('list_photo', $list_photo);
    }

    public function update_product(Request $request, $id_product)
    {
        $data = array();

        $data['name_product'] = $request->nameProduct;
        $data['id_category'] = $request->category;
        $data['money'] = $request->Price;
        $data['content'] = $request->description;

        DB::table('product')->where('id_product', $id_product)->update($data);
        return redirect('/list_product')->with('success', 'update product success');
    }

    public function detail_product($id_product)
    {
        $data_last = session()->get('value_admin');
        $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
        $data = DB::table('product')->select('*')->join('photo', 'product.id_product', '=', 'photo.id_product')->join('category', 'product.id_category', '=', 'category.id')->where('product.id_product', $id_product)->first();
        $data1 = DB::table('product')->select('*')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product', $id_product)->get();
        return view('Product.detail_product')->with('data', $data)->with('data1', $data1)->with('list_photo', $list_photo);
    }

    public function delete_all_product(Request $request)
    {
        $ids = $request->ids;
        $product = DB::table('product')->where('id_product', $ids)->delete();
        return response()->json();
    }
}

