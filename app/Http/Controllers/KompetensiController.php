<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KompetensiController extends Controller
{
    public function index()
    {
        return view('dashboard/kompetensi.index');
    }
}
