<?php

namespace App\Http\Controllers;

use App\Models\detailpesanan;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Detailpesanan::all();
        $pesanan = Detailpesanan::all();
        return view("user.pages.shoping-cart", compact('pesanans', 'pesanan'));
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
    public function update(Request $request, detailpesanan $detailpesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        detailpesanan::findOrFail($id)->delete();
        return redirect()->back();
    }
}