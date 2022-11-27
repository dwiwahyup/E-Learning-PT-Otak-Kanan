<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use App\Models\Program;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KompetensiController extends Controller
{
    public function index($slug)
    {
        $program = Program::where('slug', $slug)->first();

        $data = Kompetensi::with('programs')->where('programs_id', $program->id)->get();
        // dd($data);


        return view('dashboard/kompetensi.index', ['data' => $data, 'nama_program' => $program]);
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->first();

        return view('dashboard.kompetensi.create', ['program' => $program]);
    }

    public function store(Request $request,  Program $program)
    {
        $this->validate($request, [
            'nama_kompetensi' => 'required',
            'target_pengembangan_keterampilan' => 'required',
            'detail_pembelajaran' => 'required',
            'metode_asesment' => 'required',
        ]);

        // insert requst to table
        $data = $request->all();
        $data['programs_id'] = $program->id;
        $data['slug'] = SlugService::createSlug(Kompetensi::class, 'slug', $request->nama_kompetensi);
        Kompetensi::create($data);

        return redirect()->route('program.kompetensi.index', ['program' => $program->slug])->with('success', 'new data has been added');
    }

    public function edit($program, $kompetensi)
    {
        // dd($kompetensi);
        $program = Program::where('slug', $program)->first();
        $kompetensi = Kompetensi::where('slug', $kompetensi)->first();

        // dd($program);
        return view('dashboard.kompetensi.edit', ['program' => $program, 'kompetensi' => $kompetensi]);
    }

    public function update(Request $request,  Program $program, Kompetensi $kompetensi)
    {
        $this->validate($request, [
            'nama_kompetensi' => 'required',
            'target_pengembangan_keterampilan' => 'required',
            'detail_pembelajaran' => 'required',
            'metode_asesment' => 'required',
        ]);

        // insert requst to table
        $data = $request->all();
        $kompetensi->update($data);

        return redirect()->route('program.kompetensi.index', ['program' => $program->slug])->with('success', 'data has been updated');
    }

    public function destroy(Program $program, Kompetensi $kompetensi)
    {
        $kompetensi->delete();

        return redirect()->back()->with('success', 'data has been deleted');
    }
}
