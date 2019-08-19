<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $product_lists = DB::table('products')
            ->join('product_categories','product_categories.id', '=', 'products.category_id')
            ->select('products.*','product_categories.category_name')
            ->paginate();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Product.index', compact('product_lists'));
    }

    public function create()
    {
        $categories = DB::table('product_categories')
            ->get();
        $manu = DB::table('manufacturers')
            ->get();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Product.create', compact('categories', 'manu'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_type' => 'required',
            'category_id' => 'required',
            'flash_sale' => 'required',
            'special' => 'required',
            'product_name' => ['string', 'required'],
            'description' => 'required',
            'left_banner' => ['image', 'required'],
            'right_banner' => ['image', 'required'],
            'price' => ['required'],
            'min_order_limit' => ['required'],
            'quantity' => ['required'],
            'max_order_limit' => 'required',
            'product_main_image' => ['required', 'image'],
            'product_weight' => 'required',
            'isFeatured' => 'required',
            'product_status' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'sku_code' => 'required',

        ]);
        if (empty($request->has('meta_title'))){
            $meta_title = $request->input('meta_title');
        }else{
            $meta_title = $request->input('product_name');
        }
        if (empty($request->has('meta_keyword'))){
            $meta_tags = '';
        }else{
            $meta_tags = $request->input('meta_keyword');
        }
        if (($request->has('meta_description'))){
            $meta_desc = strip_tags(Str::limit($request->description, 50));
        }else{
            $meta_desc = $request->meta_description;
        }

        if ($request->hasFile('left_banner')){
            if ($request->file('left_banner')->isValid()){
                $left_banner = time().'.'.request()->left_banner->getClientOriginalExtension();
                request()->left_banner->move(('images/product/left_banner'), $left_banner);
            }
        }
        if ($request->hasFile('right_banner')){
            if ($request->file('right_banner')->isValid()){
                $right_banner = time().'.'.request()->right_banner->getClientOriginalExtension();
                request()->right_banner->move(('images/product/right_banner'), $right_banner);
            }
        }
        if ($request->hasFile('product_main_image')){
            if ($request->file('product_main_image')->isValid()){
                $product_main_image = time().'.'.request()->product_main_image->getClientOriginalExtension();
                request()->product_main_image->move(('images/product/product_main_image'), $product_main_image);
            }
        }
 $gst_with_price =  Product::gst($request->input('price'),$request->input('gst') ) ;

        $product_insert = DB::table('products')
            ->insert([
                'product_type' => $request->input('product_type'),
                'category_id' => $request->input('category_id'),
                'manufacture' => '0',
                'flash_sale' => $request->input('flash_sale'),
                'special' => $request->input('special'),
                'product_name' => $request->input('product_name'),
                'product_description' => $request->input('description'),
                'left_banner_image' => $left_banner,
                'right_banner_image' => $right_banner,
                'gender' => $request->input('gender'),
                'SKU_CODE' => $request->input('sku_code'),
                'tax_class' => $request->input('gst'),
                'product_price' =>$gst_with_price,
                'min_order_limit' => $request->input('min_order_limit'),
                'max_order_limit' => $request->input('max_order_limit'),
                'product_weight' => $request->input('product_weight'),
                'product_image' => $product_main_image,
                'isFeature' => $request->input('isFeatured'),
                'status' => $request->input('product_status'),
                'quantity' => $request->input('quantity'),
                'available' => 1,
                'slug' => Str::slug($request->input('product_name')),
                'meta_title' => $meta_title,
                'meta_keywords' => $meta_tags,
                'meta_description' => $meta_desc,
                'dimensions' => $request->input('dimension'),
                'size' => $request->input('size'),
                'color' => $request->input('color'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($product_insert)
            return redirect()->back()->with('success', 'Product Uploaded successfully');
    }

    public function show($id)
    {
        $product = DB::table('products')
            ->where('products.id' ,$id)
            ->join('product_categories','product_categories.id', '=', 'products.category_id')
            ->join('manufacturers','manufacturers.id', '=', 'products.manufacture')
            ->select('products.*','product_categories.category_name', 'manufacturers.name', 'manufacturers.details')
            ->get()
            ->first();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Product.show', compact('product'));
    }
    public function edit($id)
    {
        $categories = DB::table('product_categories')
            ->get();
        $manu = DB::table('manufacturers')
            ->get();
        $product = Product::where('id' , $id)->first();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Product.edit',compact('product', 'categories','manu'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'product_type' => 'required',
            'category_id' => 'required',
            'flash_sale' => 'required',
            'special' => 'required',
            'product_name' => ['string', 'required'],
            'description' => 'required',
            'price' => ['required'],
            'min_order_limit' => ['required'],
            'quantity' => ['required'],
            'max_order_limit' => 'required',
            'product_weight' => 'required',
            'isFeatured' => 'required',
            'product_status' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'sku_code' => 'required',

        ]);
        $meta_title = $request->input('meta_title');
        $meta_tags = $request->input('meta_keyword');
        $meta_desc = $request->meta_description;

        if ($request->hasFile('left_banner')){
            if ($request->file('left_banner')->isValid()){
                $left_banner = time().'.'.request()->left_banner->getClientOriginalExtension();
                request()->left_banner->move(('images/product/left_banner'), $left_banner);
            }
        }else{
            $left_banner = DB::table('products')->where('id', '=', $id)->pluck('left_banner_image')->first();
        }
        if ($request->hasFile('right_banner')){
            if ($request->file('right_banner')->isValid()){
                $right_banner = time().'.'.request()->right_banner->getClientOriginalExtension();
                request()->right_banner->move(('images/product/right_banner'), $right_banner);
            }
        }
        else{
            $right_banner = DB::table('products')->where('id', '=', $id)->pluck('right_banner_image')->first();
        }
        if ($request->hasFile('product_main_image')){
            if ($request->file('product_main_image')->isValid()){
                $product_main_image = time().'.'.request()->product_main_image->getClientOriginalExtension();
                request()->product_main_image->move(('images/product/product_main_image'), $product_main_image);
            }
        }else{
            $product_main_image = DB::table('products')->where('id', '=', $id)->pluck('product_image')->first();
        }

        $product_insert = DB::table('products')
            ->where('id' ,'=', $id)
            ->update([
                'product_type' => $request->input('product_type'),
                'category_id' => $request->input('category_id'),
                'manufacture' => '0',
                'flash_sale' => $request->input('flash_sale'),
                'special' => $request->input('special'),
                'product_name' => $request->input('product_name'),
                'product_description' => $request->input('description'),
                'left_banner_image' => $left_banner,
                'right_banner_image' => $right_banner,
                'product_price' => $request->input('price'),
                'min_order_limit' => $request->input('min_order_limit'),
                'max_order_limit' => $request->input('max_order_limit'),
                'product_weight' => $request->input('product_weight'),
                'product_image' => $product_main_image,
                'isFeature' => $request->input('isFeatured'),
                'status' => $request->input('product_status'),
                'quantity' => $request->input('quantity'),
                'available' => 1,
                'SKU_CODE' => $request->input('sku_code'),
                'slug' => Str::slug($request->input('product_name')),
                'meta_title' => $meta_title,
                'meta_keywords' => $meta_tags,
                'meta_description' => $meta_desc,
                'dimensions' => $request->input('dimension'),
                'size' => $request->input('size'),
                'color' => $request->input('color'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($product_insert)
            return redirect()->back()->with('success', 'Product Updated successfully');

    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Deleted SuccessFully');
    }
}
