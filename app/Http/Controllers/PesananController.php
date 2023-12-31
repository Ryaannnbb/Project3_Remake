<?php

namespace App\Http\Controllers;

use App\Models\Detailpesanan;
use App\Models\pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::whereNot('status', 'rejected')->whereNot('status', 'completed')->get();
        return view("pesanan.index", compact("pesanans"));
    }

    public function terima(string $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'waiting payment';
        $pesanan->save();

        return redirect()->route('pesanan.index')->with("acc", "Pesanan berhasil disetujui!");

    }
    public function tolak(Request $request, string $id)
    {
        $request->validate([
            'pesan_tolak' => 'required|string|max:255', // Sesuaikan dengan kebutuhan Anda
        ]);
        
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'rejected';
        $pesanan->pesan_tolak = $request->pesan_tolak;
        $pesanan->save();

        return redirect()->route('pesanan.index')->with("reject", "Pesan penolakan berhasil dikirim!");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanans = Detailpesanan::where('pesanan_id', $id)->get();

        return view('pesanan.detail', compact('pesanans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
