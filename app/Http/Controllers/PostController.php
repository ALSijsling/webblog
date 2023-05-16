<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('posts.index')
                    ->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = new Post;
        $post->user_id = $validated['user_id'];
        $post->title = $validated['title'];
        $post->article = $validated['article'];
        $post->save();

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        
        return view('posts.show', [
            'post' => $post
        ])->with('comments', $comments);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
