<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use App\Models\JalurPendaftaran;

class HomeController extends Controller
{
    public function index () 
    {
        $jalur = JalurPendaftaran::get();
        return view('home',compact('jalur'));
    }

    public function cari (Request $request)
    {
        $data = PesertaDidik::where('nomor_daftar',$request->nopeserta)->where('id_jalur',$request->jalur)->first();
        return view('pendaftar.hasil',compact('data'));
    }

    public function berkas (PesertaDidik $pendaftar)
    {
        if($pendaftar->berkas){
            $data = $pendaftar;
            return view('pendaftar.hasil',compact('data'))->with(['gagal' => 'Anda telah melengkapi data']);
        }else{
            return view('pendaftar.upload',compact('pendaftar'));
        }
    }

    public function upload (Request $request)
    {
        $request->validate([
            'bukti'               => 'max:500',
            'ktp'                 => 'max:500',
            'kk'                  => 'max:500',
            'akta'                => 'max:500',
            'pernyataan'          => 'max:500',
            'kelakuan'            => 'max:500',
            'butawarna'           => 'max:500',
            'foto'                => 'max:500',
        ]);

        if($file = $request->file('bukti')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $bukti = $name;
        }else{
            $bukti = null;
        }

        if($file = $request->file('ktp')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $ktp = $name;
        }else{
            $ktp = null;
        }
        
        if($file = $request->file('kk')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $kk = $name;
        }else{
            $kk = null;
        }

        if($file = $request->file('akta')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $akta = $name;
        }else{
            $akta = null;
        }

        if($file = $request->file('pernyataan')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $pernyataan = $name;
        }else{
            $pernyataan = null;
        }

        if($file = $request->file('kelakuan')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $kelakuan = $name;
        }else{
            $kelakuan = null;
        }

        if($file = $request->file('butawarna')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $butawarna = $name;
        }else{
            $butawarna = null;
        }

        if($file = $request->file('foto')){
            $name =  $file->hashName();
            $file->move('berkas/',$name);
            $foto = $name;
        }else{
            $foto = null;
        }

        Berkas::create([
            'id_user'       => $request->user_id,
            'bukti'         => $bukti,
            'ktp'           => $ktp,
            'kk'            => $kk,
            'akta'          => $akta,
            'kelakuan_baik' => $kelakuan,
            'foto'          => $foto,
            'butawarna'     => $butawarna
        ]);

        return redirect()->route('terimakasih',$request->user_id);
    }

    public function terimakasih (PesertaDidik $pendaftar)
    {
        return view('pendaftar.terimakasih',compact('pendaftar'));
    }
}
