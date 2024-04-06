<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Event;

class AgendaController extends Controller
{
    public function index($event_name)
    {
        // Obține detaliile agendei asociate evenimentului cu numele dat
        $agenda = Agenda::where('event_name', $event_name)->get();

        return view('agenda.index', compact('agenda'));
    }


    public function createAgenda(Request $request)
    {
        // Validează datele
        $request->validate([
            'event_name' => 'required|string|max:255',
            'session' => 'required|string',
            'workshop' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'speaker' => 'required|string',
            'topic' => 'required|string',
            'room' => 'required|string',
        ]);

        // Găsește evenimentul după nume
        $event = Event::where('name', $request->input('event_name'))->first();

        // Verifică dacă evenimentul există
        if ($event) {
            // Creează o nouă înregistrare în baza de date pentru "agendas"
            Agenda::create([
                'event_name' => $request->input('event_name'),
                'session' => $request->input('session'),
                'workshop' => $request->input('workshop'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'speaker' => $request->input('speaker'),
                'topic' => $request->input('topic'),
                'room' => $request->input('room'),
            ]);

            // Redirecționează înapoi cu un mesaj de succes
            return redirect()->route('admin.index')->with('success', 'Agenda adăugată cu succes!');
        } else {
            // Evenimentul nu există, afișează un mesaj de eroare
            return redirect()->route('admin.index')->with('error', 'Evenimentul asociat nu există!');
        }
    }
}
