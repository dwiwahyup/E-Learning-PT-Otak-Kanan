<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Logbook;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;

class LogbookController extends Controller
{
    public function index()
    {
        $data = DB::table('course_categories')
            ->leftJoin('users', function ($join) {
                $join->on('course_categories.id', '=', 'users.course_categories_id');
            })
            ->select('course_categories.id', 'course_categories.name', 'course_categories.slug', DB::raw("(CASE WHEN users.roles = 'USER' THEN COUNT(users.course_categories_id) ELSE 0 END) as users_count"))
            ->groupBy('course_categories.id')
            ->get();
        // $data = CourseCategory::all('name');

        // dd($data);
        return view('dashboard.logbook.index', ['data' => $data]);
    }

    public function create()
    {
        return view('frontend.layouts.logbook');
    }

    public function store(Request $request)
    {
        dd($request);
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

    public function update(Request $request, Logbook $logbook)
    {
        // dd($logbook);
        $data = $request->all();
        $logbook->update($data);
        // $data['status'] = 

        return redirect()->back();
    }

    public function show()
    {
    }

    public function delete($id)
    {
        DB::table('logbooks')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function students_logbooks($slug)
    {
        $course = CourseCategory::where('slug', $slug)->first();

        // join relation on table loogbooks and course_categories
        $users = User::with(['logbooks', 'courses'])->where('course_categories_id', $course->id)->get();
        // dd($users);
        return view('dashboard.logbook.students-logbooks', compact('users', 'course'));
    }

    public function list_logbooks_students($slug)
    {
        $user = User::with(['courses'])->where('slug', $slug)->first();
        $query = Logbook::with('schedules.periods')->where('users_id', $user->id)->orderBy('id', 'DESC')->get();
        // dd($query);

        return view('dashboard.logbook.students-logbooks-show', compact('query', 'user'));
    }

    // public function logbook()
    // {
    //     return view('frontend.layouts.logbook');
    // }
    public function logbook()
    {
        return view('frontend.logbook.index');
    }

    public function show_logbook()
    {
        return view('frontend.logbook.logbook');
    }
    public function add_logbook()
    {
        return view('frontend.logbook.create');
    }
}
