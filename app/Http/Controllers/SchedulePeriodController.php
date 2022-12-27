<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\SchedulePeriod;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SchedulePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $period = SchedulePeriod::with('users:id,name', 'courses:id,name')->get();
        $course = CourseCategory::all('id', 'name');
        // dd($period);

        return view('dashboard.schedule_period.index', compact('period', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'period_name' => 'required|max:50'
        ]);

        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $data['slug'] = SlugService::createSlug(SchedulePeriod::class, 'slug', $request->period_name);
        SchedulePeriod::create($data);

        return redirect()->route('schedule_periods.index')->with('success', 'schedule period has been added');
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
        // dd($request);
        $this->validate($request, [
            'period_name' => 'required|max:50'
        ]);

        $schedule = SchedulePeriod::find($id);
        // dd($schedule);

        $schedule->period_name = $request->period_name;
        $schedule->users_id = Auth::user()->id;

        $schedule->save();

        return redirect()->back()->with('success', 'schedule period has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchedulePeriod $schedulePeriod)
    {
        // dd($schedulePeriod);
        $schedulePeriod->delete();

        return redirect()->route('schedule_periods.index')->with('success', 'schedule period has been deleted');
    }
}
