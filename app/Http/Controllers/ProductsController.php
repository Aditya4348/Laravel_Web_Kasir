<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\kategori;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::with('kategori')->get();
        return view("admin.produk.products", compact("products"));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view("admin.produk.tambah", compact('kategoris'));

    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama_barang" => "required|string|max:255",
            "harga_barang" => "required|numeric",
            "deskripsi_barang" => "nullable|string",
            "foto_barang" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "stok_barang" => 'nullable|integer',
            "kategori_id" => "nullable|array",
            "kategori_id.*" => "exists:kategoris,id",
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('uploads', 'public'); // Simpan di storage/app/public/uploads
        }

        $produk = products::create([
            'nama_barang' => $validate['nama_barang'],
            'harga_barang' => $validate['harga_barang'],
            "stok_barang" => $validate['stok_barang'],
            'deskripsi_barang' => $validate['deskripsi_barang'] ?? null,
            'foto_barang' => $fotoPath,
        ]);

        if (!empty($validate['kategori_id'])) {
            $produk->kategori()->attach($validate['kategori_id']);

            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dibuat']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        $kategoris = Kategori::all();
        return view("admin.produk.edit", compact("products", "kategoris"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        $request->validate([
            "nama_barang" => "required|string|max:255",
            "harga_barang" => "required|numeric",
            "stok_barang" => "nullable|numeric",
            "deskripsi_barang" => "nullable|string",
            "foto_barang" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "kategori_id" => "required|array"
        ]);

        if ($request->hasFile('foto_barang')) {
            // Hapus foto lama jika ada
            if ($products->foto_barang) {
                \Storage::delete('public/' . $products->foto_barang);
            }

            $fotoPath = $request->file('foto_barang')->store('uploads', 'public');
            $products->foto_barang = $fotoPath;
        }

        $products->update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'foto_barang' => $products->foto_barang,
        ]);

        $products->kategori()->sync($request->kategori_id);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { {
            $user = products::find($id);

            if ($user) {
                $user->delete();
                return back()->with('success', 'Data Berhasil Dihapus');
            }
            return back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
