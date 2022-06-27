<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';

    protected $fillable = ['noRef', 'nip', 'nama', 'jenis_kelamin', 'alamat'];

    public static function noRef(){
        // mendapatkan 1 data terakhir pada table guru dan menampilkan item noRef
        return DB::table('guru')->orderBy('noRef', 'desc')->take(1)->get();

    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
