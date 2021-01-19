<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendant;
use App\Models\Admin;
use App\Models\Host;
use App\Models\Doorman;



class AttendantController extends Controller
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
    public function create($id)
    {
        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user) {

            return view('host.create_invite', compact('event'));

        } else {
            return 'NO';
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
            $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:500',
            'seats' => 'required|max:200',
        ]);

            $event = Event::where('id',$id)->first();

            $attendant = new Attendant();
            $attendant->name = $request->name;
            $attendant->email = $request->email;
            $attendant->seats = $request->seats;
            $attendant->code = rand(0,999999);
            $attendant->event_id = $id;

            $attendant->save();

            return redirect('/event/show/'.$id);



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
    public function edit($id, $aid)
    {

        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user || Admin::where('user_id',$user)->first() ) {

            $attendant = Attendant::where('event_id',$id)->where('id',$aid)->first();
            return view('host.edit_invite', compact('attendant'));

        } else {
            return 'NO';
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $aid)
    {
            $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:500',
            'seats' => 'required|max:200',
        ]);

            $event = Event::where('id',$id)->first();

            $attendant = Attendant::find($aid);
            $attendant->name = $request->name;
            $attendant->email = $request->email;
            $attendant->seats = $request->seats;

            $attendant->save();

            return redirect('/event/show/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $aid)
    {

        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user || Admin::where('user_id',$user)->first() ) {

            $attendant = Attendant::find($aid);
            $attendant->delete();

            return redirect('/event/show/'.$id);

        } else {
            return 'NO';
        }

    }
}
