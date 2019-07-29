<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_s = DB::table('product_categories')
            ->paginate(6);
        return view('ProductCategory.index',compact('cat_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProductCategory.create');
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
           'name' => 'required',
            'description' => 'required',
            'cat_icon' => ['required', 'image'],
            'cat_header_image' => ['required', 'image'],
        ]);

        if ($request->hasFile('cat_icon')){
            if ($request->file('cat_icon')->isValid()){
                $cat_icon = time().'.'.request()->cat_icon->getClientOriginalExtension();
                request()->cat_icon->move(public_path('images/category/cat_icon'), $cat_icon);
            }
        }
        if ($request->hasFile('cat_header_image')){
            if ($request->file('cat_header_image')->isValid()){
                $cat_header_image = time().'.'.request()->cat_header_image->getClientOriginalExtension();
                request()->cat_header_image->move(public_path('images/category/cat_header_image'), $cat_header_image);
            }
        }
        $insert_cat = DB::table('product_categories')
            ->insert([
               'category_name' => $request->input('name'),
               'category_des' => $request->input('description'),
               'cat_image' => $cat_icon,
               'cat_header_image' => $cat_header_image,
               'slug' => Str::slug($request->input('name')),
               'created_at' => Carbon::now()->toDateTimeString(),
               'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        if ($insert_cat)
            return redirect()->back()->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ProductCategory.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_s = DB::table('product_categories')
            ->where('id','=',$id)
            ->get()->first();
        return view('ProductCategory.edit', compact('cat_s'));
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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cat_icon' => ['image'],
            'cat_header_image' => ['image'],
        ]);

        if ($request->hasFile('cat_icon')){
            if ($request->file('cat_icon')->isValid()){
                $cat_icon = time().'.'.request()->cat_icon->getClientOriginalExtension();
                request()->cat_icon->move(public_path('images/category/cat_icon'), $cat_icon);
            }
        }
        else{
            $cat_icon = DB::table('product_categories')->where('id', '=', $id)->pluck('cat_image');
        }
        if ($request->hasFile('cat_header_image')){
            if ($request->file('cat_header_image')->isValid()){
                $cat_header_image = time().'.'.request()->cat_header_image->getClientOriginalExtension();
                request()->cat_header_image->move(public_path('images/category/cat_header_image'), $cat_header_image);
            }
        }else{
            $cat_header_image = DB::table('product_categories')->where('id', '=', $id)->pluck('cat_header_image');
        }
        $insert_cat = DB::table('product_categories')->where('id','=',$id)
            ->update([
                'category_name' => $request->input('name'),
                'category_des' => $request->input('description'),
                'cat_image' => $cat_icon,
                'cat_header_image' => $cat_header_image,
                'slug' => Str::slug($request->input('name')),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        if ($insert_cat)
            return redirect()->back()->with('success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        echo "some thing here".$id;
        dd($id);
//         $delete = DB::table('product_categories')->where('id', $id)->delete();
//         if ($delete)
//             return redirect()->back()->with('success', 'Category Deleted successfully');
    }
}
