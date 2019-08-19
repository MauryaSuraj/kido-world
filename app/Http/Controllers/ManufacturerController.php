<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manu_s = DB::table('manufacturers')->get();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Manufacturer.index', compact('manu_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Manufacturer.create');
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
           'manufacturer_image' => ['required', 'image'],
        ]);

        if ($request->hasFile('manufacturer_image')){
            if ($request->file('manufacturer_image')->isValid()){
                $manufacturer_image = time().'.'.request()->manufacturer_image->getClientOriginalExtension();
                request()->manufacturer_image->move(public_path('images/manufacturer_image'), $manufacturer_image);
            }
        }

        $insert_data = DB::table('manufacturers')
            ->insert([
                'name' => $request->input('name'),
                'details' => $request->input('description'),
                'image' => $manufacturer_image,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($insert_data)
            return redirect()->back()->with('success', 'Manufacturer  added successfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manu = DB::table('manufacturers')->where('id', $id)->first();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Manufacturer.edit', compact('manu'));
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
            'manufacturer_image' => ['image'],
        ]);

        if ($request->hasFile('manufacturer_image')){
            if ($request->file('manufacturer_image')->isValid()){
                $manufacturer_image = time().'.'.request()->manufacturer_image->getClientOriginalExtension();
                request()->manufacturer_image->move(public_path('images/manufacturer_image'), $manufacturer_image);
            }
        }else{
            $manufacturer_image = DB::table('manufacturers')->where('id', $id)->pluck('image');
        }

        $insert_data = DB::table('manufacturers')->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'details' => $request->input('description'),
                'image' => $manufacturer_image,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($insert_data)
            return redirect()->back()->with('success', 'Manufacturer  added successfully');
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
