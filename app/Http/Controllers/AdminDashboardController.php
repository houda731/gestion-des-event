<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $eventsCount = Event::count();
        $reservationsCount = Reservation::count();
        $latestReservations = Reservation::with('event')->latest()->limit(10)->get();
        return view('admin.dashboard', compact('eventsCount', 'reservationsCount', 'latestReservations'));
    }
}
