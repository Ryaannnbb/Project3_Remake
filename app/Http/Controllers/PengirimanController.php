<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Pesanan;
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
        $pesanan = Pesanan::all();
        return view('pengiriman.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengiriman = new Pengiriman;
        $pengiriman->pesanan_id = $request->pesanan;
        $pengiriman->tanggal_pengiriman = $request->tanggal_pengiriman;
        $pengiriman->save();

        $pesanan = Pesanan::find($request->pesanan);
        $pesanan->status = 'dikirim';
        $pesanan->update();
        return redirect()->route('pengiriman.index');
    }

    public function tiba($id) {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'sampai';
        $pesanan->update();
        return redirect()->route('shop.order');
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
