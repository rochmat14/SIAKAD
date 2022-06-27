<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    //
    protected $table = 'ekstrakulikuler';

    protected $fillable = ['ekstrakulikuler'];

    public function siswa(){
        return $this->belongsToMany(Siswa::class);
    }
}
