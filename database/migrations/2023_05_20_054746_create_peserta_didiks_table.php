<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didiks', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_jalur')->unsigned()->nullable();
            $table->foreign('id_jalur')->references('id')->on('jalur_pendaftarans')->onDelete('cascade')->onUpdate('cascade');
            $table->biginteger('id_jurusan')->unsigned()->nullable();
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomor_un')->nullable();
            $table->string('nomor_daftar')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('persyaratan')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('nilai_rapor')->nullable();
            $table->string('telepon')->nullable();
            $table->string('kode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_didiks');
    }
}
