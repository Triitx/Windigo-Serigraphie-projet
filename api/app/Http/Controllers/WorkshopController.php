<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        // On charge les ateliers avec les sessions
        $workshops = Workshop::with('workshopSessions')->get();

        // Optionnel : transformer pour inclure la première image directement
        $workshops->transform(function ($workshop) {
            $workshop->first_image_url = $workshop->first_image_url; // utilise l'accessor
            return $workshop;
        });

        return response()->json($workshops);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'age' => 'required|integer',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('workshops', 'public'); // stocke juste le nom/chemin relatif
            }
        }

        $formFields['images'] = $images;

        $workshop = Workshop::create($formFields);

        return response()->json($workshop);
    }

    public function show(Workshop $workshop)
    {
        $workshop->first_image_url = $workshop->first_image_url; // accessor
        return response()->json($workshop);
    }

    public function update(Request $request, Workshop $workshop)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'type' => 'string',
            'price' => 'integer',
            'duration' => 'integer',
            'age' => 'integer',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Conserver les anciennes images
        $existingImages = $workshop->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $existingImages[] = $image->store('workshops', 'public');
            }
        }
        $formFields['images'] = $existingImages;

        $workshop->update($formFields);

        $workshop->first_image_url = $workshop->first_image_url; // accessor

        return response()->json($workshop);
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return response()->json(['success' => 'success']);
    }
}
