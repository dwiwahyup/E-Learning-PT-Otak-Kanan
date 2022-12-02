<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialUserController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('users', 'users.user_details', 'users.courses')->orderBY('id', 'DESC')->get();
        // dd($testimonials);

        return view('frontend.layouts.testimonial', compact('testimonials'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'rating' => 'required',
            'review' => 'required'
        ]);

        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        Testimonial::create($data);

        return redirect()->back();
    }
}
