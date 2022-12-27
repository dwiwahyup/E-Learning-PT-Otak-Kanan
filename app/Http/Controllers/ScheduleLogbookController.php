<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use GuzzleHttp\Promise\Create;
use App\Models\ScheduleLogbook;
use App\Models\SchedulePeriod;

class ScheduleLogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $id_schedule_period = SchedulePeriod::where('slug', $slug)->first()->id;
        $schedule = ScheduleLogbook::with('schedules.users')->where('schedule_periods_id', $id_schedule_period)->get();
        // dd($schedule);
        return view('dashboard.schedule_logbooks.index', compact('schedule', 'id_schedule_period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('dashboard.schedule_logbooks.create', compact('slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($id);
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $date_start = Carbon::createFromFormat("Y-m-d", $request->start_date);
        $date_end = Carbon::createFromFormat("Y-m-d", $request->end_date);
        $period = CarbonPeriod::create($date_start, $date_end)->toArray();

        // dd($period);

        foreach ($period as $value) {
            ScheduleLogbook::create([
                'date' => $value,
                'schedule_periods_id' => $id,
            ]);
        }

        return redirect()->back()->with('success', 'new schedule logbooks has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(SchedulePeriod $schedule_period, ScheduleLogbook $schedule_logbook)
    {
        // dd($schedule_logbook);

        $schedule_logbook->delete();

        return redirect()->back()->with('success', 'schedule logbooks has been deleted');
    }
}
