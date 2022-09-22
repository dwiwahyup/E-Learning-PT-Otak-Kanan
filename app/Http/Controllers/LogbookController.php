<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class LogbookController extends Controller
{
    public function index()
    {
        $data = DB::table('logbooks')->get();

        // dd($data);
        return view('dashboard.logbook.index', ['data' => $data]);
    }

    public function create()
    {
        return view('dashboard.logbook.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        DB::table('logbooks')->insert([
            'users' => $request->name,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return redirect('/dashboard/logbook')->with('success', 'new logbook has been added');
    }

    public function edit($id)
    {
        $data = DB::table('logbooks')->where('id', $id)
            ->get();

        return view('dashboard.logbook.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('logbooks')->where('id', $request->id)->update([
            'users' => $request->name,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return redirect('/dashboard/logbook')->with('success', 'logbook has been updated');
    }

    public function delete($id)
    {
        DB::table('logbooks')->where('id', $id)->delete();

        return redirect('/dashboard/logbook')->with('success', 'logbook has been deleted');
    }
}
