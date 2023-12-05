<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\Detailpesanan;
use App\Models\Produk;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = pesanan::where('user_id', auth()->user()->id)->whereNot('status', 'completed')->get();
        $detailpesanans = Detailpesanan::where('status', 'checkout')->get();
        // return dd($detailpesanans);
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = $pesanans->count();

        return view("user.pages.order", compact('pesanans', 'detailpesanans', 'totalpesanan', 'order'));
    }

    public function delivered($id) {
        try {
            $pesanan = Pesanan::findOrFail($id)->update(['status' => 'completed']);
            // $pesanan->delete();
            return redirect()->back()->with("ok", "Pesanan berhasil ditandai sebagai sudah diterima. Terima kasih atas pembelian Anda!");
        } catch (\Throwable $th) {
        //     // Proses penanganan kesalahan
            return redirect()->back()->with("ko", "Gagal menandai pesanan sebagai sudah diterima. Mohon coba lagi.");
        }
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
        $pesanan = Pesanan::findOrFail($id);
        $detailPesanan = $pesanan->detailpesanan;
        foreach ($detailPesanan as $ps) {

            // echo $produk . '<br>';
            $produk = Produk::findOrfail($ps->produk_id);
            $jumlah = $ps->jumlah;
            $produk->stok = $produk->stok + $jumlah;
            $produk->save();
            // echo $val->jumlah . '<br>';
            // return dd($produk->stok, $jumlah);


        }
        $pesanan->delete();
        return redirect()->back()->with("co", "Berhasil menghapus pesanan");
    }
}
