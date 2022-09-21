<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view('dashboard.content.index');
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

