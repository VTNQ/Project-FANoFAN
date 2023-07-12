<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    //

    public function filter(Request $request)
    {
        //code here
        $param = $request->id;
        if (isset($param)) {
            if ($param == 1) {
                $data = 'money';
                $sort = 'desc';
            } elseif ($param == 4) {
                $data = 'name_product';
                $sort = 'asc';
            } elseif ($param == 3) {
                $data = 'name_product';
                $sort = 'desc';
            } elseif ($param == 2) {
                $data = 'money';
                $sort = 'asc';
            }

            $data2 = DB::table('photo')->select('*')
                ->join('product', 'photo.id_product', '=', 'product.id_product')
                ->join('category', 'product.id_category', '=', 'category.id')
                ->where('status', 1)
                ->orderBy($data, $sort)
                ->get();
            $category = DB::table('category')
                ->orderBy('id', 'DESC')
                ->select('*')
                ->get();
            $htmlGroupTable = view('index.all_product', [
                'photo' => $data2,
                'avatar' => $data2,
                'category' => $category,
            ])->render();
            return ['htmlGroupTable' => $htmlGroupTable];
            return view('index.all_product')
                ->with('photo', $data2)
                ->with('avatar', $data2)
                ->with('category', $category);

        }
        $data_session = session()->get('id');
        if (!$data_session) {
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->join('category', 'product.id_category', '=', 'category.id')->where('status', 1)->get();
            $category = DB::table('category')->orderBy('id', 'DESC')->select('*')->get();
            return view('index.categories_list')->with('photo', $data2)->with('avatar', $data2)->with('category', $category);
        } elseif ($data_session) {
            $avatar = DB::table('user')->select('*')->where('id', $data_session)->first();
            $category = DB::table('category')->orderBy('id', 'DESC')->select('*')->get();
            $data2 = DB::table('photo')->select('*')->join('product', 'photo.id_product', '=', 'product.id_product')->where('photo.status', '1')->join('category', 'product.id_category', '=', 'category.id')->paginate(5);
            return view('user.categories_list')->with('avatar', $avatar)->with('photo', $data2)->with('category', $category);
        }
    }
}
