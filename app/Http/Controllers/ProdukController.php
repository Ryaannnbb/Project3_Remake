<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = produk::all();
        return view('produk.index', compact('produks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("produk.create", [
            "kategoris"=> kategori::all(),
            "suppliers"=> Supplier::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request);
        $request->validate([
            'path_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|regex:/^[a-zA-Z ]+$/|max:255', // Only alphabetic characters and spaces allowed
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:tb_kategori,id',
            'supplier_id' => 'required|exists:tb_supplier,id',
        ], [
            'path_produk.required' => 'Product image is required.',
            'path_produk.image' => 'The file must be an image.',
            'path_produk.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'path_produk.max' => 'The image may not be greater than 2 megabytes.',
        
            'nama_produk.required' => 'Product name is required.',
            'nama_produk.regex' => 'Product name must contain only alphabetic characters and spaces.',
            'nama_produk.max' => 'Product name may not be greater than :max characters.',
        
            'harga.required' => 'Product price is required.',
            'harga.numeric' => 'Product price must be a number.',
            'harga.min' => 'Product price must be at least :min.',
        
            'deskripsi.required' => 'Description is required.',
            'deskripsi.string' => 'Description must be a string.',
        
            'kategori_id.required' => 'Category is required.',
            'kategori_id.exists' => 'Selected category is invalid.',
        
            'supplier_id.required' => 'Supplier is required.',
            'supplier_id.exists' => 'Selected supplier is invalid.',
        ]);

        if ($image = $request->file('path_produk')) {
            $path = 'assets/img/photo/';
            $extension = $image->getClientOriginalExtension(); // Mendapatkan ekstensi asli file
            $hashName = hash('md5', time()) . '.' . $extension; // Menghasilkan nama file yang di-hash
            $image->move($path, $hashName);
            // $produk['path_buku'] = $hashName;
        }

        // return dd($request);

        produk::create([
            "path_produk" => $path . $hashName,
            "nama_produk" => $request->nama_produk,
            "deskripsi"=> $request->deskripsi,
            "harga"=> $request->harga,
            "kategori_id"=> $request->kategori_id,
            "supplier_id"=> $request->supplier_id,
        ]);

        return redirect()->route("produk.index")->with("success", "Product data has been successfully added.");
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
        $produk = produk::find($id);
        $suppliers = supplier::all();
        $kategoris = kategori::all();

        return view('produk.edit', compact('produk', 'suppliers', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'path_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size is 2MB
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:tb_kategori,id',
            'supplier_id' => 'required|exists:tb_supplier,id',
        ], [
            'path_produk.required' => 'Product image is required.',
            'path_produk.image' => 'The file must be an image.',
            'path_produk.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'path_produk.max' => 'The image may not be greater than 2 megabytes.',

            'nama_produk.required' => 'Product name is required.',
            'nama_produk.string' => 'Product name must be a string.',
            'nama_produk.max' => 'Product name may not be greater than :max characters.',

            'harga.required' => 'Product price is required.',
            'harga.numeric' => 'Product price must be a number.',
            'harga.min' => 'Product price must be at least :min.',

            'deskripsi.required' => 'Description is required.',
            'deskripsi.string' => 'Description must be a string.',

            'kategori_id.required' => 'Category is required.',
            'kategori_id.exists' => 'Selected category is invalid.',

            'supplier_id.required' => 'Supplier is required.',
            'supplier_id.exists' => 'Selected supplier is invalid.',
        ]);
        $produk = produk::find($id);

        // Memeriksa apakah data yang akan diubah sama dengan data sebelumnya
        // if (
        //     $request->judul_buku == $produk->judul_buku &&
        //     $request->tahun_terbit == $produk->tahun_terbit &&
        //     $request->isbn == $produk->isbn &&
        //     $request->id_pengarang == $produk->id_pengarang &&
        //     $request->id_kategori == $produk->id_kategori
        // ) {
        //     return redirect()->back()->with("error", "The data you're trying to edit is the same as before.");
        // }

        $produkData = $request->except('path_produk');

        if ($image = $request->file('path_produk')) {
            $path = 'assets/img/photo/';

            // Dapatkan nama file lama dari database
            $oldFileName = $produk->path_produk;

            $extension = $image->getClientOriginalExtension(); // Dapatkan ekstensi asli file
            $hashedFileName = hash('md5', time()) . '.' . $extension; // Buat nama file yang di-hash

            $image->move($path, $hashedFileName);
            $produk->path_produk = $path . $hashedFileName;

            // Hapus file lama jika ada
            if ($oldFileName && file_exists($oldFileName)) {
                unlink($oldFileName);
            }
        }


        $produk->update($produkData);

        return redirect()->route('produk.index')->with("success", "Product data has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::findOrfail($id);
        // return dd($produk);

        if ($produk) {
            $path_buku = $produk->path_produk;
            $path = public_path($path_buku);

            // return dd($path);

            if (File::exists($path)) {
                File::delete($path);
            }

            $produk->delete();

            return redirect()->route("produk.index")->with("success", "Produk data has been successfully deleted.");
        }

        return redirect()->route("produk.index")->with("warning", "Produk not found or already deleted.");
    }
}
