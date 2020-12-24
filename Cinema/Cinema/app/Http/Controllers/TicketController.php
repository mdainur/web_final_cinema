<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
       $ticket->approved = 1;
       $ticket->save();

       return redirect('/admin?schedule_id='.$ticket->schedule->id)
                        ->with('success','Билет успешно одобрен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $sch = \App\Models\Schedule::find($ticket->schedule->id);
        $places = json_decode($sch->places,true);

     function ryad($iterator) {
            $it = 0;

            for ($i = 0; $i < 9; $i++) {
                for ($j = 0; $j < 12; $j++) {
                    $it++;
                    if ($iterator == $it) {

                        $pl['row'] = $i + 1;
                        $pl['seat'] = $j + 1;

                        return $pl;
                    }
                }
            }
        }

        $pp = ryad($ticket->place);
            for ($i = 0; $i < 9; $i++) {
                for ($j = 0; $j < 12; $j++) {

                    if ($i == $pp['row'] - 1 && $j == $pp['seat'] - 1)
                        $places[$i][$j] = 0;
                }
            }


        $sch->places =  json_encode($places);
        $sch->save();






         $ticket->delete();

        return redirect()->route('profile')
                        ->with('success','Билет успешно отменен.');
    }
}
