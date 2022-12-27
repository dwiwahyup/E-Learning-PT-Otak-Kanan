<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Logbook;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\SchedulePeriod;
use App\Models\ScheduleLogbook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserLogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $schedule = SchedulePeriod::where('course_categories_id', Auth::user()->course_categories_id)->get();
        $user_course_id = Auth::user()->course_categories_id;
        $schedule = DB::table('schedule_periods')
            ->join('schedule_logbooks', function ($join) use ($user_course_id) {
                $join
                    ->on('schedule_periods.id', '=', 'schedule_logbooks.schedule_periods_id')
                    ->where('schedule_periods.course_categories_id', '=', $user_course_id);
            })
            ->select('schedule_periods.period_name', 'schedule_periods.id', 'schedule_periods.slug', DB::raw("MAX(schedule_logbooks.date) as end_date"), DB::raw("min(schedule_logbooks.date) as start_date"))
            ->groupBy('schedule_periods.id')
            ->get();
        // dd($schedule);

        return view('frontend.logbook.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);


        return view('frontend.logbook.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $schedule_period_id = ScheduleLogbook::where('id', $id)->first()->schedule_periods_id;
        // dd($schedule_period_id);

        $schedule_period_slug = SchedulePeriod::where('id', $schedule_period_id)->first()->slug;

        $this->validate($request, [
            'description' => 'required|string'
        ]);

        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $data['schedule_logbooks_id'] = $id;

        Logbook::create($data);

        return redirect()->route('my_logbooks.show', ['my_logbook' => $schedule_period_slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $schedule_periods_id = SchedulePeriod::where('slug', $slug)->first()->id;
        // dd($schedule_periods_id);

        $schedule = DB::table('schedule_periods')
            ->join('schedule_logbooks', function ($join) use ($schedule_periods_id) {
                $join
                    ->on('schedule_periods.id', '=', 'schedule_logbooks.schedule_periods_id')
                    ->where('schedule_logbooks.schedule_periods_id', '=', $schedule_periods_id);
            })
            ->select('schedule_periods.period_name', 'schedule_periods.id', 'schedule_periods.slug', DB::raw("MAX(schedule_logbooks.date) as end_date"), DB::raw("min(schedule_logbooks.date) as start_date"))
            ->first();
        // dd($schedule);

        $schedule_logbooks = ScheduleLogbook::where('schedule_periods_id', $schedule_periods_id)->get();

        return view('frontend.logbook.show', compact('schedule_logbooks', 'schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
