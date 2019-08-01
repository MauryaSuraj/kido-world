<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Translation\Tests\Writer\BackupDumper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_lists = DB::table('products')
            ->join('product_categories','product_categories.id', '=', 'products.category_id')
            ->select('products.*','product_categories.category_name')
            ->paginate();
        return view('Product.index', compact('product_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('product_categories')
            ->get();
        $manu = DB::table('manufacturers')
            ->get();

        return view('Product.create', compact('categories', 'manu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_type' => 'required',
            'category_id' => 'required',
            'manufacturer_id' => 'required',
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
                request()->left_banner->move(public_path('images/product/left_banner'), $left_banner);
            }
        }
        if ($request->hasFile('right_banner')){
            if ($request->file('right_banner')->isValid()){
                $right_banner = time().'.'.request()->right_banner->getClientOriginalExtension();
                request()->right_banner->move(public_path('images/product/right_banner'), $right_banner);
            }
        }
        if ($request->hasFile('product_main_image')){
            if ($request->file('product_main_image')->isValid()){
                $product_main_image = time().'.'.request()->product_main_image->getClientOriginalExtension();
                request()->product_main_image->move(public_path('images/product/product_main_image'), $product_main_image);
            }
        }

        $product_insert = DB::table('products')
            ->insert([
                'product_type' => $request->input('product_type'),
                'category_id' => $request->input('category_id'),
                'manufacture' => $request->input('manufacturer_id'),
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
                'slug' => Str::slug($request->input('product_name')),
                'meta_title' => $meta_title,
                'meta_keywords' => $meta_tags,
                'meta_description' => $meta_desc,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($product_insert)
            return redirect()->back()->with('success', 'Product Uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
            ->where('products.id' ,$id)
            ->join('product_categories','product_categories.id', '=', 'products.category_id')
            ->join('manufacturers','manufacturers.id', '=', 'products.manufacture')
            ->select('products.*','product_categories.category_name', 'manufacturers.name', 'manufacturers.details')
            ->get()
            ->first();
        return view('Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
