<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';

    protected $fillable = ['noRef', 'nis', 'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'anak_ke', 'alamat', 'no_telepon', 'asal_sekolah', 'kelas_awal', 'tanggal_diterima', 'nama_ayah', 'nama_ibu', 'alamat_ortu', 'telepon_ortu', 'pekerjaan_ayah', 'pekerjaan_ibu'];

    public static function noRef(){
        return DB::table('siswa')->orderBy('noRef', 'desc')->take(1)->first();
    }

    public function ekstrakulikuler(){
        return $this->belongsToMany(Ekstrakulikuler::class);
    }

    public function nilaiSiswa(){
        return $this->hasMany(nilaiSiswa::class);
    }

    public function nilaiRapor(){
        return $this->hasOne(nilaiRapor::class);
    }
}
