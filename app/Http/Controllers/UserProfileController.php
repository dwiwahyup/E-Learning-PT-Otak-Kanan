<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.layouts.profile');
    }

    public function update()
    {
        return view('frontend.layouts.update-profile');
    }
}
