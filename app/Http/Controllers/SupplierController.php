<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = supplier::all();
        return view("supplier.index", compact("supplier"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'required|string',
            'nomor_telepon_supplier' => 'required|numeric',
        ], [
            'nama_supplier.required' => 'Kolom Nama wajib diisi.',
            'nama_supplier.string' => 'Nama harus berupa teks.',
            'nama_supplier.max' => 'Nama tidak boleh lebih dari :max karakter.',

            'alamat_supplier.required' => 'Kolom Alamat wajib diisi.',
            'alamat_supplier.string' => 'Alamat harus berupa teks.',

            'nomor_telepon_supplier.required' => 'Kolom Nomor Telepon wajib diisi.',
            'nomor_telepon_supplier.numeric' => 'Nomor Telepon harus berupa angka.',
        ]);

        $supplier = supplier::create($request->all());
        return redirect()->route("supplier.index")->with("success","Data supplier berhasil ditambahkan");
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
        $supplier = supplier::find($id);
        // return dd($supplier);

        return view("supplier.edit", compact("supplier"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'required|string',
            'nomor_telepon_supplier' => 'required|numeric',
        ], [
            'nama_supplier.required' => 'Kolom Nama wajib diisi.',
            'nama_supplier.string' => 'Nama harus berupa teks.',
            'nama_supplier.max' => 'Nama tidak boleh lebih dari :max karakter.',

            'alamat_supplier.required' => 'Kolom Alamat wajib diisi.',
            'alamat_supplier.string' => 'Alamat harus berupa teks.',

            'nomor_telepon_supplier.required' => 'Kolom Nomor Telepon wajib diisi.',
            'nomor_telepon_supplier.numeric' => 'Nomor Telepon harus berupa angka.',
        ]);

        $supplier = supplier::find($id);
        if (
            $request->nama_supplier == $supplier->nama_supplier &&
            $request->alamat_supplier == $supplier->alamat_supplier &&
            $request->nomor_telepon_supplier == $supplier->nomor_telepon_supplier
        ) {
            return redirect()->back()->with("error", "Data yang Anda coba edit sama dengan sebelumnya.");
        }

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success','Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier::find($id)->delete();

        return redirect()->route('supplier.index')->with('success','Data berhasil dihapus.');
    }
}
