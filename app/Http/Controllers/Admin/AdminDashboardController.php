<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use App\Models\TahunPelajaran;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $tahun      = TahunPelajaran::latest()->get();

        if(request('tahun')){
            $year = request('tahun');
        } else {
            $year = count($tahun) > 0 ? $tahun[0]->id : null;
        }

        $total_all    = PesertaDidik::where('id_tahun', $year)->count();
        $belum_daftar = PesertaDidik::where('id_tahun', $year)->where('status', null)->count();
        $sudah_daftar = PesertaDidik::where('id_tahun', $year)->where('status', 1)->count();

        $tahun_pelajaran = TahunPelajaran::whereId($year)->first();

        $grafik_all    = [$belum_daftar, $sudah_daftar];

        $jurusan        = Jurusan::get();
        $grafik_jurusan = [];

        foreach ($jurusan as $key) {
            $belum = PesertaDidik::where('id_tahun', $year)->where('id_jurusan', $key->id)->where('status', null)->count();
            $sudah = PesertaDidik::where('id_tahun', $year)->where('id_jurusan', $key->id)->where('status', 1)->count();
            $grafik_jurusan[] = [
                'id'        => $key->id,
                'name'      => $key->name,
                'grafik'    => [$belum, $sudah]
            ];
        }
        
        return view('admin.pages.dashboard.index', compact('tahun', 'tahun_pelajaran', 'total_all', 'belum_daftar', 'sudah_daftar', 'grafik_all', 'grafik_jurusan'));
    }
}
