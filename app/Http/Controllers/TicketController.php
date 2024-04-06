<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Cart;

class TicketController extends Controller
{
    public function index($event_name)
    {
        // Obține biletele asociate evenimentului cu numele dat
        $tickets = Ticket::where('event_name', $event_name)->get();

        return view('tickets.index', compact('tickets'));
    }

    public function addToCart(Request $request, $ticket_id)
    {
        // Găsește biletul după ID
        $ticket = Ticket::findOrFail($ticket_id);

        // Validează datele
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Găsește sau creează un item în coșul de cumpărături
        $cartItem = Cart::firstOrNew([
            'type' => $ticket->type,
            'price' => $ticket->price,
        ]);

        // Crește cantitatea
        $cartItem->quantity += $request->input('quantity');

        // Salvează în coșul de cumpărături
        $cartItem->save();

        // Redirecționează înapoi cu un mesaj de succes
        return redirect()->route('cart');
    }

}
