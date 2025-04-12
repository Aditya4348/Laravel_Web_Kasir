<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{

    public function index()
    {
        $petugas = Petugas::all()->where('role', 'petugas');

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

        return redirect()->route('dashboard')->with(['sukses' => 'Data Berhasil Dibuat']);
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
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'username' => 'required|unique:petugas,username,' . $petugas->id,
        ]);

        //pengecekan jika validasi berhasil update data 
        if($data){
            $petugas->nama = $data['nama'];
            $petugas->no_telepon = $data['no_telepon'];
            $petugas->alamat = $data['alamat'];
            $petugas->username = $data['username'];
            $petugas->update();

        return redirect()->route('petugas.index')->with(['sukses' => 'Data Berhasil Diupdate']);
        }

        //jika gagal kembalikan dengan pesan error
        return back()->with('error', 'Data Gagal Diupdate');        
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
