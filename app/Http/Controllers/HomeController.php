<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Program;
use App\Models\Kompetensi;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    public function index()
    {
        $mentors = User::with('user_details', 'courses')->where('roles', 'MENTOR')->get();

        $courses = CourseCategory::with(['mentors'])->get();

        $program = Program::with('kompetensi')->first();

        $testimonials = Testimonial::with('users', 'users.user_details', 'users.courses')->inRandomOrder()->limit(4)->get();

        $query = DB::select("SELECT course_categories.id, course_categories.name, course_categories.introduction, course_categories.image_url, course_categories.slug,
            (SELECT COUNT(*) FROM chapters WHERE course_categories.id = chapters.course_categories_id) as chapters_count, 
            (SELECT COUNT(*) FROM users WHERE course_categories.id = users.course_categories_id AND users.roles = 'MENTOR') as mentors_count FROM course_categories");

        return view('frontend.home', compact('mentors', 'query', 'testimonials'));
    }


    public function allcourse()
    {
        $courses = CourseCategory::with(['mentors'])->get();

        $query = DB::select("SELECT course_categories.id, course_categories.name, course_categories.introduction, course_categories.image_url, course_categories.slug,
            (SELECT COUNT(*) FROM chapters WHERE course_categories.id = chapters.course_categories_id) as chapters_count, 
            (SELECT COUNT(*) FROM users WHERE course_categories.id = users.course_categories_id AND users.roles = 'MENTOR') as mentors_count FROM course_categories");

        // dd($query);


        return view('frontend.allcourse', compact('courses', 'query'));
    }

    public function program()
    {
        $program = Program::with('kompetensi')->get();
        // dd($program);

        return view('frontend.program', ['program' => $program]);
    }
}
