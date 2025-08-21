<?php

namespace App\Http\Controllers;

use App\Models\WorkshopSession;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

     public function index()
    {
        $user = Auth::user();

        // Charger toutes les réservations de l'utilisateur avec leurs sessions et ateliers associés
        $reservations = Reservation::with('session.workshop')
            ->where('user_id', $user->id)
            ->get();

        return response()->json($reservations);
    }

    public function store($session_id)
    {
        $user = Auth::user();

        // 1. Vérifier si la session existe
        $session = WorkshopSession::findOrFail($session_id);

        // 2. Vérifier la capacité
        $currentReservations = $session->reservations()->count();
        if ($currentReservations >= $session->capacity) {
            return redirect()->back()->with('error', 'Cette session est complète.');
        }

        // 3. Vérifier si l’utilisateur a déjà réservé cette session
        $alreadyBooked = Reservation::where('user_id', $user->id)
            ->where('workshop_session_id', $session->id)
            ->exists();

        if ($alreadyBooked) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé cette session.');
        }

        // 4. Créer la réservation
        Reservation::create([
            'user_id' => $user->id,
            'workshop_session_id' => $session->id,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Réservation confirmée ✅');
    }

        public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Vérifier que la réservation appartient bien à l'utilisateur connecté
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('bookings.index')->with('error', 'Vous ne pouvez pas annuler cette réservation.');
        }

        $reservation->delete();

        return redirect()->route('bookings.index')->with('success', 'Réservation annulée ❌');
    }
}
