<?php

namespace App\Http\Controllers\Admin;

use App\Models\TicketType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('admin.ticket-type.index', compact('ticketTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        TicketType::create($payload);

        return redirect()->route('admin.ticket-types.index')->with('success', 'Tipe tiket berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $ticketType = TicketType::findOrFail($id);
        $ticketType->update($payload);

        return redirect()->route('admin.ticket-types.index')->with('success', 'Tipe tiket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TicketType::destroy($id);
        return redirect()->route('admin.ticket-types.index')->with('success', 'Tipe tiket berhasil dihapus.');
    }
}
