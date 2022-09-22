<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function index($id)
    {
        $data = DB::table('chapters')->where('course_categories_id', $id)->get();
        // dd($data);

        return view('dashboard.chapter.index', ['data' => $data, 'id' => $id]);
    }

    public function create($id)
    {
        // dd($id);

        return view('dashboard.chapter.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $id = $request->course_categories_id;
        // dd($id);

        DB::table('chapters')->insert([
            'name' => $request->name,
            'course_categories_id' => $request->course_categories_id
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => $id]
        );
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

        DB::table('chapters')->where('id', $request->id)->update([
            'name' => $request->name,
            'course_categories_id' => $request->course_categories_id
        ]);

        return redirect()->action(
            [ChapterController::class, 'index'],
            ['id' => $id]
        );
    }

    public function delete($id)
    {
        // $id = $request->course_categories_id;
        DB::table('chapters')->where('id', $id)->delete();

        return redirect()->back();
    }
}
