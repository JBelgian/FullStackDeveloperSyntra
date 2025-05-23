<?php

namespace App\Http\Controllers;

use App\Models\Location;

class LocationController extends Controller
{
    public function show($id)
    {
        // The Eloquent way with automatic error handling
        $location = Location::where('id', $id)->firstOrFail();
        
        return view('location', ['location' => $location]);
    }
}
