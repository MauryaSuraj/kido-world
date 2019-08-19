<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    public function store(Request $request){

        if (Auth::user()){
            $user_id = \auth()->user()->id;
        }
        $request->validate([
           'message' => ['required']
        ]);
        $add_review = DB::table('reviews')
            ->insert([
                'product_id' => $request->input('product_id'),
                'rating' => '5',
                'reviews' => $request->input('message'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
                'user_id' => $user_id,
            ]);
        if ($add_review)
            return redirect()->back()->with('review', 'Review Added SuccessFully');

    }
}
