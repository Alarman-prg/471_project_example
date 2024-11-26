<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function admin_index(Request $request)
    {
        /*
        print "<pre>";
        print_r(\App\Models\Event::list());
        print "</pre>";
        */

        return view('admin_events', ['rs' => \App\Models\Event::list()]);
    }

    public function admin_event_add(Request $request)
    {
        $event_name = $request['event_name'];
        $event_desc = $request['event_desc'];
        $event_date = $request['event_date'];

        \App\Models\Event::add($event_name, $event_desc, $event_date);

        return view('admin_events', ['rs' => \App\Models\Event::list()]);
    }

    public function index(Request $request)
    {
        /*
        print "<pre>";
        print_r(\App\Models\Event::list());
        print "</pre>";
        */

        return view('home', ['rs' => \App\Models\Event::list()]);
    }

    public function get(Request $request, $event_id)
    {
        /*
        print "<pre>";
        print_r(\App\Models\Event::get($event_id));
        print "</pre>";
        */

        return view('event', ['event' => \App\Models\Event::get($event_id)[0],
            'attendees' => \App\Models\Event::attendee_list($event_id)
        ]);
    }

    public function signup(Request $request, $event_id)
    {
        $email_address = $request['email_address'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $num_attending = $request['num_attending'];
        $comments = $request['comments'];

        $attendee = \App\Models\Attendee::get($email_address);
        if (count($attendee) == 0) {
            \App\Models\Attendee::add($email_address, $first_name, $last_name);
        }

        \App\Models\Event::attendee_add($event_id, $email_address, $num_attending, $comments);

        session(['email_address' => $email_address]);
        session(['first_name' => $first_name]);
        session(['last_name' => $last_name]);

        return view('home', ['rs' => \App\Models\Event::list()]);
    }

    public function attendees(Request $request, $event_id)
    {
        print "<pre>";
        print_r(\App\Models\Event::attendee_list($event_id));
        print "</pre>";
    }
}
