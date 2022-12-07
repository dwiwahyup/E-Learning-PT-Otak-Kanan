<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Content;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentUserController extends Controller
{
    public function index($slug)
    {
        // show content data
        $dataa = Content::where('slug', $slug)->first();

        // next button on content user when not move to next chapter
        $next = Content::where('chapters_id', $dataa->chapters_id)->where('id', '>', $dataa->id)->first();


        // Handle button next when need to move chapters
        $content = '';
        $end = '';

        // check if $next condition is null
        if ($next == null) {
            // get chapters now
            $chapter = Chapter::where('id', $dataa->chapters_id)->first();
            // next chapters with same course
            $next_chapters = Chapter::where('course_categories_id', $chapter->course_categories_id)->where('id', '>', $chapter->id)->first();
            // check condition when end of chapters
            if ($next_chapters != null) {
                // next content
                $content = Content::where('chapters_id', $next_chapters->id)->first();
            }
            // display data when end of chapter and content
            $end = Content::where('slug', $slug)->first();
        }

        // handle to get course slug 
        $get_chapter = Chapter::where('id', $dataa->chapters_id)->first();
        $get_course = CourseCategory::where('id', $get_chapter->course_categories_id)->first();

        return view('frontend.contentuser.index', ['data' => $dataa, 'next' => $next, 'next_chapter' => $content, 'end_content' => $end, 'course' => $get_course]);
    }
}
