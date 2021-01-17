<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\Event;
use App\Models\Attendant;
use App\Models\Doorman;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_events = Event::where('owner',Auth::user()->id)->get();
        return view('host.index',compact('my_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doormen = Doorman::get();
        return view('host.create_event',compact('doormen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:500',
            'description' => 'required|max:200',
            'date' => 'required|max:200',
            'time' => 'required|max:200',
            'location' => 'required|max:200',
            'doorman' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/images', $filename);

        } else {

            $filename = 'no-image.png';
        }

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->doorman = $request->doorman;
        $event->image = $filename;
        $event->owner = Auth()->user()->id;


        $event->save();

        return redirect('/host');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('id',$id)->first();
        $attendants = Attendant::where('event_id',$id)->get();

        return view('host.show',compact('event','attendants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('host.edit_event',compact('id'));
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
