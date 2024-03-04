<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request, TweetService $tweetService) {
        // $tweets = Tweet::orderBy('created_at', 'desc')->get();
        // dd($tweets);
        // $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();
        return view('tweets.index')->with('tweets', $tweets);

    }
}
