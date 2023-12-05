<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengirimans = Pengiriman::all();
        return view("pengiriman.index", compact('pengirimans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pesanan = Pesanan::where('status', 'paid')->get();
        return view('pengiriman.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal_pengiriman' => 'required|date|after_or_equal:today',
            'pesanan' => 'required'
        ], [
            'pesanan.required' => 'Tanggal pengiriman wajib diisi.',
            'tanggal_pengiriman.required' => 'Tanggal pengiriman wajib diisi.',
            'tanggal_pengiriman.after_or_equal' => 'Tanggal pengiriman harus sama atau setelah tanggal hari ini.',
        ]);

        // Proses penyimpanan data
        $pengiriman = new Pengiriman;
        $pengiriman->pesanan_id = $request->pesanan;
        $pengiriman->tanggal_pengiriman = $request->tanggal_pengiriman;
        $pengiriman->save();

        $pesanan = Pesanan::find($request->pesanan);
        $pesanan->status = 'shipped';
        $pesanan->update();

        return redirect()->route('pengiriman.index')->with("success", "Data pengiriman berhasil ditambahkan!");
    }

    public function tiba($id) {
        $pesanan = Pesanan::find($id);
        $pengiriman = Pengiriman::where('pesanan_id', $id)->first();

        $pesanan->status = 'delivered';
        $pesanan->save();
        $pengiriman->tanggal_menerima = now();
        $pengiriman->save();
        return redirect()->back();
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
