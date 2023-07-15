<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\product;
use App\Models\Photo;

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

    public function show_list_product()
    {
        if (session('username_admin') and session('id_admin')) {
            $data_last = session()->get('value_admin');
            $list_photo = DB::table('user')->select('*')->where('avatar', $data_last)->first();
            $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->where('product.deleted_at','=',null)->orderBy('id_product', 'DESC')->select('*')->paginate(5);
            if ($key = request()->key) {
                $list_product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->select('*')->where('product.name_product', 'like', '%' . $key . '%')->paginate(5);

                return view('product.filter_product')->with('list_product', $list_product)->with('list_photo', $list_photo);
            } else {
                $values = [
                    'list_photo' => $list_photo,
                    'list_product' =>$list_product,
                ];
                return view('product.list_product', $values);
            }
        }else{
            return redirect('/login');
        }

    }


    public function add_product(Request $request)
    {
        $validator=Validator::make($request->all(),['nameProduct'=>'required|unique:product,name_product','Price'=>'required|numeric|min:0','description'=>'required','Main'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048','file'=>'required','file*.'=>'image|mimes:jpg,png,jpeg,gif,svg|max:3']);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $product=new Product();
        $files=$request->file('file');
        $product=new Product();
        $product->name_product=$request->nameProduct;
        $product->content=$request->description;
        $product->money=$request->Price;
        $product->id_category=$request->category;
       $product->save();
        $list=DB::table('product')->select('*')->orderBy('id_product','DESC')->first();
        Session::put('id_product',$list->id_product);
        $id=Session::get('id_product');
       $image=array();
       $main=$request->file('Main');
       if($main ){
        $upload_path='/upload/';
        $new_image=$upload_path.rand(0,99).'.'.$main->getClientOriginalExtension();

        $main->move('upload',$new_image);
        DB::table('photo')->insert(['value'=>$new_image,'status'=>1,'id_product'=>$id]);
       }
        foreach($files as $file){
            $image_name=md5(rand(1000,10000));
            $ext=strtolower($file->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='/upload/';
            $image_url=$upload_path.$image_full_name;
            $file->move('upload',$image_full_name);

            $image[]=$image_url;


       }
        Photo::insert(['value'=>implode('|',$image),'id_product'=>$id,'status'=>0]);
       $list=DB::table('photo')->select('*')->orderBy('id_product','DESC')->first();
       $hast=Session::put('id_product1',$list->id_product);

       return redirect()->back()->with('hast',$hast)->with('success', 'add Product success');
    }

    public function delete_product($id)
    {
        DB::table('product')->where('id_product','=',$id)->update(['deleted_at'=>now()]);
        return back();
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
        $request->validate(['nameProduct'=>'required|unique:product,name_product','Price'=>'required|numeric|min:0','description'=>'required']);
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
        $Main = DB::table('product')->select('*')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('photo.deleted_at','=',null)->where('product.id_product', $id_product)->where('photo.status','=',1)->first();
        $Extra=DB::table('product')->select('photo.value')->join('photo','product.id_product','=','photo.id_product')->where('photo.deleted_at','=',null)->where('product.id_product',$id_product)->where('photo.status','=',0)->get();
        $Extras=DB::table('product')->select('photo.value')->join('photo','product.id_product','=','photo.id_product')->where('photo.deleted_at','=',null)->where('product.id_product',$id_product)->where('photo.status','=',0)->where('product.id_product',$id_product)->first();

        return view('Product.detail_product')->with('data', $data)->with('Main', $Main)->with('list_photo', $list_photo)->with('Extra',$Extra)->with('Extras',$Extras);
    }

    public function delete_all_product(Request $request)
    {
        $ids = $request->ids;
        DB::table('product')->where('id_product', $ids)->delete();
        return response()->json();
    }
    public function ShowProduct($id_product)
    {
        if (!session('id') and !session('member')) {
            $photo = DB::table('photo')->join('product', 'photo.id_product', '=', 'product.id_product')->where('product.id_product', $id_product)->select('*')->first();
            $product = DB::table('product')->join('category', 'category.id', '=', 'product.id_category')->where('product.id_product', $id_product)->get();
            $category = DB::table('category')->orderBy('id', 'DESC')->select('*')->get();
            $feedback = DB::table('feedback')->select('*')->get();
            $data3=DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product',$id_product)->get();
            $show_comment = DB::table('user')->join('feedback', 'user.id', '=', 'feedback.id_user')->join('product', 'feedback.id_product', '=', 'product.id_product')->select('*')->where('product.id_product', $id_product)->get();
            return view('index.Product')->with('photo', $photo)->with('product', $product)->with('category', $category)->with('Show_comment', $show_comment)->with('feedback', $feedback)->with('data3',$data3);

        } else {
            $data_session = session()->get('id');
            $data2 = DB::table('photo')->join('product', 'product.id_product', '=', 'photo.id_product')->join('category', 'product.id_category', '=', 'category.id')->where('product.id_product', $id_product)->first();
            $data3=DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product',$id_product)->get();
            $avatar = DB::table('user')->select('*')->where('id', $data_session)->first();
            $product = DB::table('product')->join('photo', 'product.id_product', '=', 'photo.id_product')->where('product.id_product',$id_product)->first();
            $category = DB::table('category')->orderBy('id', 'DESC')->select('*')->get();
            $feedback = DB::table('feedback')->select('*')->get();
            $show_comment = DB::table('user')->join('feedback', 'user.id', '=', 'feedback.id_user')->join('product', 'feedback.id_product', '=', 'product.id_product')->select('*')->where('product.id_product', $id_product)->get();
             return view('user.Product')->with('product', $product)->with('category', $category)->with('Show_comment', $show_comment)->with('feedback', $feedback)->with('avatar', $avatar)->with('data3',$data3)->with('photo',$data2);
        }
    }
    public function addFeedback(Request $request, $id_product)
    {
        $new_feedback=new feedback;
        $feedback = $request->input('Message');
        $id = Session::get('id');
        if(session('id') and session('member')){
            $new_feedback->id_user=$id;
            $new_feedback->id_product=$id_product;
            $new_feedback->comment=$feedback;
            $new_feedback->date_to=Carbon::now('Asia/Ho_Chi_Minh');
            $new_feedback->save();
            $feed=DB::table('feedback')->select('*')->orderBy('id')->first();
            Session::put('feedback',$feed->id);
            return redirect()->back();
        }else{
            return view();
        }
    }
    public function categories_list($id){
        $data_session = session()->get('id');
        $row=DB::table('product')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->where('product.id_category',$id)->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->orderBy('product.id_product','DESC')->paginate(6);
        $category=DB::table('category')->orderBy('id','DESC')->where('category.deleted_at','=',null)->select('*')->get();
        $count_category=DB::table('category')->join('product','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->where('category.deleted_at','=',null)->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->select('category.id','category.name', DB::raw('count(product.id_product) as total'))->groupBy('category.name','category.id')->get();
        if(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price=$_GET['start_price'];
            $max_price=$_GET['end_price'];
            $row=DB::table('category')->join('product','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->where('category.id',$id)->where('photo.status','=',1)->whereBetween('product.money',[$min_price,$max_price])->where('category.deleted_at','=',null)->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->orderBy('product.id_product','DESC')->paginate(5)->appends(request()->query());
        }
        if (!$data_session){
            return view('index.categories_list')->with('category',$category)->with('row',$row)->with('count_category',$count_category);
        }else{
            $avatar = DB::table('user')->where('user.id', $data_session)->first();
            return view('user.categories_list')->with('category',$category)->with('row',$row)->with('count_category',$count_category)->with('avatar',$avatar);
        }
    }
    public function all_product(){
        $data_session = session()->get('id');
        $category=DB::table('category')->orderBy('id','DESC')->where('category.deleted_at','=',null)->select('*')->get();
        $count_category=DB::table('category')->join('product','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->where('photo.status','=',1)->where('category.deleted_at','=',null)->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->select('category.id','category.name', DB::raw('count(product.id_product) as total'))->groupBy('category.name','category.id')->get();
        $product=DB::table('product')->join('category','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->select('*')->where('photo.status','=',1)->where('product.deleted_at','=',null)->where('photo.deleted_at','=',null)->where('category.deleted_at','=',null)->orderBy('product.id_product','DESC')->paginate(9);
        if(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price=$_GET['start_price'];
            $max_price=$_GET['end_price'];
            $product=DB::table('category')->join('product','category.id','=','product.id_category')->join('photo','photo.id_product','=','product.id_product')->where('product.deleted_at','=',null)->where('category.deleted_at','=',null)->where('photo.deleted_at','=',null)->where('photo.status','=',1)->whereBetween('product.money',[$min_price,$max_price])->paginate(6);
        }
        if (!$data_session){
            return view('index.all_product')->with('category',$category)->with('count_category',$count_category)->with('product',$product);
        }else{
            $avatar = DB::table('user')->where('user.id', $data_session)->first();
            return view('user.all_product')->with('category',$category)->with('count_category',$count_category)->with('avatar',$avatar)->with('product',$product);
        }
    }
}
