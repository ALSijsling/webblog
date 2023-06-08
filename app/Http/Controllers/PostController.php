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

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        
        return view('posts.show', [
            'post' => $post
        ])->with('comments', $comments);
    }
}
