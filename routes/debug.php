<?php

use Illuminate\Support\Facades\Route;
use App\Models\Location;

Route::get('/debug-locations', function() {
    $locations = Location::all();
    return [
        'total' => $locations->count(),
        'active' => Location::where('is_active', 'Y')->count(),
        'inactive' => Location::where('is_active', 'N')->count(),
        'all_locations' => $locations->map(fn($l) => [
            'id' => $l->id,
            'nama' => $l->nama,
            'is_active' => $l->is_active
        ])
    ];
});
