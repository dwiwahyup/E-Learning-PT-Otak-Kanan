<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentUserController extends Controller
{
    public function index($slug)
    {
        $dataa = Content::where('slug', $slug)->get();
        // dd($dataa);

        return view('frontend.contentuser.index', ['data' => $dataa]);
    }
}
