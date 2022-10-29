<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function index()
    {
        $dataa = DB::table('users')->get();

        return view('dashboard.mentors.index', ['data' => $dataa]);
    }
    public function create()
    {
        return view('dashboard.mentors.create');
    }
}
