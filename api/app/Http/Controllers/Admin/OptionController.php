<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        return Option::all();
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
        ]);


        $option = new Option();
        $option->fill($formFields);
        $option->save();
        return response()->json($option);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {

        return response()->json($option);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $option)
    {
        $formFields = $request->validate([
            'name' => 'string',
        ]);

        $option->fill($formFields);
        $option->save();
        return response()->json($option);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return response()->json(['success' => 'success']);
    }
}
