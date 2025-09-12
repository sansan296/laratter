<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
// 🔽 Tweetモデルを読み込む
use App\Models\Tweet;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // 🔽 引数に Tweet を入力する
    public function create(Tweet $tweet)
    {
        return view('tweets.comments.create', compact('tweet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // 🔽 引数に Tweet を追加する
    public function store(Request $request, Tweet $tweet)
    {
        $request->validate([
        'comment' => 'required|string|max:255',
    ]);

        $tweet->comments()->create([
        'comment' => $request->comment,
        'user_id' => auth()->id(),
    ]);

  return redirect()->route('tweets.show', $tweet);
}

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet, Comment $comment)
    {
        return view('tweets.comments.show', compact('tweet', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
