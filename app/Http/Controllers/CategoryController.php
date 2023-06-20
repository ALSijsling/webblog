<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function show(Category $category)
    {
        return view('posts.index', [
            'posts' => $category->posts
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $attributes = $request->validated();

        Category::create($attributes);

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories');
    }
}
