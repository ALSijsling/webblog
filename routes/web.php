<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;

//Home and single post
Route::get('/posts', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Authenticated comments and posts
Route::resource('posts.comments', CommentController::class)->middleware('auth');
Route::resource('admin/posts', AdminPostController::class)->middleware('admin');

//Create and logging users
Route::resource('register', RegisterController::class)->only(['create', 'store'])->middleware('guest');
Route::resource('login', SessionsController::class)->only(['create', 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('sessions.destroy');

Route::redirect('/', '/posts');
