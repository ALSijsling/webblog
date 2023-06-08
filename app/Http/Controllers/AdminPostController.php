<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $user= request()->user();

        return view("admin.posts.index", [
            'posts' => Post::all(),
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

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
