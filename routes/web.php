<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::resources([
    'posts' => PostController::class,
    'users' => UserController::class
]);

Route::post('posts/{post:id}/comments', [CommentController::class, 'store']);

Route::redirect('/', '/posts');
