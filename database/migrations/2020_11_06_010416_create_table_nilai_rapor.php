<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilaiRapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiRapor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahunAjaran_id')->unsigned();
            $table->foreign('tahunAjaran_id')->references('id')->on('tahunAjaran')->onDelete('cascade');
            $table->string('semester');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->integer('siswa_id')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->integer('ekstrakulikuler_id')->unsigned();
            $table->foreign('ekstrakulikuler_id')->references('id')->on('ekstrakulikuler')->onDelete('cascade');
            $table->string('nilai_eskul', 20);
            $table->string('keterangn_eskul');
            $table->string('nilai_akhlak');
            $table->string('nilai_keperibadian');
            $table->double('izin');
            $table->double('sakit');
            $table->double('tanpa_keterangan');
            $table->string('keputusan');
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
        Schema::dropIfExists('nilaiRapor');
    }
}
