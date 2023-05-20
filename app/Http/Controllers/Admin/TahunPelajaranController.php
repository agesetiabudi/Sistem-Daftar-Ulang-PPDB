<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TahunPelajaran;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TahunPelajaranController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $data = TahunPelajaran::all();

            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.tahun-pelajaran.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        TahunPelajaran::create([
            'name'      => $request->name
        ]);

        return redirect()->route('admin.tahun-pelajaran.index')->with(['berhasil' => 'Berhasil Menambahkan Kategori']);
    }

    public function update(Request $request, TahunPelajaran $tahunpelajaran)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        $tahunpelajaran->update([
            'name'      => $request->name
        ]);

        return redirect()->route('admin.tahun-pelajaran.index')->with(['berhasil' => 'Berhasil Mengubah Kategori']);
    }

    public function destroy(TahunPelajaran $tahunpelajaran)
    {
        $tahunpelajaran->delete();

        return redirect()->route('admin.tahun-pelajaran.index')->with(['berhasil' => 'Berhasil Menghapus Kategori']);
    }

    public function create()
    {
        $data           = null;

        return view('admin.pages.tahun-pelajaran.action', compact('data'));
    }

    public function edit(TahunPelajaran $tahunpelajaran)
    {
        $data           = $tahunpelajaran;

        return view('admin.pages.tahun-pelajaran.action', compact('data'));
    }
}
