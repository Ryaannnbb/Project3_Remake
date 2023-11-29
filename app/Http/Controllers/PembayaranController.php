<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view("pembayaran.index", compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembayaran = Pembayaran::all();
        return view("pembayaran.create", compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'no_rekening' => 'required|numeric',
        ], [
            'metode_pembayaran.required' => 'The Payment Method field is required.',
            'metode_pembayaran.string' => 'The Payment Method must be a string.',
            'metode_pembayaran.max' => 'The Payment Method may not be greater than :max characters.',

            'no_rekening.required' => 'The Account Number field is required.',
            'no_rekening.numeric' => 'The Account Number must be a number.',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran')->with("success","Payment data has been successfully added!");
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
        $pembayaran = Pembayaran::find($id);
        return view("pembayaran.edit", compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'no_rekening' => 'required|numeric',
        ], [
            'metode_pembayaran.required' => 'The Payment Method field is required.',
            'metode_pembayaran.string' => 'The Payment Method must be a string.',
            'metode_pembayaran.max' => 'The Payment Method may not be greater than :max characters.',

            'no_rekening.required' => 'The Account Number field is required.',
            'no_rekening.numeric' => 'The Account Number must be a number.',
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran')->with("success", "Payment data has been successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Pembayaran::find($id)->delete();
            return redirect()->route('pembayaran')->with("success", "Payment data has been successfully deleted!");
        } catch (\Throwable $th) {
            return redirect()->route('pembayaran')->with("error", "Failed because it is currently in use!");
        }
    }
}
