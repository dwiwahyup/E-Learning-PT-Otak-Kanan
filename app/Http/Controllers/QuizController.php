<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $data = DB::table('quizzes')->get();

        // dd($data);
        return view('dashboard.quiz.index', ['data' => $data]);
    }

    public function create()
    {
        return view('dashboard.quiz.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);

        DB::table('quizzes')->insert([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect('/dashboard/quiz')->with('success', 'new quiz has been added');
    }

    public function edit($id)
    {
        $data = DB::table('quizzes')->where('id', $id)
            ->get();

        return view('dashboard.quiz.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('quizzes')->where('id', $request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect('/dashboard/quiz')->with('success', 'quiz has been updated');
    }

    public function delete($id)
    {
        DB::table('quizzes')->where('id', $id)->delete();

        return redirect('/dashboard/quiz')->with('success', 'quiz has been deleted');
    }
}
