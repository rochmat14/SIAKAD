<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class nilaiRapor extends Model
{
    //
    protected $table = 'nilaiRapor';

    protected $fillable =  ['tahunAjaran_id', 
                            'semester', 
                            'kelas_id', 
                            'siswa_id', 
                            'ekstrakulikuler_id',
                            'nilai_eskul',
                            'keterangan_eskul',
                            'nilai_akhlak',
                            'nilai_keperibadian',
                            'izin',
                            'sakit',
                            'tanpa_keterangan',
                            'keputusan'];

    public static function idRef(){
        return DB::table('nilaiRapor')->orderBy('idRef', 'desc')->take(1)->get();
    }

    public function tahunAjaran(){
        return $this->belongsTo('App\Models\tahunAjaran', 'tahunAjaran_id');
    }

    public function kelas(){
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }
    
    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

    public function nilaiSiswa(){
        return $this->hasMany('App\Models\nilaiSiswa', 'siswa_id', 'siswa_id');
    }

    public function ekstrakulikuler(){
        return $this->belongsTo(Ekstrakulikuler::class);
    }
}
