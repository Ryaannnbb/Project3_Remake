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
            'nama_produk' => 'required|regex:/^[a-zA-Z ]+$/|max:255', // Hanya karakter alfabet dan spasi yang diperbolehkan
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:tb_kategori,id',
            'supplier_id' => 'required|exists:tb_supplier,id',
        ], [
            'path_produk.required' => 'Gambar produk wajib diunggah.',
            'path_produk.image' => 'Berkas harus berupa gambar.',
            'path_produk.mimes' => 'Gambar harus berupa berkas dengan tipe: jpeg, png, jpg, gif.',
            'path_produk.max' => 'Gambar tidak boleh lebih dari 2 megabita.',

            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.regex' => 'Nama produk hanya boleh mengandung karakter alfabet dan spasi.',
            'nama_produk.max' => 'Nama produk tidak boleh lebih dari :max karakter.',

            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk minimal harus :min.',

            'stok.numeric' => 'Stok produk harus berupa angka.',
            'stok.required' => 'Stok produk wajib diisi.',
            'stok.min' => 'Stok produk minimal harus :min.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',

            'supplier_id.required' => 'Pemasok wajib diisi.',
            'supplier_id.exists' => 'Pemasok yang dipilih tidak valid.',
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
            "stok"=> $request->stok,
            "kategori_id"=> $request->kategori_id,
            "supplier_id"=> $request->supplier_id,
        ]);

        return redirect()->route("produk.index")->with("success", "Data produk berhasil ditambahkan.");
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
            'path_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|regex:/^[a-zA-Z ]+$/|max:255', // Hanya karakter alfabet dan spasi yang diperbolehkan
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:tb_kategori,id',
            'supplier_id' => 'required|exists:tb_supplier,id',
        ], [
            'path_produk.required' => 'Gambar produk wajib diunggah.',
            'path_produk.image' => 'Berkas harus berupa gambar.',
            'path_produk.mimes' => 'Gambar harus berupa berkas dengan tipe: jpeg, png, jpg, gif.',
            'path_produk.max' => 'Gambar tidak boleh lebih dari 2 megabita.',

            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.regex' => 'Nama produk hanya boleh mengandung karakter alfabet dan spasi.',
            'nama_produk.max' => 'Nama produk tidak boleh lebih dari :max karakter.',

            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk minimal harus :min.',

            'stok.numeric' => 'Stok produk harus berupa angka.',
            'stok.required' => 'Stok produk wajib diisi.',
            'stok.min' => 'Stok produk minimal harus :min.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',

            'supplier_id.required' => 'Pemasok wajib diisi.',
            'supplier_id.exists' => 'Pemasok yang dipilih tidak valid.',
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

        return redirect()->route('produk.index')->with("success", "Data produk berhasil diperbarui.");
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

            return redirect()->route("produk.index")->with("success", "Data produk berhasil dihapus!");
        }

        return redirect()->route("produk.index")->with("warning", "Produk not found or already deleted.");
    }
}
