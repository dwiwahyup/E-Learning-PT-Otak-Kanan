<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Crypt;

class ChapterController extends Controller
{
    public function index($id)
    {
        $id = Crypt::decrypt($id);
        // dd($id);
        $course_name = DB::table('course_categories')->where('id', $id)->first();
        // dd($course_name);

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
        // dd($query);

        return view('dashboard.chapter.index', ['query' => $query, 'id' => $id, 'course_name' => $course_name]);
    }

    public function create($id)
    {
        $id = Crypt::decrypt($id);
        // dd($id);

        return view('dashboard.chapter.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $id = $request->course_categories_id;
        // dd($request);

        $this->validate($request, [
            'name' => 'required|max:50',
            'abstract' => 'required',
            'course_categories_id' => 'required'
        ]);

        DB::table('chapters')->insert([
            'name' => $request->name,
            'abstract' => $request->abstract,
            'course_categories_id' => $request->course_categories_id,
            'slug' => SlugService::createSlug(Chapter::class, 'slug', $request->name),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => Crypt::encrypt($id)]
        )->with('success', 'new chapter has been added');
    }

    public function edit($slug)
    {
        $data = DB::table('chapters')->where('slug', $slug)->get();

        // dd($data);

        return view('dashboard.chapter.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $id = $request->course_categories_id;

        $this->validate($request, [
            'name' => 'required|max:50',
            'abstract' => 'required',
            'course_categories_id' => 'required'
        ]);

        DB::table('chapters')->where('id', $request->id)->update([
            'name' => $request->name,
            'abstract' => $request->abstract,
            'course_categories_id' => $request->course_categories_id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => $id]
        )->with('success', 'this chapter has been update');
    }

    public function delete($slug)
    {
        // $id = $request->course_categories_id;
        DB::table('chapters')->where('slug', $slug)->delete();

        return redirect()->back()->with('success', 'chapter has been deleted');
    }
}
