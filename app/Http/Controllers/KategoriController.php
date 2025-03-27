<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori::all();
        return view("admin.produk.kategori", compact("kategori"));
    }

    public function create()
    {
        return view("admin.produk.kategori.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable',
        ]);

        kategori::create($request->all());
        return redirect()->route('Kategori.index')->with(['sukses' => 'Kategori Berhasil DiTambahkan']);

    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        return view('admin.produk.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable',
        ]);

        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->update();
        return redirect()->route('Kategori.index')->with(['sukses' => 'Kategori Berhasil Ditambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = kategori::find($id);

        if ($kategori) {
            $kategori->delete();
            return back()->with(['sukses' => 'Kategori Berhasil Dihapus']);
        }
        return back()->with(['error' => 'Kategori Gagal Dihapus']);
    }
}
