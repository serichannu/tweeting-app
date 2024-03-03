<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetIndexController extends Controller
{
    public function index() {
        $tweets = Tweet::all();
        // dd($tweets);
        return view('tweets.index')->with('tweets', $tweets);
    }
}
