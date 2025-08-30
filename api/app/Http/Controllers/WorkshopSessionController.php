<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkshopSession;
use App\Models\Workshop;

class WorkshopSessionController extends Controller
{
    public function store(Request $request, $workshop)
    {
        $workshop = Workshop::findOrFail($workshop);

        $validated = $request->validate([
            'capacity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        // Numéro de session automatique : max + 1
        $lastNumber = $workshop->workshopSessions()->max('session_number') ?? 0;
        $validated['session_number'] = $lastNumber + 1;
        $validated['workshop_id'] = $workshop->id;

        $session = WorkshopSession::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Session créée avec succès ✅',
            'data' => $session
        ], 201);
    }

    public function update(Request $request, $workshop, $id)
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

    public function destroy($workshop, $id)
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
