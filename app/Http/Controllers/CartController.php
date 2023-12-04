<?php

namespace App\Http\Controllers;

use App\Models\detailpesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Detailpesanan::where('status', 'keranjang')->get();
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = Pesanan::where('user_id', auth()->user()->id)->get()->count();
        return view("user.pages.shoping-cart", compact('pesanans', 'totalpesanan', 'order'));
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
    public function show(detailpesanan $detailpesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailpesanan $detailpesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $quantities = json_decode($request->input('quantities'));

        // return dd($quantities);
        try {
            //code...
            foreach ($quantities as $orderId => $quantity) {
                $pesanan = detailpesanan::find($orderId);
                $oldQuantity = $pesanan->jumlah;
                // return dd($quantity);

                if ($quantity - $oldQuantity > $pesanan->produk->stok) {
                    return redirect()->back()->with('update_failed', "Quantity exceeds product stock");
                }
                if ($quantity <= 0 ) {
                    return redirect()->back()->with('update_failed', "Quantity cannot beloy zero");
                }
                $harga = $pesanan->produk->harga;
                $pesanan->jumlah = $quantity;
                $pesanan->total = $quantity * $harga;
                $pesanan->save();

                // $pesanan->produk->stok -= $quantity - $oldQuantity;
                // $pesanan->save();

                $produk = Produk::find($pesanan->produk_id);
                $produk->stok -= $quantity - $oldQuantity;
                $produk->save();
            }
            return redirect()->route('cart')->with('update_success', 'Cart Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('cart')->with('update_failed', 'Cart Updated Failed');
        }
        // $detailPesanan = $request->pesanan_id;
        // foreach ($detailPesanan as $value) {
        //     Detailpesanan::findOrFail($value)->update(["jumlah" == ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailPesanan = detailpesanan::findOrFail($id);
        $produk = Produk::find($detailPesanan->produk_id);
        $produk->stok += $detailPesanan->jumlah;
        $produk->save();
        $detailPesanan->delete();
        return redirect()->back();
    }
}
