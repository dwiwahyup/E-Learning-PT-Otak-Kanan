<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogbookController extends Controller
{
    public function index()
    {
        $data = DB::table('logbooks')->get();

        return view('dashboard.logbook.index', ['data' => $data]);
    }

    public function create()
    {
        return view('dashboard.logbook.create');
    }
}
