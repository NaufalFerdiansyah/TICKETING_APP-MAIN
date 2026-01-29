<?php

use Illuminate\Support\Facades\Route;
use App\Models\Location;

Route::get('/test-deleted', function() {
    $all = Location::withTrashed()->get();
    $deleted = Location::onlyTrashed()->get();
    
    return [
        'total_all' => count($all),
        'total_deleted' => count($deleted),
        'all_locations' => $all->map(fn($l) => [
            'id' => $l->id,
            'nama' => $l->nama,
            'deleted_at' => $l->deleted_at
        ]),
        'deleted_locations' => $deleted->map(fn($l) => [
            'id' => $l->id,
            'nama' => $l->nama,
            'deleted_at' => $l->deleted_at
        ])
    ];
});
