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
        dd($request);
        DB::table('chapters')->insert([
            'name' => $request->name,
            'course_categories_id' => $request->course_categories_id
        ]);

        return redirect('dashboard.chapter.index');
    }
}
