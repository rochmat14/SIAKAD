<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // url "http://localhost:8000/kelas" get

        // menampilkan semua data tabel Kelas berdasarkan id meurun
        $kelas = Kelas::orderBy('id', 'DESC')->get();

        // menjalankan file index pada folder kelas menjadi view
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        // url "http://localhost:8000/kelas/create" get

        // menampilkanan semau data tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();

        // menampilkan semau data tabel Guru
        $guru = Guru::all();

        // menjalankan file create pada folder kelas menjadi view
        return view('kelas.create', compact('tahunAjaran', 'guru'));
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/kelas"; post
        
        // membaut object Kelas baru
        $kelas = new Kelas;

        // men set item tabel Kelas dari request input
        $kelas->tahunAjaran_id = $request->tahun_ajaran;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->guru_id = $request->guru;

        // menyimpan data tabel Kelas
        $kelas->save();
        
        // mengalihkan pda url "/kelas"
        return redirect('/kelas');
    }

    public function edit($id)
    {
        // url "http://localhost:8000/kelas/{id}/edit" get

        // mencari data tabel Kelas berdasarkan id
        $kelas = Kelas::find($id);

        // menampilkan semua data tabel tahunAjaran 
        $tahunAjaran = tahunAjaran::all();
        
        // menampilkan semua data tabel Guru
        $guru = Guru::all();

        // menjalankan file edit pada folder kelas menjadi view
        return view('kelas.edit', compact('kelas', 'tahunAjaran', 'guru'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/kelas/{$id}" put
        
        // mencari data Kelas berdasarkan id
        $kelas = Kelas::find($id);

        // men set data item tabel berdasarkan request body
        $kelas->tahunAjaran_id = $request->tahun_ajaran;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->guru_id = $request->guru;

        // memperbaruhi data tabel Kelas yang telah di temukan dan di set 
        $kelas->update();
        
        // mengalihkan pada url "/kelas"
        return redirect('/kelas');
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/kelas/{id}" delete

        // mencari data tabel Kelas berdasarkan id
        Kelas::find($id)->delete();

        // mengalihkan pada url "/kelas"
        return redirect('/kelas');
    }
}
