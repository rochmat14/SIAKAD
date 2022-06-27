<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eskulSiswa extends Model
{
    //
    protected $table = "ekstrakulikuler_siswa";

    protected $fillable = ['siswa_id', 'ekstrakulikuler_id'];
}
