<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Ekstrakulikuler;
use App\Models\eskulSiswa;
use Illuminate\Http\Request;

class SiswaEkstrakulikulerController extends Controller
{
    public function index()
    {
        // url "http://localhost:8000/siswaEskul" get

        // menampilkan sermua data tabel Siswa di urutkan DESCENDING
        $siswa = Siswa::orderBy('id', 'DESC')->get();

        // menjalakan file index pada file siswaEskul menjadi view
        return view('siswaEskul.index', compact('siswa'));
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/siswaEskul/" post

        // mencari data tabel siswa berdasarkan item siswa_id
        $siswa = Siswa::findOrFail($request->siswa_id);

        // menghitung jumlah data yang ada pada tabel siswa
        $jumlah = $siswa->ekstrakulikuler->count();

        // kondisi jika data pada table ekstrakulikuler_id sudah ada/diatas angka 0 
        if($request->ekstrakulikuler_id == 0){
            
            // menghapus data pada tabel eskulSiswa
            // mencari data tabel eskulSiswa lalaju melakukan penghapusan data
            eskulSiswa::where('siswa_id', $request->siswa_id)->delete();

        }

        else if($jumlah > 0) {
            // update data menggunakan updateExistingPivot
            // memanggil fungsi relasi ekstrakuliler pada model Siswa
            foreach($siswa->ekstrakulikuler as $eskul);

             // set item tabel dengan data request input
            $data = ['ekstrakulikuler_id' => $request->ekstrakulikuler_id];
            
            // set item tabel dengan data request input
            $data = ['ekstrakulikuler_id' => $request->ekstrakulikuler_id];

            // maka akan mengupdate data
            $siswa->ekstrakulikuler()->updateExistingPivot($eskul->id, $data);
        }
            
        // tapi jika data belum ada data
        else{

            // menambah data dengan metode attach
            // siswa_id sudah otomatis terbaca
            $siswa->ekstrakulikuler()->attach($request->ekstrakulikuler_id);
        }

        // mengalihkan url ke "/siswaEskul"
        return redirect('/siswaEskul');
    }

    public function edit($id)
    {
        // url "http://localhost:8000/siswaEskul/{id}/edit" get

        // mencari data tabel Siswa berdasarkan id
        $siswa = Siswa::find($id);

        // memanggil fusngi relasi pada tabel Siswa menggunakan collection
        foreach($siswa->ekstrakulikuler as $eskulId);

        // menampilkan semuad data tabel Ektrakulikuler dengan item id dan ekstrakulikuler
        $eskul = Ekstrakulikuler::select('id', 'ekstrakulikuler')->get();
        
        // menjalankan fiel edit pada folder siswaEkstrakulikuler
        return view('siswaEskul.edit', compact('siswa', 'eskulId', 'eskul'));
    }

}
