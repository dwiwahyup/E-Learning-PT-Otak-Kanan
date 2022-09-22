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
}
