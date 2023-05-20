<?php

namespace App\Imports;

use App\Models\PesertaDidik as Peserta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaDidik implements ToModel
{
    public function __construct($jalur, $tahun)
    {
        $this->jalur    = $jalur;
        $this->tahun    = $tahun;
    }

    public function model(array $row)
    {
        $data               = Peserta::where('nomor_daftar', $row[2])->first();
        if(!$data){
            if(isset($row[1]) && isset($row[2]) && isset($row[3])){
                return new Peserta([
                    'id_jalur'      => $this->jalur,
                    'id_tahun'      => $this->tahun,
                    'nomor_un'      => isset($row[1]) ? $row[1] : '-',
                    'nomor_daftar'  => isset($row[2]) ? $row[2] : '-', 
                    'nisn'          => isset($row[3]) ? $row[3] : '-', 
                    'nama'          => isset($row[4]) ? $row[4] : '-', 
                    'jenis_kelamin' => isset($row[5]) ? $row[5] : '-', 
                    'jenjang'       => isset($row[6]) ? $row[6] : '-', 
                    'persyaratan'   => isset($row[7]) ? $row[7] : '-', 
                    'asal_sekolah'  => isset($row[8]) ? $row[8] : '-', 
                    'nilai_rapor'   => isset($row[9]) ? $row[9] : '-', 
                    'telepon'       => isset($row[10]) ? $row[10] : '-', 
                    'kode'          => isset($row[11]) ? $row[11] : '-', 
                ]);
            }
        }
    }
}
