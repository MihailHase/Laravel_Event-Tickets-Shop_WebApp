<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function createEventForm()
    {
        return view('admin.index'); // S-ar putea să nu fie necesar dacă afișezi direct formularul de adăugare.
    }

    public function createEvent(Request $request)
    {
        // Validează datele
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'speakers' => 'required|string',
            'sponsors' => 'required|string',
            'partners' => 'required|string',
        ]);

        // Creează un nou eveniment în baza de date
        Event::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'speakers' => $request->input('speakers'),
            'sponsors' => $request->input('sponsors'),
            'partners' => $request->input('partners'),
        ]);

        // Redirecționează înapoi cu un mesaj de succes
        return redirect()->route('admin.index')->with('success', 'Eveniment adăugat cu succes!');
    }

    public function deleteEvent(Request $request)
    {
        // Validează datele
        $request->validate([
            'event_name' => 'required|string|max:255',
        ]);

        // Găsește evenimentul după nume
        $event = Event::where('name', $request->input('event_name'))->first();

        // Verifică dacă evenimentul există
        if ($event) {
            // Șterge evenimentul
            $event->delete();
            // Redirecționează înapoi cu un mesaj de succes
            return redirect()->route('admin.index')->with('success', 'Eveniment șters cu succes!');
        } else {
            // Evenimentul nu există, afișează un mesaj de eroare
            return redirect()->route('admin.index')->with('error', 'Evenimentul nu există!');
        }
    }

    public function createTicket(Request $request)
    {
        // Validează datele
        $request->validate([
            'event_name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'availability' => 'required|integer',
        ]);

        // Găsește evenimentul după nume
        $event = Event::where('name', $request->input('event_name'))->first();

        // Verifică dacă evenimentul există
        if ($event) {
            // Creează un nou bilet în baza de date cu setarea directă a event_name
            Ticket::create([
                'event_name' => $request->input('event_name'),
                'type' => $request->input('type'),
                'price' => $request->input('price'),
                'availability' => $request->input('availability'),
            ]);

            // Redirecționează înapoi cu un mesaj de succes
            return redirect()->route('admin.index')->with('success', 'Bilet adăugat cu succes!');
        } else {
            // Evenimentul nu există, afișează un mesaj de eroare
            return redirect()->route('admin.index')->with('error', 'Evenimentul asociat nu există!');
        }
    }
}
