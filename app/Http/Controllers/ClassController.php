<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index()
    {
        $course_categories = DB::table('course_categories')->get();

        return view('dashboard.class.index', ['course_categories' => $course_categories]);
    }
    public function class1()
    {
        return view('dashboard.class.class1');
    }
    public function class2()
    {
        return view('dashboard.class.class2');
    }
    public function class3()
    {
        return view('dashboard.class.class3');
    }
}
