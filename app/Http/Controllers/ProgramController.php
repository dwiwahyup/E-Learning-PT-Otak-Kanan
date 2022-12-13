<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index()
    {
        $data = Program::all();

        return view('dashboard.program.index', ['data' => $data]);
    }

    public function create()
    {
        $course = CourseCategory::all();
        return view('dashboard.program.create', ['data' => $course]);
    }
    public function store(Request $request, Program $program)
    {
        // dd($request);
        $this->validate($request, [
            // 'nama' => 'required',
            'jumlah_sks' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'metode_kegiatan' => 'required',
            'kegiatan' => 'required',
            'rincian_kegiatan' => 'required',
            'kriteria_peserta' => 'required',
            // 'informasi_tambahan' => 'required',
        ]);

        // get name course
        $name = CourseCategory::where('id', $request->course_categories_id)->first()->name;
        // dd($name);

        // insert requst to table
        $data = $request->all();
        $data['nama'] = $name;
        $data['slug'] = SlugService::createSlug(Program::class, 'slug', $name);
        Program::create($data);

        return redirect('/dashboard/program')->with('success', 'new program has been added');
    }
    public function edit($slug)
    {
        $data = DB::table('programs')->where('slug', $slug)->first();
        $course = CourseCategory::all();
        return view('dashboard.program.edit', ['data' => $data], ['dataa' => $course]);
    }

    public function update(Request $request, Program $program)
    {
        // dd($program);
        $this->validate($request, [
            'nama' => 'required',
            'jumlah_sks' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'metode_kegiatan' => 'required',
            'kegiatan' => 'required',
            'rincian_kegiatan' => 'required',
            'kriteria_peserta' => 'required',
            // 'informasi_tambahan' => 'required',
        ]);

        // insert requst to table
        $data = $request->all();
        $data['slug'] = SlugService::createSlug(Program::class, 'slug', $request->nama);
        $program->update($data);

        return redirect('/dashboard/program')->with('success', 'program has been updated');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect('/dashboard/program')->with('success', 'program has been deleted');
    }

    public function preview($slug)
    {
        $program = Program::with('kompetensi')->where('slug', $slug)->first();
        // dd($program);

        return view('dashboard/program/preview', ['program' => $program]);
    }

    public function register_program(Request $request, $slug)
    {
        $course = CourseCategory::where('slug', $slug)->first()->id;

        $user = User::find(Auth::user()->id);
        $user->course_categories_id = $course;
        $user->save();

        return redirect('/chapteruser/' . $slug);
        // dd($user);
    }
}
