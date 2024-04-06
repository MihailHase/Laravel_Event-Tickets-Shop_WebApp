<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function show($id)
    {
        $event = Event::with('tickets')->findOrFail($id);
        $tickets = $event->tickets;

        return view('events.show', compact('event', 'tickets'));
    }

}
