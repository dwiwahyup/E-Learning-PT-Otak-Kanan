<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $materi = DB::table('contents')->count();
        $userr = DB::table('users')->count();
        $courses = DB::table('course_categories')->count();
        $mentors = User::where('roles', 'MENTOR')->count();
        // dd($mentors);
        return view('dashboard.index', compact('materi', 'userr', 'courses', 'mentors'));
    }
}
