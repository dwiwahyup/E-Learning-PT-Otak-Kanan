<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $data = Testimonial::all();

        return view('dashboard.testimonial.index', ['data' => $data]);
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect('/dashboard/testimonial')->with('success', 'course category has been deleted');
    }
}
