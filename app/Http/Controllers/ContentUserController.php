<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentUserController extends Controller
{
    public function index()
    {
        $dataa = DB::table('contents')->get();

        return view('frontend.contentuser.index', ['data' => $dataa]);
    }
}
