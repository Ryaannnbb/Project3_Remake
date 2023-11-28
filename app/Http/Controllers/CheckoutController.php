<?php

namespace App\Http\Controllers;

use App\Models\Detailpesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ids = $request->pesanan_id;
        $pesanan = Detailpesanan::find($ids);
        // return dd($pesanan);
        return view('user.pages.checkout', compact('pesanan'));
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
