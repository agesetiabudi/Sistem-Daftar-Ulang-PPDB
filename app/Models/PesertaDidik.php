<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jurusan () {
        return $this->belongsTo(Jurusan::class , 'id_jurusan');
    }

    public function jalur () {
        return $this->belongsTo(JalurPendaftaran::class , 'id_jalur');
    }

    public function berkas () {
        return $this->hasOne(Berkas::class , 'id_user');
    }
}
