<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\DB;

class ChapterUserController extends Controller
{
    public function index($slug)
    {
        $course_categories = CourseCategory::where('slug', $slug)->first();
        $chapter = Chapter::where('course_categories_id', $course_categories->id)->get();
        $test = Chapter::with('contents')->get();

        return view('frontend.chapteruser.index', compact('chapter', 'test'));
    }
}
