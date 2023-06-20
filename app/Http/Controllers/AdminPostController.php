<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $user= request()->user();

        return view('admin.posts.index', [
            'posts' => Post::orderByDesc('updated_at')->get(),
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $categories = $request->category;
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();

        $post = Post::create($attributes);
        $post->categories()->attach($categories);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        $postCategories = $post->categories()->get();

        return view('admin.posts.edit',[
            'post' => $post,
            'categories' => Category::orderBy('name')->get(),
            'postCategories' => $postCategories
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $categories = $request->category;
        $attributes = $request->validated();

        Post::updated($attributes);
        $post->categories()->sync($categories);

        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();

        return redirect('/admin/posts');
    }
}
