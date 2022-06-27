<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\nilaiRapor;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\RequestStack;

class nilaiRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // url "http://localhost:8000/nilaiRapor" get
        
        // menampilkan semua data tahun ajaran berdasarkan id dan tahun ajaran
        $tahunAjaran = tahunAjaran::select('id', 'tahun_ajaran')->get();

        // menampilkan data guru berdasarkan noRef login
        $kelas = Guru::where('noRef', auth()->user()->noRef)->get();

        // menajalan file index pada folder nilaiRapor menjadi view
        return view('nilaiRapor.index',compact('kelas', 'tahunAjaran'));
    }

    public function create(Request $request)
    {
        // url "http://localhost:8000/nilaiRapor/create" get

        // variabel yang menampung dara request input form
        $find = array(
                Input::get('tahunAjaran_id'),
                Input::get('semester'),
                Input::get('kelas'),
                Input::get('siswa_id')
        );

        // data siswa untuk input dropdown siswa
        // menampilkan data tabel Siswa berdasarkan kelas_awal
        $siswa = Siswa::where('kelas_awal', $request->kelas)->get();
        
// ==========================================================================================
                
        // data tahun ajaran untuk dropdown tahun ajaran
        // menampilkan data tabel tahuAjaran dengan item id dan tahun_ajaran
        $tahunAjaran = tahunAjaran::select('id', 'tahun_ajaran')->get();

        // mencari data tahunAjaran berdasarkan id
        $tahunWhere = $tahunAjaran->where('id', $find[0]);

        // mencari data tabel Guru berdasarkan noRef yang login
        $kelas = Guru::where('noRef', auth()->user()->noRef)->get();

        // mencari data tabel Kelas berdasarkan nama_kelas
        $kelasID = Kelas::where('nama_kelas', $find[2])->get();

        // collection kelas yang dibungkus variabel $kelasID
        foreach($kelasID as $kelas_id);

        // mencari data tabel Siswa berdasarkan id
        $siswaWhere = Siswa::where('id', $find[3])->get();

        // menampilkan data tabel Siswa berdasarkan id
        $eskul = Siswa::find($find[3]); 
        
// ==========================================================================================
        // mencari data tabel nilaiRapor berdasarkan tahunAjaran_id, semester, kelas_id, siswa_id
        $cekDataGanda = nilaiRapor::where([ 
            ['tahunAjaran_id', '=', $find[0]],
            ['semester', '=', $find[1]],
            ['kelas_id', '=', $kelas_id->id],
            ['siswa_id', '=', $find[3]],
        ])->get();  


        // menghitung jumlah data tabel nilaiRapor yang dibugnskus veriabel $jumlahData
        $jumlahData = $cekDataGanda->count();
// ==========================================================================================
        
        // menjalankan file create folder nilaiRapor menjadi view
        return view('nilaiRapor.create',compact('find', 'siswa', 'tahunAjaran', 'tahunWhere', 'kelas', 'kelasID', 'siswaWhere', 'eskul', 'cekDataGanda', 'jumlahData'));
    }

    public function store(Request $request)
    {
        //url "http://localhost:8000/nilaiRapor" post
        
        // membuat objek tabel nilaiRapor baru
        $nilai_rapor = new nilaiRapor;

        // men set value item tabel nilaiRapor dengan request input
        $nilai_rapor->tahunAjaran_id = $request->tahunAjaran_id;
        $nilai_rapor->semester = $request->semester;
        $nilai_rapor->kelas_id = $request->kelas_id;
        $nilai_rapor->siswa_id = $request->siswa_id;
        $nilai_rapor->ekstrakulikuler_id = $request->ekstrakulikuler_id;
        $nilai_rapor->nilai_eskul =$request->nilai_eskul;
        $nilai_rapor->keterangan_eskul = $request->keterangan_eskul;
        $nilai_rapor->nilai_akhlak = $request->nilai_akhlak;
        $nilai_rapor->nilai_keperibadian = $request->nilai_keperibadian;
        $nilai_rapor->izin = $request->izin;
        $nilai_rapor->sakit = $request->sakit;
        $nilai_rapor->tanpa_keterangan = $request->tanpa_keterangan;
        $nilai_rapor->keputusan = $request->keputusan;

        // melakukan penyimpanan data data object baru yang telah di sesuaikan dengan value item 
        $nilai_rapor->save();
        
        // mengalihkan pada halaman "nilaiRapor"
        return redirect('/nilaiRapor');
    }

    public function edit($id, $idTahunAjaran, $semester, $idKelas, $idSiswa)
    {
        // url "http://localhost:8000/nilaiRapor/{id}/{idTahunAjaran}/{semester}/{idKelas}/{idSiswa}/edit" get

        // mencari data tabel nilaiRapor berdasarkan id
        $rapor = nilaiRapor::find($id);

        // menjalankan file edit pada folder nilaiRapor
        return view('nilaiRapor.edit', compact('rapor', 'idTahunAjaran', 'semester', 'idKelas', 'idSiswa'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/nilaiRapor/{id}" put

        // mencari data tabel nilaiRapr berdasarkan id
        $nilai_rapor = nilaiRapor::find($id);
        
        // men set item tabel nilaiRapor berdsarkan request input
        $nilai_rapor->nilai_eskul = $request->nilai_eskul;
        $nilai_rapor->keterangan_eskul = $request->keterangan_eskul;
        $nilai_rapor->nilai_akhlak = $request->nilai_akhlak;
        $nilai_rapor->nilai_keperibadian = $request->nilai_keperibadian;
        $nilai_rapor->izin = $request->izin;
        $nilai_rapor->sakit = $request->sakit;
        $nilai_rapor->tanpa_keterangan = $request->tanpa_keterangan;
        $nilai_rapor->keputusan = $request->keputusan;

        // menyimpan pada tabel nilaiRapor
        $nilai_rapor->update();

        
        if($nilai_rapor){
            return redirect('/nilaiRapor')->with('alert', 'Ubah Data Berhasil!');
        }else{
            return redirect('/nilaiRapor')->with('alert', 'Maaf Terjadi Kesalah Pada Server!');
        }
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/nilaiRapor/{id}" delete

        // mencari data nilaiRapor berdasarkan id lalu melakukan penghapusan data
        nilaiRapor::find($id)->delete();

        // mengalihkan ke url "/nilaiRapor"
        return redirect('/nilaiRapor');
    }


// untuk mengirim data ke dependet-dropdown option
    public function getSiswa($kelas) 
    {        
        // url "http://localhost:8000/dropdownlist/getSiswa/{nama_kelas}"
        
        // mencari data tabel Siswa berdasarkan kelas_awal dan menampilkan menjadi array hanya nama dan id
        $siswa = Siswa::where("kelas_awal", $kelas)->pluck("nama","id");

        // menjalankan data tabel Sisw menggunakan json;
        return json_encode($siswa);
    }
}
