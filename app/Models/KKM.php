<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class KKM extends Model
{
    //
    protected $table = 'kkm';

    protected $fillable = [
        'tahunAjaran',
        'nama_kelas',
        'mapel_id',
        'kkm',
    ];

    public function tahunAjaran(){
        return $this->belongsTo(tahunAjaran::class, 'tahunAjaran_id');
    }
    
    public function mapel(){
        return $this->belongsTo('App\Models\Mapel');
    }
    
    public static function idRef(){
        return DB::table('kkm')->orderBy('idRef', 'desc')->take(1)->get();
    }
}
