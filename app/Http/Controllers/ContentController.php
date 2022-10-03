<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index($id)
    {
        $data = DB::table('contents')->where('chapters_id', $id)->get();

        // dd($data);
        return view('dashboard.content.index', ['data' => $data, 'id' => $id]);
    }

    public function create($id)
    {
        return view('dashboard.content.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $id = $request->chapters_id;
        $this->validate($request, [
            'name' => 'required|max:50',
            'text' => 'required',
            'chapters_id' => 'required'
        ]);

        DB::table('contents')->insert([
            'name' => $request->name,
            'text' => $request->text,
            'chapters_id' => $request->chapters_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => $id]
        )->with('success', 'new content has been added');
    }

    public function edit($id)
    {
        $data = DB::table('contents')->where('id', $id)->get();

        return view('dashboard.content.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $id = $request->chapters_id;

        $this->validate($request, [
            'name' => 'required|max:50',
            'text' => 'required',
            'chapters_id' => 'required'
        ]);

        DB::table('contents')->where('id', $request->id)->update([
            'name' => $request->name,
            'text' => $request->text,
            'chapters_id' => $request->chapters_id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => $id]
        )->with('success', 'this chapter has been update');
    }

    public function delete($id)
    {
        DB::table('contents')->where('id', $id)->delete();

        return redirect()->back();
    }
}
