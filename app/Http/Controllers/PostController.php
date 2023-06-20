<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::orderByDesc('created_at')->with('categories')->filter(request(['search']))->get()
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        $categories = $post->categories()->get();
        
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories
        ]);
    }
}
