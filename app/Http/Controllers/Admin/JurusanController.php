<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $data = Jurusan::latest()->get();
            return DataTables::of($data)
            ->make(true);
        }
        return view('admin.pages.jurusan.index');
    }

    public function create()
    {
        $data       = null;
        return view('admin.pages.jurusan.action', compact('data'));
    }

    public function edit(Jurusan $jurusan)
    {
        $data       = $jurusan;
        return view('admin.pages.jurusan.action', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required',
            'image'                 => 'mimes:jpg,png,svg,jpeg',
        ]);

        if($file = $request->file('image')){
            $name =  $file->hashName();
            $file->move('image/jurusan/',$name);
            $images = $name;
        }else{
            $images = null;
        }

        $array = array_merge($data, ['image' => $images]);

        Jurusan::create($array);

        return redirect()->route('admin.jurusan.index')->with(['berhasil' => 'Berhasil Menambahkan Jurusan']);
    }

    public function update(Request $request,Jurusan $jurusan)
    {
        $data = $request->validate([
            'name'         	  => 'required',
            'image'           => 'mimes:jpg,png,svg,jpeg',
        ]);

        if($file = $request->file('image')){
            $name =  $file->hashName();
            $file->move('image/jurusan/',$name);
            $images = $name;
        }else{
            $images = $jurusan && isset($jurusan->image) ? $jurusan->image : '';
        }

        $array = array_merge($data, ['image' => $images]);

        $jurusan->update($array);
        
        return redirect()->route('admin.jurusan.index')->with(['berhasil' => 'Berhasil Mengubah Kategori']);
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return response()->json();
    }
}
