<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilaiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiSiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('idRef');
            $table->integer('tahunAjaran_id')->unsigned();
            $table->foreign('tahunAjaran_id')->references('id')->on('tahunAjaran')->onDelete('cascade');
            $table->string('semester');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->integer('mapel_id')->unsigned();
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->integer('kkm_id')->unsigned();
            $table->foreign('kkm_id')->references('id')->on('kkm')->onDelete('cascade');
            $table->integer('siswa_id')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->double('nilai_tugas');
            $table->double('nilai_ujian_harian');
            $table->double('nilai_ujian_semester');
            $table->double('nilai_akhir');
            $table->string('keterangan', 15);
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
        Schema::dropIfExists('nilaiSiswa');
    }
}
