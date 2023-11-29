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
            'nama_supplier.required' => 'The Name field is required.',
            'nama_supplier.string' => 'The Name must be a string.',
            'nama_supplier.max' => 'The Name may not be greater than :max characters.',
            
            'alamat_supplier.required' => 'The Address field is required.',
            'alamat_supplier.string' => 'The Address must be a string.',
            
            'nomor_telepon_supplier.required' => 'The Phone field is required.',
            'nomor_telepon_supplier.numeric' => 'The Phone must be a number.',
        ]);

        $supplier = supplier::create($request->all());
        return redirect()->route("supplier.index")->with("success","Successfully added product");
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
            'nama_supplier.required' => 'The Name field is required.',
            'nama_supplier.string' => 'The Name must be a string.',
            'nama_supplier.max' => 'The Name may not be greater than :max characters.',
            
            'alamat_supplier.required' => 'The Address field is required.',
            'alamat_supplier.string' => 'The Address must be a string.',
            
            'nomor_telepon_supplier.required' => 'The Phone field is required.',
            'nomor_telepon_supplier.numeric' => 'The Phone must be a number.',
        ]);

        $supplier = supplier::find($id);
        if (
            $request->nama_supplier == $supplier->nama_supplier &&
            $request->alamat_supplier == $supplier->alamat_supplier &&
            $request->nomor_telepon_supplier == $supplier->nomor_telepon_supplier
        ) {
            return redirect()->back()->with("error", "The data you're trying to edit is the same as before.");
        }

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier::find($id)->delete();

        return redirect()->route('supplier.index')->with('success','Data deleted successfully');
    }
}
