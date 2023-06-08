<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(StoreSessionsRequest $request)
    {
        $attributes = $request->validated();

        if(!auth()->attempt($attributes)) {
            return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);            
        }

        session()->regenerate();

        return redirect('/posts')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Goodbye!');
    }
}
