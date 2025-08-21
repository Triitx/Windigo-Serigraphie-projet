<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkshopSession;
use App\Models\Workshop;

class WorkshopSessionController extends Controller
{
    public function store(Request $request, $workshop_id)
    {
        $validated = $request->validate([
            'session_number' => 'required|integer',
            'capacity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $session = WorkshopSession::create([
            'session_number' => $validated['session_number'],
            'capacity' => $validated['capacity'],
            'workshop_id' => $workshop_id,
            'date' => $request->date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Session créée avec succès ✅',
            'data' => $session
        ], 201);
    }

    /**
     * Mettre à jour une session
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'session_number' => 'integer',
            'capacity' => 'integer|min:1',
            'date' => 'date',
        ]);

        $session = WorkshopSession::findOrFail($id);
        $session->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Session mise à jour ✅',
            'data' => $session
        ]);
    }

    /**
     * Supprimer une session
     */
    public function destroy($id)
    {
        $session = WorkshopSession::findOrFail($id);
        $session->delete();

        return response()->json([
            'success' => true,
            'message' => 'Session supprimée ❌',
            'data' => ['id' => $id]
        ]);
    }
}
