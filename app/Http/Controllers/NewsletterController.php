<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    public function store() {
        // TODO: ondertaande regel is overbodig, je kunt direct 
        // Auth::user()->newsletter = 1 doen
        $userDetails = Auth::user();
        $user = User::find($userDetails->id);
        $user->newsletter = 1;
        $user->save();

        return redirect('/posts');
    }
}
