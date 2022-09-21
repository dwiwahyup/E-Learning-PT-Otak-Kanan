<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $data = DB::table('contents')->get();

        // dd($data);
        return view('dashboard.content.index', ['data' => $data]);
    }

    public function create()
    {
        return view ('dashboard.content.create');
    }

    public function update()
    {
        return view ('dashboard.content.update');
    }
}

