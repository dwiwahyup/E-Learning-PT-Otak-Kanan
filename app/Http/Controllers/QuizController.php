<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index($id)
    {
        $data = DB::table('quizzes')->where('chapters_id', $id)->get();

        // dd($data);
        return view('dashboard.quiz.index', ['data' => $data, 'id' => $id]);
    }

    public function create($id)
    {
        return view('dashboard.quiz.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'question' => 'required',
        //     'answer' => 'required'
        // ]);

        $id = $request->chapters_id;

        DB::table('quizzes')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'chapters_id' => $request->chapters_id
        ]);

        return redirect()->action(
            [QuizController::class, 'index'],
            ['id' => $id]
        );
    }

    public function edit($id)
    {
        $data = DB::table('quizzes')->where('id', $id)->get();

        return view('dashboard.quiz.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {

        $id = $request->chapters_id;

        DB::table('quizzes')->where('id', $request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            $request->chapters_id
        ]);

        return redirect()->action(
            [QuizController::class, 'index'],
            ['id' => $id]
        );
    }

    public function delete($id)
    {
        DB::table('quizzes')->where('id', $id)->delete();

        return redirect()->back();
    }
}
