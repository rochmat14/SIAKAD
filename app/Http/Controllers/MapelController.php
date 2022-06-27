<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        // url "http://localhost:8000/mapel" get

        // menampilkan semua data tabel Mapel menurun berdasarkan id
        $mapel = Mapel::orderBy('id', 'DESC')->get();

        // menjalankan file index folder mapel menjadi view
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        //url "http://localhost:8000/mapel/create" get

        // menjalankan file create pada folder mapel menjadi view
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/mapel" post

        // membuat object baru pada tabel Mapel
        $mapel = new Mapel;

        // men set data data itme tabel Mapel berdasarkan request input
        $mapel->mata_pelajaran = $request->mata_pelajaran;

        // menyimpan data yang telah tabel Mapel yang telah di sesuaikan
        $mapel->save();

        // mengalihkan ke url "/mapel"
        return redirect('/mapel');
    }

    public function edit($id)
    {
        // url "http://localhost:8000/mapel/{id}/edit" get

        // mencari data tabel Mapel berdasarkan id
        $mapel = Mapel::find($id);

        // menjalankan file edit pada folder mapel menjadi view
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/mapel/{id}" post
        
        // mencari data tabel Mapel berdasarkan id
        $mapel = Mapel::find($id);

        // men set item tabel Mapel berdasrkan request input
        $mapel->mata_pelajaran = $request->mata_pelajaran;

        // menyimpan data tabel Mapel yang telah di sesuaikan
        $mapel->save();

        // mengalihkan pada url "/mapel"
        return redirect('/mapel');
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/mapel/{id}"

        // mencari data tabel Mapel berdasarkan id dan melakukan penghapusan data
        Mapel::find($id)->delete();

        // mengalihkan pada url "/mapel";
        return redirect('/mapel');
    }
}
