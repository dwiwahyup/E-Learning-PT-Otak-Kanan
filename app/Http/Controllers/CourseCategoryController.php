<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $query = DB::table('course_categories')
            ->leftJoin('chapters', function ($join) {
                $join->on('course_categories.id', '=', 'chapters.course_categories_id');
            })
            ->select('course_categories.id', 'course_categories.name', 'course_categories.introduction', DB::raw('COUNT(chapters.course_categories_id) as chapters_count'))
            ->groupBy('course_categories.id')
            ->get();
        // dd($query);
        // $data = DB::table('course_categories')->get();
        return view('dashboard.coursecategory.index', ['query' => $query]);
    }

    public function create()
    {
        return view('dashboard.coursecategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'introduction' => 'required'
        ]);

        DB::table('course_categories')->insert([
            'name' => $request->name,
            'introduction' => $request->introduction
        ]);

        return redirect('/dashboard/coursecategory')->with('success', 'new course category has been added');
    }

    public function edit($id)
    {
        $data = DB::table('course_categories')->where('id', $id)
            ->get();

        return view('dashboard.coursecategory.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('course_categories')->where('id', $request->id)->update([
            'name' => $request->name,
            'introduction' => $request->introduction
        ]);

        return redirect('/dashboard/coursecategory')->with('success', 'course category has been updated');
    }

    public function delete($id)
    {
        DB::table('course_categories')->where('id', $id)->delete();

        return redirect('/dashboard/coursecategory')->with('success', 'course category has been deleted');
    }

    public function preview($id)
    {
        $query = DB::table('users')
            ->where('users.course_categories_id', $id)
            ->orderBy('id')
            ->get();

        // dd($query);

        return view('dashboard.coursecategory.student', ['query' => $query]);
    }
}
