<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = DB::table('buyer_profiles')
            ->where('user_id', $id)
        ->get()
        ->first();
        return view('AdminProfile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = DB::table('buyer_profiles')
            ->where('id', $id)
            ->get()
            ->first();
        return view('AdminProfile.edit',compact('profile'));
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
           'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => ['required'],
            'profile_image' => ['required', 'image']
        ]);

        if ($request->hasFile('profile_image')){
            if ($request->file('profile_image')->isValid()){
                $profile_image = time().'.'.request()->profile_image->getClientOriginalExtension();
                request()->profile_image->move(public_path('images/profile'), $profile_image);
            }
        }

        $update_profile = DB::table('buyer_profiles')
            ->where('id', $id)
            ->update([
               'phone' => $request->input('phone'),
               'gender' => $request->input('gender'),
               'date_of_birth' => $request->input('date_of_birth'),
               'profile_image' => $profile_image,
            ]);
        if ($update_profile)
            return redirect()->back()->with('success', 'Profile Updated Successfully');
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
