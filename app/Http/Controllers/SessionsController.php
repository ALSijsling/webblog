<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(StoreSessionsRequest $request)
    {
        $attributes = $request->validated();

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            
            return redirect('/posts')->with('success', 'Welcome Back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Goodbye!');
    }
}
