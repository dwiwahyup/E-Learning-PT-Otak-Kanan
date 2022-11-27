<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Facades\DB;
use App\Models\CourseCategory;
use App\Models\Mentor;
use Illuminate\Http\Request,
    App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with(['courses'])->get();
        // dd($mentors);

        $courses = CourseCategory::with(['mentors'])->get();

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

    public function program($slug)
    {
        $program = Program::with('kompetensi')->where('slug', $slug)->first();
        dd($program);

        return view('frontend.program', ['program' => $program]);
    }
}
