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
        return view('dashboard.content.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required'
        ]);

        DB::table('contents')->insert([
            'name' => $request->name,
            'text' => $request->text
        ]);

        return redirect('/dashboard/content')->with('success', 'new content has been added');
    }

    public function edit($id)
    {
        $data = DB::table('contents')->where('id', $id)->get();

        return view('dashboard.content.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request);
        DB::table('contents')->where('id', $request->id)->update([
            'name' => $request->name,
            'text' => $request->text
        ]);

        return redirect('/dashboard/content')->with('success', 'content has been updated');
    }

    public function delete($id)
    {
        DB::table('contents')->where('id', $id)->delete();

        return redirect('/dashboard/content')->with('success', 'content has been deleted');
    }
}
