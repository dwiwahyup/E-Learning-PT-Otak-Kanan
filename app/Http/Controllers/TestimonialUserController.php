<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TestimonialUserController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('users', 'users.user_details', 'users.courses')->orderBY('id', 'DESC')->paginate(3);
        // dd($testimonials);
        $data = Testimonial::all();
        // dd($data);
        return view('frontend.layouts.testimonial', compact('testimonials', 'data'));
    }

    public function store(Request $request, Testimonial $testimonial)
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
        $data['slug'] = SlugService::createSlug(Testimonial::class, 'slug', $request->email);
        Testimonial::create($data);

        return redirect()->back();
    }

    public function update(Request $request, Testimonial $testimonial)
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
        $data['slug'] = SlugService::createSlug(Program::class, 'slug', $request->nama);
        $testimonial->update($data);

        return redirect()->back();
    }
}
