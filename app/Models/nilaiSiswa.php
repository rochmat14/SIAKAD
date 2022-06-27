<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class nilaiSiswa extends Model
{
    //
    protected $table = 'nilaiSiswa';

    protected $fillabel = [
        'idRef',
        'tahunAjaran_id',
        'semester',
        'kelas_id',
        'mapel_id',
        'kkm_id',
        'siswa_id',
        'nilai_tugas',
        'nilai_ujian_harian',
        'nilai_ujian_semester',
        'nilai_akhir',	
        'keterangan',	
    ];

    public function tahunAjaran(){
        return $this->belongsTo(tahunAjaran::class, 'tahunAjaran_id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function kkm(){
        return $this->belongsTo(KKM::class, 'kkm_id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    
    public static function idRef(){
        return DB::table('nilaiSiswa')->orderBy('id', 'desc')->take(1)->first();
    }
}
