<?php

namespace App\Http\Controllers;

use App\Models\Detailpesanan;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pesanan_id = $id;
        $pesanan = Detailpesanan::where('pesanan_id', $id)->get();
        // foreach($pesanan as $pesan) {
        //     echo $pesan->id;
        // }
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = Detailpesanan::where('status', 'checkout')->get()->count();
        $payments = Pembayaran::all();

        // return dd($pesanan);
        return view('user.pages.checkout', compact('pesanan', 'totalpesanan', 'order', 'payments', 'pesanan_id'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function bayar(Request $request, $id)
    {
        $pesanan = Pesanan::findOrfail($id);
        $pesanan->metode_pembayaran = $request->payment;
        $pesanan->status = 'paid';
        $pesanan->save();
        return redirect()->route('order');
        // return dd($pesanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesanan = new Pesanan;
        $pesanan->user_id = auth()->user()->id;
        $pesanan->total = $request->total;
        $pesanan->save();

        $detailPesanan = $request->pesanan_id;
        foreach ($detailPesanan as $value) {
            Detailpesanan::findOrFail($value)->update(['pesanan_id' => $pesanan->id, 'status' => 'checkout']);
        }

        return redirect()->route('shop.index');


    }

    /**
     * Display the specified resource.
     */


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
