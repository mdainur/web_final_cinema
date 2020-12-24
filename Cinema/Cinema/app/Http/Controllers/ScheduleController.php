<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'movie_id' => 'required',
            'day_id' => 'required',
            'hall_number' => 'required|integer|between:1,4',
            'time' => 'required',
            'price_ch' => 'required',
            'price_st' => 'required',
            'price_ad' => 'required',
        ]);
        $arr = array();
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 12; $j++) {
                $arr[$i][$j] = 0;
            }
        }

        $request['places'] = json_encode($arr);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')
                        ->with('success', 'Расписание успешно добавлен.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule) {
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule) {
        $request->validate([
            'movie_id' => 'required',
            'day_id' => 'required',
            'hall_number' => 'required|integer|between:1,4',
            'time' => 'required',
            'price_ch' => 'required',
            'price_st' => 'required',
            'price_ad' => 'required',
            'finished' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
                        ->with('success', 'Расписание успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule) {
        $schedule->delete();

        return redirect()->route('schedules.index')
                        ->with('success', 'Расписание успешно удален.');
    }

}
