<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request) {
        $tweets = Tweet::orderBy('created_at', 'desc')->get();
        // dd($tweets);
        return view('tweets.index')->with('tweets', $tweets);

    }
}
