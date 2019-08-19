<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontEnd extends Controller
{
    public function __construct()
    {
        if (Auth::check()){
            $this->middleware('verified');
        }
    }

    public function index(){
        $products = DB::table('products')->limit(4)->get();
        return view('FrontEnd.index',compact('products'));
    }
    public function contact(){
        return view('FrontEnd.contact');
    }
    public function about(){
        return view('FrontEnd.about');
    }
    public function terms(){
        return view('FrontEnd.terms');
    }
    public function privacy(){
        return view('FrontEnd.privacy');
    }
    public function returnpolicy(){
        return view('FrontEnd.return');
    }
    public function refundPolicy(){
        return view('FrontEnd.refund');
    }
    public function shipping(){
        return view('FrontEnd.shipping'); 
    }
    public function contactinsert(Request $request){
        $insert = DB::table('contacts')
            ->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message')
            ]);
        if ($insert)
            return redirect()->back()->with('success', 'Data Submitted');
    }
    
}
