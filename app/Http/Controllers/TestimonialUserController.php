<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialUserController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.testimonial');
    }
}
