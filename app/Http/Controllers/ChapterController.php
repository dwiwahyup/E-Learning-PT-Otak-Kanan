<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $query = DB::table('chapters')
            ->join('course_categories', function ($join) use ($id) {
                $join->on('chapters.course_categories_id', '=', 'course_categories.id')
                    ->where('chapters.course_categories_id', '=', $id);
            })
            ->leftJoin('contents', function ($join) {
                $join->on('contents.chapters_id', '=', 'chapters.id');
            })
            ->select('chapters.id', 'chapters.name', 'chapters.abstract', DB::raw('COUNT(contents.chapters_id) as contents_count'))
            ->groupBy('chapters.id')
            ->get();
        // dd($query);

        return view('dashboard.chapter.index', ['query' => $query, 'id' => $id]);
    }

    public function create($id)
    {
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
            'course_categories_id' => $request->course_categories_id
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => $id]
        )->with('success', 'new chapter has been added');
    }

    public function edit($id)
    {
        $data = DB::table('chapters')->where('id', $id)->get();

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
            'course_categories_id' => $request->course_categories_id
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => $id]
        )->with('success', 'this chapter has been update');
    }

    public function delete($id)
    {
        // $id = $request->course_categories_id;
        DB::table('chapters')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'chapter has been deleted');
    }
}
