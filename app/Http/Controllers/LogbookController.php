<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class LogbookController extends Controller
{
    public function index($id)
    {

        $data = DB::table('logbooks')->where('users_id', $id)->get();

        // dd($data);
        return view('dashboard.logbook.index', ['data' => $data, 'id' => $id]);
    }

    public function create($id)
    {
        // $user = Auth::user();
        // dd($user);
        return view('dashboard.logbook.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $id = $request->users_id;

        DB::table('logbooks')->insert([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'users_id' => $request->users_id
        ]);

        return redirect()->action(
            [LogbookController::class, 'index'],
            ['id' => $id]
        );
    }

    public function edit($id)
    {
        $data = DB::table('logbooks')->where('id', $id)
            ->get();

        return view('dashboard.logbook.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $id = $request->users_id;

        DB::table('logbooks')->where('id', $request->id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'users_id' => $request->users_id
        ]);


        return redirect()->action(
            [LogbookController::class, 'index'],
            ['id' => $id]
        );
    }

    public function delete($id)
    {
        DB::table('logbooks')->where('id', $id)->delete();

        return redirect()->back();
    }
}
