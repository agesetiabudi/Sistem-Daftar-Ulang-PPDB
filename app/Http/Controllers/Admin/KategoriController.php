<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriUjian;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $data = KategoriUjian::all();

            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.kategori.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
        ]);

        KategoriUjian::create([
            'code'      => uniqid(),
            'nama'      => $request->nama
        ]);

        return redirect()->route('admin.kategori.index')->with(['berhasil' => 'Berhasil Menambahkan Kategori']);
    }

    public function update(Request $request, KategoriUjian $kategori)
    {
        $request->validate([
            'nama'      => 'required',
        ]);

        $kategori->update([
            'nama'      => $request->nama
        ]);

        return redirect()->route('admin.kategori.index')->with(['berhasil' => 'Berhasil Mengubah Kategori']);
    }

    public function destroy(KategoriUjian $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with(['berhasil' => 'Berhasil Menghapus Kategori']);
    }

    public function create()
    {
        $data           = null;

        return view('admin.pages.kategori.action', compact('data'));
    }

    public function edit(KategoriUjian $kategori)
    {
        $data           = $kategori;

        return view('admin.pages.kategori.action', compact('data'));
    }
}
