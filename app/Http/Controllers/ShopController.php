<?php

namespace App\Http\Controllers;

use App\Models\Detailpesanan;
use App\Models\Produk;
use App\Models\kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $sortOption = $request->input('sort');
        $category = $request->input('category');
        $produk = Produk::paginate(3);
        $order = Detailpesanan::where('status', 'checkout')->get()->count();


        if ($sortOption == 'price-low') {
            $produk = Produk::orderBy('harga', 'asc')->get();
        } elseif ($sortOption == 'price-high') {
            $produk = Produk::orderBy('harga', 'desc')->get();
        }

        if($category) {
            $produk = Produk::where('kategori_id', $category)->get();
        }

        $kategoris = Kategori::all();
        $pesanan = Detailpesanan::where('status', 'keranjang');
        // return dd($pesanan);
        return view("user.pages.shop", compact('produk','kategoris', 'totalpesanan', 'order'));
    }

    public function detail($produk)
    {
        $produk = Produk::findOrFail($produk);
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = Detailpesanan::where('status', 'checkout')->get()->count();
        return view("user.pages.shop-details", compact('produk', 'totalpesanan', 'order'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function order(Request $request, $produk)
    {
        $produk = Produk::findOrFail($produk);

        Detailpesanan::create([
            "produk_id" => $produk->id,
            "jumlah" => $request->jumlah,
            "total" => $produk->harga * $request->jumlah,
            "status" => 'keranjang'
        ]);

        return redirect()->route('cart');
    }
}
