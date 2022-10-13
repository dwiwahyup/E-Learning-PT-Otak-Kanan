<?php

namespace App\Http\Controllers;

// use App\Quiz;
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

        $id = $request->chapters_id;
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'chapters_id' => 'required',
            'image_url' => 'required'
        ]);

        $images = $request->file('image');

        if ($request->hasFile('image')) {
            $filename = $images->getClientOriginalName();
            $images->move(public_path('/quiz/quizimage/'), $filename);
            // $path = $images->store('public/imagecontent');
        } else {
            $filename = null;
        }

        DB::table('quizzes')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'chapters_id' => $request->chapters_id,
            'image_url' => $filename
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

    public function update(Request $request, $id)
    {

        // dd($request);
        $data = DB::table('quizzes')->find($id);
        $chapters_id = $request->chapters_id;

        // $this->validate($request, [
        //     'question' => 'required',
        //     'answer' => 'required',
        //     'chapters_id' => 'required',
        //     'image_url' => 'image'
        // ]);

        if ($request->hasFile('image')) {
            $path = public_path() . '/quiz/quizimage/';
            // dd($path);

            if ($data->image_url != '' && $data->image_url) {
                $file_old = $path . $data->image_url;
                unlink($file_old);
            }

            $images = $request->file('image');
            $filename = $images->getClientOriginalName();
            $images->move(public_path('/quiz/quizimage/'), $filename);

            DB::table('quizzes')->where('id', $request->id)->update([
                'question' => $request->question,
                'answer' => $request->answer,
                'chapters_id' => $request->chapters_id,
                'image_url' => $filename
            ]);
        }
        DB::table('quizzes')->where('id', $request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'chapters_id' => $request->chapters_id
            // 'image_url' => $filename
        ]);

        return redirect()->action(
            [QuizController::class, 'index'],
            ['id' => $chapters_id]
        );
    }

    public function delete($id)
    {
        $data = DB::table('quizzes')->get();

        DB::table('quizzes')->where('id', $id)->delete();

        if ($data->image_url != null) {
            $path = public_path() . '/quiz/quizimage/';
            $file_old = $path . $data->image_url;
            unlink($file_old);
        }
        return redirect()->back();
    }
}
