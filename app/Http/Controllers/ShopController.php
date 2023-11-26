<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOption = $request->input('sort');
        $produk = Produk::all();

        if ($sortOption == 'price-low') {
            $produk = Produk::orderBy('harga', 'asc')->get();
        } elseif ($sortOption == 'price-high') {
            $produk = Produk::orderBy('harga', 'desc')->get();
        }

        return view("user.pages.shop", compact('produk'));
    }
    // public function queue($pricepler)
    // {
    //     if ($pricepler == ) {
    //         # code...
    //     }
    //     $produk = Produk::orderBy('harga', 'asc');
    // }

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
