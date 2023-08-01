<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;

//Public posts and categories
Route::get('/posts', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

//Authenticated posts, comments and categories
Route::resource('admin/posts', AdminPostController::class)->except('show')->middleware('admin');
Route::resource('posts.comments', CommentController::class)->middleware('auth');
Route::resource('admin/categories', CategoryController::class)->except(['show', 'edit', 'update'])->middleware('admin');

//Create and logging users
Route::resource('register', RegisterController::class)->only(['create', 'store'])->middleware('guest');
Route::resource('login', SessionsController::class)->only(['create', 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('sessions.destroy');

//Newsletter
Route::post('newsletter', [NewsletterController::class, 'store'])->middleware('auth')->name('newsletter.store');

Route::redirect('/', '/posts');
