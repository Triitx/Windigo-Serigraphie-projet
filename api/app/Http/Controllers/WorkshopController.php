<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::with('workshopSessions')->get();
        return response()->json($workshops);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'age' => 'required|integer'
        ]);


        $workshop = new Workshop();
        $workshop->fill($formFields);
        $workshop->save();
        return response()->json($workshop);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {

        return response()->json($workshop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'type' => 'string',
            'price' => 'integer',
            'duration' => 'integer',
            'age' => 'integer'
        ]);

        $workshop->fill($formFields);
        $workshop->save();
        return response()->json($workshop);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return response()->json(['success' => 'success']);
    }
}
