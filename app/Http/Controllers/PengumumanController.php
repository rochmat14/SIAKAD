<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        //url "http://localhost:8000/pengumuman" get
        // menampilkan semua data tabel Pengumuman
        $pengumuman = Pengumuman::orderBy('id', 'DESC')->get();

        // menjankan file index pada folder pengumuman menjadi view
        return view('pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        //url "http://localhost:8000/pengumuman/create" get

        // menjalankan file create pada folder pengumuman
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/pengumuman" post

        // membuat object baru data tabel Pengumuman
        $pengumuman = new Pengumuman();

        // men set item tabel dengan request input
        $pengumuman->judul = $request->judul;
        $pengumuman->tanggal = $request->tanggal;

        // melakukan penyimpanan data pada tabel Pengumuman
        $pengumuman->save();

        // mengalihkan url ke '/pengumuman'
        return redirect('/pengumuman');
    }

    public function edit($id)
    {
        //url "http://localhost:8000/pengumuman/{id}/edit" get

        // mencari data tabel pengumuman berdasarkan id
        $pengumuman = Pengumuman::find($id);

        // menajalankan file edit pada folder pengumuman menjadi view
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/pengumuman/5" put

        // mencari data tabel Pengumuman berdasarkan id
        $pengumuman = Pengumuman::find($id);

        // men set item tabel berdasarkan data request input
        $pengumuman->judul = $request->judul;
        $pengumuman->tanggal = $request->tanggal;

        // mengyimpan data yang telah di set
        $pengumuman->update();

        // mengalihkan pada url "/pengumuman"
        return redirect('/pengumuman');
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/pengumuman/{id}" destroy

        // mencari data tabel pengumuman berdasarkan id dan melakukan penghapusan data yang didapat
        Pengumuman::find($id)->delete();

        // mengalihkan pada url  "/pengumuman"
        return redirect('/pengumuman');
    }
}
