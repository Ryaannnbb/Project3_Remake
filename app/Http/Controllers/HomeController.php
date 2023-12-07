<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = produk::all();
        $pesanan_menunggu = pesanan::where('status', 'pending');
        $pesanan_diterima = pesanan::where('status', 'completed');
        $pesanan_ditolak = pesanan::where('status', 'rejected');
        return view('dashboard', compact('produks', 'pesanan_menunggu', 'pesanan_diterima', 'pesanan_ditolak'));
    }
}
