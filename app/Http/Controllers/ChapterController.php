<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ChapterController extends Controller
{
    public function index($slug)
    {
        $data = CourseCategory::where('slug', $slug)->first();
        $id = $data->id;

        $query = DB::table('chapters')
            ->join('course_categories', function ($join) use ($id) {
                $join->on('chapters.course_categories_id', '=', 'course_categories.id')
                    ->where('chapters.course_categories_id', '=', $id);
            })
            ->leftJoin('contents', function ($join) {
                $join->on('contents.chapters_id', '=', 'chapters.id');
            })
            ->select('chapters.id', 'chapters.name', 'chapters.abstract', 'chapters.slug', 'course_categories.name as course_name', DB::raw('COUNT(contents.chapters_id) as contents_count'))
            ->groupBy('chapters.id')
            ->get();

        return view('dashboard.chapter.index', ['query' => $query, 'id' => $id, 'course_name' => $data]);
    }

    public function create($slug)
    {
        $coursecategory = CourseCategory::where('slug', $slug)->first();
        return view('dashboard.chapter.create', ['coursecategory' => $coursecategory]);
    }

    public function store(Request $request, CourseCategory $coursecategory)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'abstract' => 'required',
        ]);

        $data = $request->all();
        $data['course_categories_id'] = $coursecategory->id;
        $data['slug'] = SlugService::createSlug(Chapter::class, 'slug', $request->name);
        Chapter::create($data);

        return redirect()->route('coursecategory.chapter.index', ['coursecategory' => $coursecategory->slug])->with('success', 'new chapter has been addedd');
    }

    public function edit($coursecategory, $chapter)
    {
        $chapter = Chapter::where('slug', $chapter)->first();
        $coursecategory = CourseCategory::where('slug', $coursecategory)->first();
        return view('dashboard.chapter.edit', ['coursecategory' => $coursecategory, 'chapter' => $chapter]);
    }

    public function update(Request $request, CourseCategory $coursecategory, Chapter $chapter)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'abstract' => 'required',
        ]);

        $data = $request->all();
        $chapter->update($data);

        return redirect()->route('coursecategory.chapter.index', ['coursecategory' => $coursecategory->slug])->with('success', 'chapter has been updated');
    }

    public function destroy(CourseCategory $coursecategory, Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->back()->with('success', 'chapter has been deleted');
    }
}
