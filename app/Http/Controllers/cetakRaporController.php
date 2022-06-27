<?php

namespace App\Http\Controllers;

// memanggil model
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\nilaiRapor;
use App\Models\nilaiSiswa;
use App\Models\Siswa;
use App\Models\tahunAjaran;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class cetakRaporController extends Controller
{
    //
    public function index(){
        // url "http://localhost:8000/cetakRapor"

        // menampilkan data pada table tahunAjaran yang dibungkus pada varibel "$tahunAjaran"
        $tahunAjaran = tahunAjaran::all();
        
        // mengambil data noRef pada table user ketika dalam kondisi login user yang dibungkus pada variabel "$noRef"
        $noRef = auth()->user()->noRef;
        
        // mencari data guru bedasarkan noRef yang dibungkus pada variable "$guru"
        $guru = Guru::where('noRef', $noRef)->get();

        // menampikan semua data pada table kelas yang dibungkus pada variable "$kelas"
        $kelas = Kelas::all();

        // menjalankan file index pada folder cetakRapor yang berisi view blade laravel
        return view('cetakRapor.index', compact('tahunAjaran', 'guru', 'kelas'));
    }


    public function daftarCetak(Request $request){
        // url ""
        
        // menampilkan semua data pada table tahunAjaran yang dibukus pada variabel "$tahunAjaran"
        $tahunAjaran = tahunAjaran::all();
        
        // mengambil noRef pada tabel user saat kondisi login yang di bungkus pada variabel "$noRef";
        $noRef = auth()->user()->noRef;
        
        // mencari data tabel Guru berdasarkan noRef yang dibungkus variabel "$guru"
        $guru = Guru::where('noRef', $noRef)->get();
        
        // mencari data tabel tahunAjaran berdasarkan id yang dibungkus pada variabel "$tahunAjaran"
        $tahunAjaran_id = tahunAjaran::find($request->tahunAjaran_id);
        
        // menampilkan semua data tabel Kelas yang dibungkus pada variabel "$kelas"
        $kelas = Kelas::all();
        
        // mencari data tabel nilaiRapor berdasarkan tahunAjaranb_id, semester, kelas_id yang dibungkus variabel "$nilaiRapor"
        $nilaiRapor = nilaiRapor::where([
            ['tahunAjaran_id', $request->tahunAjaran_id],
            ['semester', $request->semester],
            ['kelas_id', $request->kelas_id]
        ])->get();

        // array input yang dibungkus dengan variable "$find"
        $find = array(
            Input::get('tahunAjaran_id'),
            Input::get('semester'),
            Input::get('kelas_id')
        );

        // menjalankan file daftar_cetak_rapor pada folder cetakRapor menjadi sebuah page or view
        return view('cetakRapor.daftar_cetak_rapor', compact('tahunAjaran', 'guru', 'tahunAjaran_id', 'kelas', 'nilaiRapor', 'find'));
    }

    public function showRapor(Request $request){
        // url "http://localhost:8000/rapor"
        
        // input yang dijadikan array untuk di panggil pada view yang dibungkus pada varibel "$find"
        $find = array(
            Input::get('tahun_ajaran'),
            Input::get('semester'),
            Input::get('id_siswa'),
            Input::get('nama_siswa'),
            Input::get('nis_siswa'),
            Input::get('kelas_id')
        );

// ====================================================================================
        // mencari data tabel Siswa berdasarkan id
        $siswa = Siswa::find($find[2]);

        // mencari data nilai siswa dari berdasarkan tahunAjaran_id, semester, kelas_id, 
        // yang disesuaikan dengan data tabel siswa yang telah di cari berdasarkan id
        $nilaiSiswa = $siswa->nilaiSiswa()->where([
            ['tahunAjaran_id', '=', $find[0]],
            ['semester', '=', $find[1]],
            ['kelas_id', '=', $find[5]],
        ])->get();

// ================================================================================
        // mencari nilaiRapor berdasarkan tahunAjaran_id, semester, kelas_id, siswa_id
        $nilai_rapor = nilaiRapor::where([
            ['tahunAjaran_id', '=', $find[0]],
            ['semester', '=', $find[1]],
            ['kelas_id', '=', $find[5]],
            ['siswa_id', $find[2]]
        ])->first();

        // return $nilai_rapor->nilaiSiswa;
        
        // menjalankan file rapor menjadi view
        return view('cetakRapor.rapor', compact('nilai_rapor', 'find', 'siswa', 'nilaiSiswa'));
    }
}
