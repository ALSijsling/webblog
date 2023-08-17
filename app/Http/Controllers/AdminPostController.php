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
        // TODO: noem de category uit de request categories ipv category, omdat het 
        // meerdere kunnen zijn zodat je aan de naam kunt herleiden dat het om een array gaat
        $categories = $request->category;
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['image'] = request()->file('image')->store('images');
        unset($attributes['category']);

        $post = Post::create($attributes);
        $post->categories()->attach($categories);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        // TODO: onderstaande kun je verkort schrijven als: $post->categories
        $postCategories = $post->categories()->get();

        // TODO: postCategories kun je ook via de relatie uit de post template variable in 
        // de template opvragen ipv hier in de controller
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

        unset($attributes['category']);

        if (isset($attributes['image'])) {
            $attributes['image'] = request()->file('image')->store('images');
        }

        // TODO: typefout? updated ipv update?
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
