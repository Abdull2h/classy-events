<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DateTime;
use Mail;
use App\Models\User;
use App\Models\Event;
use App\Models\Attendant;
use App\Models\Admin;
use App\Models\Host;
use App\Models\Doorman;
use App\Mail\SendInvitation;
use App\Mail\AssignDoorman;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();

        if ( Event::where('owner',$user->id)->first() ) {
            $now = new DateTime();
            $date = $now->format('Y-m-d');

            $future_events = Event::where('owner',$user->id)->where('Date','>',$date)->orderBy('Date','ASC')->get();
            $today_events = Event::where('owner',$user->id)->where('Date','=',$date)->orderBy('Date','ASC')->get();
            $past_events = Event::where('owner',$user->id)->where('Date','<',$date)->orderBy('Date','ASC')->get();

            return view('host.index',compact('future_events','today_events', 'past_events'));

        } else {

            return back()->with('error','Not authorized');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth()->user()->id;

        if ( Host::where('user_id',$user)->first() ) {

            $doormen = Doorman::get();
            return view('host.create_event',compact('doormen'));

        } else {
            return back()->with('error', 'Not authorized to create event');
        }
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

        return redirect('/host')->with('status', 'Event Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user || $event->doorman == $user || Admin::where('user_id',$user)->first() ) {

            $attendants = Attendant::where('event_id',$id)->get();

            return view('host.show',compact('event','attendants'));

        } else {

            return back()->with('error', 'Not authorized to show event');


        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user || Admin::where('user_id',$user)->first() ) {

            $doormen = Doorman::get();

            return view('host.edit_event',compact('event','doormen'));

        } else {
            return back()->with('error','Not authorized to edit event');
        }

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
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:500',
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

            $filename = Event::where('id',$id)->first()->image;
        }

        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->doorman = $request->doorman;
        $event->image = $filename;
        $event->owner = Auth()->user()->id;


        $event->save();

        return redirect('/host')->with('status', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user || Admin::where('user_id',$user)->first() ) {

            $event = Event::find($id);
            $event->delete();

            return redirect('/host')->with('status', 'Event Deleted!');

        } else {

            return back()->with('error', 'Not authorized to delete event');

        }

    }

    public function send_invitation ($id)
    {
        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user ) {

        $recipints = Attendant::where('event_id',$id)->get();

        foreach ($recipints as $recipint) {
        Mail::to($recipint)->send(new SendInvitation($event,$recipint));
            }

        return redirect('/event/show/'.$id)->with('status','Invitations sent by email');

        } else {

        return back()->with('error','Not authorized to send invitations');


        }

    }

    public function assign_doorman ($id)
    {
        $user = Auth()->user()->id;
        $event = Event::where('id',$id)->first();

        if ( $event->owner == $user ) {

        $recipint = User::where('id',$event->doorman)->first();

        Mail::to($recipint)->send(new AssignDoorman($event,$recipint));

        return redirect('/event/show/'.$id)->with('status',"Asigment sent to doorman's email");

        } else {

        return back()->with('error','Not authorized to send invitations');

        }

    }
}
