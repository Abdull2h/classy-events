<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DateTime;
use App\Models\Event;
use App\Models\Attendant;
use App\Models\Doorman;

class DoormanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth()->user()->id;

        if ( Doorman::where('user_id',$user)->first() ) {

            $now = new DateTime();
            $date = $now->format('Y-m-d');

            $future_events = Event::where('doorman',$user)->where('Date','>',$date)->get();
            $today_events = Event::where('doorman',$user)->where('Date','=',$date)->get();
            $past_events = Event::where('doorman',$user)->where('Date','<',$date)->get();

            return view('doorman.index',compact('future_events','today_events', 'past_events'));

        } else {

            return back();
        }

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
    public function destroy($id)
    {
        //
    }
}
