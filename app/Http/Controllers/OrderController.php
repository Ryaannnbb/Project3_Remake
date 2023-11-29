<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\Detailpesanan;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = pesanan::where('user_id', auth()->user()->id)->get();
        $detailpesanans = Detailpesanan::where('status', 'checkout')->get();
        // return dd($detailpesanans);
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = $pesanans->count();

        return view("user.pages.order", compact('pesanans', 'detailpesanans', 'totalpesanan', 'order'));
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
        $detailpesanans = Detailpesanan::where('pesanan_id', $id)->get();
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = Detailpesanan::where('status', 'checkout')->get()->count();

        return view("user.pages.detailorder", compact('detailpesanans', 'totalpesanan', 'order'));
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
        pesanan::findOrFail($id)->delete();
        return redirect()->back();
    }
}
