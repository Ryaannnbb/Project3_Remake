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
        $order = pesanan::where('user_id', auth()->user()->id)->get()->count();
        
        $produk = Produk::paginate(6);


        // Mendapatkan nilai 'category' dari permintaan
        $category = $request->input('category');

        // Mendapatkan nilai 'search' dari permintaan
        $keyword = $request->input('search');

        // Inisialisasi query builder untuk model Produk
        $query = Produk::query();

        // Filter berdasarkan 'category' jika tersedia
        if ($category) {
            $query->where('kategori_id', $category);
        }

        // Filter berdasarkan 'search' jika tersedia
        if ($keyword) {
            $query->where('nama_produk', 'like', "%{$keyword}%");
        }

        // return dd($query);   
        // Ambil hasil query
        $produk = $query->paginate(6);

        // Paginasi dengan menyertakan parameter 'category' dan 'search'
        $produk->appends(['category' => $category, 'search' => $keyword]);

        // Tampilkan link paginasi
        $links = $produk->render();


        // if($request->has('search')) {
        //     // return dd($request->search);
        //     $keyword = $request->search;
        //     $produk = Produk::where('nama_produk', 'like', "%".$keyword."%")->paginate(6);
        // }

        $kategoris = Kategori::all();
        $pesanan = Detailpesanan::where('status', 'keranjang');
        // return dd($pesanan);
        return view("user.pages.shop", compact('produk', 'kategoris', 'totalpesanan', 'order'));
    }

    public function fetchProduks(Request $request)
    {
        if ($request->ajax()) {
            $produks = Produk::paginate(2);
            return view('user.pages.shop', compact('produk'))->render();
        }
    }

    public function detail($produk)
    {
        // return dd($produk);
        $produk = Produk::findOrFail($produk);
        $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        $order = pesanan::where('user_id', auth()->user()->id)->get()->count();
        return view("user.pages.shop-details", compact('produk', 'totalpesanan', 'order'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function order(Request $request, $produk)
    {
        $produk = Produk::findOrFail($produk);
        $request->validate(
            [
                'jumlah' => 'numeric|min:1|max:' . $produk->stok
            ],
            [
                'jumlah.max' => "quantity exceeds product stock"
            ]
        );

        $detailPesanan = Detailpesanan::where('produk_id', $produk->id)->where('status', 'keranjang')->first();
        // return dd($detailPesanan);

        if ($detailPesanan) {
            if ($detailPesanan->jumlah > $produk->stok) {
                return redirect()->back()->withErrors('jumlah', "quantity exceeds product's stock");
            } else {
                $detailPesanan->jumlah += $request->jumlah;
                $detailPesanan->total = $produk->harga * $request->jumlah;
                $detailPesanan->save();

                $produk->stok -= $request->jumlah;
                $produk->save();
            }
            // return dd($detailPesanan);
        } else {
            Detailpesanan::create([
                "produk_id" => $produk->id,
                "jumlah" => $request->jumlah,
                "total" => $produk->harga * $request->jumlah,
                "status" => 'keranjang',
                "user_id" => auth()->user()->id
            ]);

            $produk->stok -= $request->jumlah;
            $produk->save();
        }
        return redirect()->route('cart');
    }
}
