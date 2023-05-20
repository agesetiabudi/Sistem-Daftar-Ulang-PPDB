<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Imports\PesertaDidik;
use App\Models\TahunPelajaran;
use App\Models\JalurPendaftaran;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PesertaDidik as PesertaModel;

class PesertaDidikController extends Controller
{
    public function index()
    {
        $jalur      = JalurPendaftaran::get();
        $jurusan    = Jurusan::get();
        $tahun      = TahunPelajaran::latest()->get();

        if(request()->ajax()){
            $query = PesertaModel::where('nomor_un', '!=', 'Nomor UN');

            $request_tahun = request('tahun') ? request('tahun') : request('amp;tahun');

            if($request_tahun){
                $query->where('id_tahun', $request_tahun);
            } else {
                $query->where('id_tahun', (count($tahun) > 0 ? $tahun[0]->id : null));
            }

            if(request('jurusan')){
                $query->where('id_jurusan', request('jurusan'));
            }

            $data = $query->get();
            
            return DataTables::of($data)
            ->editColumn('jurusan', function($data){
                return $data->jurusan ? $data->jurusan->name : '-';
            })
            ->make(true);
        }

        return view('admin.pages.peserta-didik.index', compact('jalur', 'jurusan', 'tahun'));
    }

    public function import(Request $request) 
	{
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = date('YmdHis').'.'.$file->getClientOriginalExtension();

		// upload ke folder file_siswa di dalam folder public
		$file->move('peserta_didik', $nama_file);

		// import data
		Excel::import(new PesertaDidik($request->jalur, $request->tahun), public_path('/peserta_didik/'.$nama_file));

		return redirect()->route('admin.peserta-didik.index')->with(['berhasil' => 'Berhasil mengimport data']);
	}

    public function detail($nomor)
    {
        $data           = PesertaModel::where('nomor_daftar', $nomor)->firstOrFail();

        return view('admin.pages.peserta-didik.detail', compact('data'));
    }
}
