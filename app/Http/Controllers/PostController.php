<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::orderByDesc('created_at')->get()
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
