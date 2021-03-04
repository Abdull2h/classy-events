<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Mail;
use App\Models\User;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Attendant;
use App\Mail\ContactUs;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('contact_us');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user()->id;

        if ( $user = Admin::where('user_id',$user)->first() ) {

            $now = new DateTime();
            $date = $now->format('Y-m-d');

            $future_events = Event::where('Date','>',$date)->orderBy('Date','ASC')->get();
            $today_events = Event::where('Date','=',$date)->orderBy('Date','ASC')->get();
            $past_events = Event::where('Date','<',$date)->orderBy('Date','ASC')->get();

            return view('admin.index',compact('future_events','today_events', 'past_events'));

        } else {
            return back()->with('error','Not authorized');
        }
    }

    public function active_host()
    {
            $event = Event::select('owner')->groupBy('owner')->orderByRaw('COUNT(*) DESC')->first('owner');

            if (!$event)
            {
                return $active_host = false;

            } else {

                $active_host = User::where('id', $event->owner)->first();
                return $active_host;
            }
    }

    public function active_doorman()
    {
            $event = Event::select('doorman')->groupBy('doorman')->orderByRaw('COUNT(*) DESC')->first('doorman');

            if (!$event)
            {
                return $active_event = false;

            } else {

                $active_doorman = User::where('id', $event->doorman)->first();
                return $active_doorman;
            }
    }

    public function active_event()
    {
            $event = Attendant::select('event_id')->groupBy('event_id')->orderByRaw('COUNT(*) DESC')->first();

            if (!$event)
            {
                return $active_event = false;

            } else {

                $active_event = Event::find($event)->first();
                return $active_event;

            }

    }

    public function reports()
    {
        $user = Auth()->user()->id;

        if ( $user = Admin::where('user_id',$user)->first() )
        {

            $active_host = $this->active_host();
            $active_doorman = $this->active_doorman();
            $active_event = $this->active_event();

            return view('admin.reports',compact('active_host', 'active_doorman', 'active_event'));

        } else {

            return back()->with('error','Not authorized');
        }
    }

    public function contact_us (Request $request)
    {
            $this->validate($request, [
                'name'     =>  'required',
                'email'  =>  'required|email',
                'subject'  =>  'required',
                'message' =>  'required'
                ]);

                    $data = array(
                        'name'      =>  $request->name,
                        'email'      =>  $request->email,
                        'subject'      =>  $request->subject,
                        'message'   =>   $request->message
                    );

                Mail::to('aboode.797@gmail.com')->send(new ContactUs($data));
                return back();
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
