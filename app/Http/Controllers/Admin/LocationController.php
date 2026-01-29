<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::where('is_active', 'Y')->get();
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not used - we use modal dialog instead
        return redirect()->route('admin.locations.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not used - we use modal dialog instead
        return redirect()->route('admin.locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.show', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $payload['is_active'] = 'Y';
        Location::create($payload);

        return redirect()->route('admin.locations.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $location = Location::findOrFail($id);
        $location->update($payload);

        return redirect()->route('admin.locations.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->update(['is_active' => 'N']);
        return redirect()->route('admin.locations.index')->with('success', 'Lokasi berhasil dihapus.');
    }

    /**
     * Display deleted locations.
     */
    public function trashed()
    {
        $locations = Location::where('is_active', 'N')->get();
        return view('admin.location.trashed', compact('locations'));
    }

    /**
     * Restore a soft-deleted location.
     */
    public function restore(string $id)
    {
        $location = Location::findOrFail($id);
        $location->update(['is_active' => 'Y']);
        return redirect()->route('admin.locations.index')->with('success', 'Lokasi berhasil dipulihkan.');
    }

    /**
     * Permanently delete a location.
     */
    public function forceDelete(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.locations.trashed')->with('success', 'Lokasi berhasil dihapus permanen.');
    }
}
