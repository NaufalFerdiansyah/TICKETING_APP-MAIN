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
        $paymentTypes = PaymentType::withoutTrashed()->get();
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
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(string $id)
    {
        $paymentType = PaymentType::findOrFail($id);
        $paymentType->delete();
        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil dihapus.');
    }

    /**
     * Display deleted payment types.
     */
    public function trashed()
    {
        $paymentTypes = PaymentType::onlyTrashed()->get();
        return view('admin.payment-type.trashed', compact('paymentTypes'));
    }

    /**
     * Restore a soft-deleted payment type.
     */
    public function restore(string $id)
    {
        $paymentType = PaymentType::withTrashed()->findOrFail($id);
        $paymentType->restore();
        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil dipulihkan.');
    }

    /**
     * Permanently delete a payment type.
     */
    public function forceDelete(string $id)
    {
        $paymentType = PaymentType::withTrashed()->findOrFail($id);
        $paymentType->forceDelete();
        return redirect()->route('admin.payment-types.trashed')->with('success', 'Tipe pembayaran berhasil dihapus permanen.');
    }
}
