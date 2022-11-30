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
use Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    public function index()
    {
        $mentors = User::with('user_details', 'courses')->where('roles', 'MENTOR')->get();
        // dd($mentors);

        $courses = CourseCategory::with(['mentors'])->get();

        $program = Program::with('kompetensi')->first();
        // dd($program);

        // $query = DB::table('course_categories')
        //     ->join('chapters', 'course_categories.id', '=', 'chapters.course_categories_id')
        //     ->join('mentors', 'course_categories.id', '=', 'mentors.course_categories_id')
        //     // ->select(DB::raw('COUNT(mentors.course_categories_id) as mentors_count'))
        //     ->select('course_categories.id', DB::raw('COUNT(chapters.course_categories_id) as chapters_count'), DB::raw('COUNT(mentors.course_categories_id) as mentors_count'))
        //     ->groupBy('course_categories.id')
        //     ->get();
        // $query = DB::table('course_categories')
        //     ->Join('chapters', function ($join) {
        //         $join->on('course_categories.id', '=', 'chapters.course_categories_id');
        //     })
        //     ->join('mentors', function ($join) {
        //         $join->on('course_categories.id', '=', 'mentors.course_categories_id');
        //     })
        //     ->select('course_categories.id', 'course_categories.name', 'course_categories.image_url', 'course_categories.introduction', 'course_categories.slug', DB::raw('COUNT(chapters.course_categories_id) as chapters_count'), DB::raw('COUNT(mentors.course_categories_id) as mentors_count'))
        //     ->groupBy('course_categories.id')
        //     ->get();
        // $query = DB::select("SELECT (SELECT COUNT(*) FROM chapters) as a, (SELECT COUNT(*) FROM mentors) as b");
        $query = DB::select("SELECT course_categories.id, course_categories.name, course_categories.introduction, course_categories.image_url, course_categories.slug,
            (SELECT COUNT(*) FROM chapters WHERE course_categories.id = chapters.course_categories_id) as chapters_count, 
            (SELECT COUNT(*) FROM mentors WHERE course_categories.id = mentors.course_categories_id) as mentors_count FROM course_categories");

        // $query = DB::select("SELECT * FROM course_categories (SELECT COUNT(*) FROM chapters)");

        // dd($query);

        return view('frontend.home', compact('mentors', 'query'));
    }


    public function allcourse()
    {
        return view('frontend.allcourse');
    }

    public function program()
    {
        $program = Program::with('kompetensi')->get();
        // dd($program);

        return view('frontend.program', ['program' => $program]);
    }
}
