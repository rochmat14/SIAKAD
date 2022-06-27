<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';

    protected $fillable = ['tahunAjaran_id', 'nama_kelas', 'guru_id'];

    public function tahunAjaran(){
        return $this->belongsTo(tahunAjaran::class, 'tahunAjaran_id');
    }
    
    public function guru(){
        return $this->belongsTo('App\Models\Guru', 'guru_id');
    }
}
