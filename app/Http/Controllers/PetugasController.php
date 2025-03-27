<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{

    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas', compact('petugas'));
    }


    public function create()
    {
        return view('admin.tambah');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required',
        ]);
        Petugas::create($validate);

        return redirect()->route('admin.petugas')->with(['sukses' => 'Data Berhasil Dibuat']);
    }

    public function show(Petugas $petugas)
    {  
        return view('admin.edit', compact('petugas'));
    }

    public function edit(Petugas $petugas)
    {  
        return view('admin.edit', compact('petugas'));
    }


    public function update(Request $request, Petugas $petugas)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'username' => 'required|unique:petugas,username,' . $petugas->id,
        ]);

        $petugas->nama = $request->nama;
        $petugas->no_telepon = $request->no_telepon;
        $petugas->alamat = $request->alamat;
        $petugas->username = $request->username;
        $petugas->update();

        return redirect()->route('admin.petugas')->with(['sukses' => 'Data Berhasil Diupdate']);
    }



    public function destroy($id)
    {
        $user = Petugas::find($id);

        if ($user) {
            $user->delete();
            return back()->with('sukses', 'Data Berhasil Dihapus');
        }
        return back()->with('error', 'Data Gagal Dihapus');
    }
}
