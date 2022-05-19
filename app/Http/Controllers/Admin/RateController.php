<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Imbalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function store(Request $request)
    {;


        request()->validate(['rating' => 'required']);

        $post = Imbalance::find($request->id);


        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rating;
        $rating->comment = $request->comment;

        $rating->user_id = auth()->user()->id;


        $post->ratings()->save($rating);


        return redirect()->back();

    }

}
