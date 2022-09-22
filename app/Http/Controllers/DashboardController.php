<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $materi = DB::table('contents')->count();
        return view('dashboard.index', compact('materi'));
        }
    

}
