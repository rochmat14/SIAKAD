<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $table = 'jadwal';

    protected $fillable = [ 'tahunAjaran_id',
                            'semester',
                            'nama_kelas',
                            'mapel_id',
                            'hari',
                            'waktu_mulai',
                            'waktu_selesai',
                            'guru_id' ];

    public function tahunAjaran(){
        return $this->belongsTo('App\Models\tahunAjaran', 'tahunAjaran_id');
    }
                            
    public function mapel(){
        return $this->belongsTo('App\Models\Mapel');
    }

    public function guru(){
        return $this->belongsTo('App\Models\Guru');
    }                       
}
