<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = User::with('courses', 'user_details')->where('id', Auth::user()->id)->first();
        // dd($user);

        return view('frontend.profile.index', compact('user'));
    }

    public function create()
    {
        return view('frontend.profile.create');
    }

    public function update()
    {
        return view('frontend.layouts.update-profile');
    }
}
