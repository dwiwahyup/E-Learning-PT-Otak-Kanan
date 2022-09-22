<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $data = DB::table('course_categories')->get();
        return view('dashboard.coursecategory.index', ['data' => $data]);
    }

    public function create()
    {
        return view('dashboaard.coursecategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'introduction' => 'required'
        ]);

        DB::table('logbooks')->insert([
            'name' => $request->name,
            'introduction' => $request->introduction
        ]);

        return redirect('/dashboard/coursecategory')->with('success', 'new logbook has been added');
    }
}
