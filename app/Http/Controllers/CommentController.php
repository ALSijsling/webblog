<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->comments()->create([
            'user_id' => $validated['user_id'],
            'comment' => $validated['comment']
        ]);

        return back();
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
