<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\JalurPendaftaran;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JalurPendaftaranController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $data = JalurPendaftaran::all();

            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.jalur-pendaftaran.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        JalurPendaftaran::create([
            'name'      => $request->name
        ]);

        return redirect()->route('admin.jalur-pendaftaran.index')->with(['berhasil' => 'Berhasil Menambahkan Kategori']);
    }

    public function update(Request $request, JalurPendaftaran $jalurpendaftaran)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        $jalurpendaftaran->update([
            'name'      => $request->name
        ]);

        return redirect()->route('admin.jalur-pendaftaran.index')->with(['berhasil' => 'Berhasil Mengubah Kategori']);
    }

    public function destroy(JalurPendaftaran $jalurpendaftaran)
    {
        $jalurpendaftaran->delete();

        return redirect()->route('admin.jalur-pendaftaran.index')->with(['berhasil' => 'Berhasil Menghapus Kategori']);
    }

    public function create()
    {
        $data           = null;

        return view('admin.pages.jalur-pendaftaran.action', compact('data'));
    }

    public function edit(JalurPendaftaran $jalurpendaftaran)
    {
        $data           = $jalurpendaftaran;

        return view('admin.pages.jalur-pendaftaran.action', compact('data'));
    }
}
