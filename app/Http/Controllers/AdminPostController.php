<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;

class AdminPostController extends Controller
{
    public function index()
    {
        $user= request()->user();

        return view("admin.posts.index", [
            'posts' => Post::orderByDesc('updated_at')->get(),
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request)
    {
        $attributes = $request->validated();

        Post::updated($attributes);

        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts');
    }
}
