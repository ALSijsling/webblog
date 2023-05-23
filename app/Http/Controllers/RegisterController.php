<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreRegisterRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/posts')->with('success', 'Your account has been created.');
    }
}
