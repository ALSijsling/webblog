<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    public function create() {
        return view('premium.create');
    }

    public function store() {
        $userDetails = Auth::user();
        $user = User::find($userDetails->id);
        $user->is_premium = 1;
        $user->save();

        return redirect('/posts');
    }
}
