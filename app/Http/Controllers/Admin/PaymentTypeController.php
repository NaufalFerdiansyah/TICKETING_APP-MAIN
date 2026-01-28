<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('admin.payment-type.index', compact('paymentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.payment-types.index')->with('error', 'Nama tipe pembayaran wajib diisi.');
        }

        PaymentType::create([
            'nama' => $payload['nama'],
            'deskripsi' => $payload['deskripsi'] ?? null,
            'is_active' => $payload['is_active'] ?? true,
        ]);

        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.payment-types.index')->with('error', 'Nama tipe pembayaran wajib diisi.');
        }

        $paymentType = PaymentType::findOrFail($id);
        $paymentType->nama = $payload['nama'];
        $paymentType->deskripsi = $payload['deskripsi'] ?? null;
        $paymentType->is_active = $payload['is_active'] ?? true;
        $paymentType->save();

        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PaymentType::destroy($id);
        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil dihapus.');
    }
}
