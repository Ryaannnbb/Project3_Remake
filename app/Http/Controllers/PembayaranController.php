<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view("pembayaran.index", compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembayaran = Pembayaran::all();
        return view("pembayaran.create", compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'no_rekening' => 'required|numeric',
        ], [
            'metode_pembayaran.required' => 'Kolom Metode Pembayaran wajib diisi.',
            'metode_pembayaran.string' => 'Metode Pembayaran harus berupa teks.',
            'metode_pembayaran.max' => 'Metode Pembayaran tidak boleh lebih dari :max karakter.',

            'no_rekening.required' => 'Kolom Nomor Rekening wajib diisi.',
            'no_rekening.numeric' => 'Nomor Rekening harus berupa angka.',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran')->with("success","Data pembayaran berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::find($id);
        return view("pembayaran.edit", compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'no_rekening' => 'required|numeric',
        ], [
            'metode_pembayaran.required' => 'Kolom Metode Pembayaran wajib diisi.',
            'metode_pembayaran.string' => 'Metode Pembayaran harus berupa teks.',
            'metode_pembayaran.max' => 'Metode Pembayaran tidak boleh lebih dari :max karakter.',

            'no_rekening.required' => 'Kolom Nomor Rekening wajib diisi.',
            'no_rekening.numeric' => 'Nomor Rekening harus berupa angka.',
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran')->with("success", "Data pembayaran berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Pembayaran::find($id)->delete();
            return redirect()->route('pembayaran')->with("success", "Data pembayaran berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->route('pembayaran')->with("error", "Gagal menghapus karena data pembayaran sedang digunakan!");
        }
    }
}
