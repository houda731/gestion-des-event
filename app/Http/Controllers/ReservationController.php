<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Admin list
    public function index()
    {
        $reservations = Reservation::with('event')->latest()->paginate(20);
        return view('admin.reservations.index', compact('reservations'));
    }

    // Public create/store
    public function create(Event $event)
    {
        return view('public.reservations.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'number_of_places' => 'required|integer|min:1|max:10',
        ]);

        $validated['event_id'] = $event->id;
        Reservation::create($validated);

        return redirect()->route('events.show', $event)->with('success', 'Votre réservation a été enregistrée avec succès.');
    }
}
