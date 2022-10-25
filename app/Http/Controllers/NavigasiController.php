<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigasiController extends Controller
{
    public function about()
    {
        return view('frontend.layouts.about');
    }
}
