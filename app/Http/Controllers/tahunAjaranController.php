<?php

namespace App\Http\Controllers;

use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class tahunAjaranController extends Controller
{
    public function index()
    {
        // url "http://localhost:8000/tahunAjaran" get

        // menampilkan semua data tabel tahuAjaran di urutkan DESCENDING berdasarkan id
        $tahunAjaran = tahunAjaran::orderBy('id', 'DESC')->get();

        // menjalankan file index pada folder tahuAjaran menjadi view
        return view('tahunAjaran.index', compact('tahunAjaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // url "http://localhost:8000/tahunAjaran/create" get

        // menjalankan file create di dalam folder tahunAjaran menjadi view
        return view('tahunAjaran.create');
    }

    public function store(Request $request)
    {
        // ulr "http://localhost:8000/tahunAjaran" post

        // membuat objek baru tabel tahuAjaran
        $tahun_ajaran = new tahunAjaran;

        // men set item tabel berdasarkan value requst input form tahun ajaran
        $tahun_ajaran->tahun_ajaran = $request->tahun_ajaran;
        
        // menyimpan data ke tabel tahun ajaran yang telah di set
        $tahun_ajaran->save();
        
        // mengalihkan data pada url /tahunAjaran
        return redirect('/tahunAjaran');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // url "http://localhost:8000/tahunAjaran/{id}/edit" get

        // mencari data tabel tahunAjaran berdasarkan id
        $tahunAjaran = tahunAjaran::find($id);

        // menajalankan file edit pada folder tahunAjaran menjadi view
        return view('tahunAjaran.edit', compact('tahunAjaran'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/tahunAjaran/{id}" put

        // mencari data tahunAjaran berdasarkan id 
        $tahunAjaran = tahunAjaran::find($id);

        // men set item tabel dengan request input pada form Tahun Ajaran
        $tahunAjaran->tahun_ajaran = $request->tahun_ajaran;

        // melakukan penyimpanan data tabel tahunAjaran yang sudah di set
        $tahunAjaran->update();

        // mengalihkan pada url "/tahunAjaran"
        return redirect('/tahunAjaran');
    }

    public function destroy($id)
    {
        // url "http://localhost:8000/tahunAjaran/6" delete

        // mencari data tabel tahunAjaran berdasarkan id 
        // lalu menghapus data yang telah di temukan
        tahunAjaran::find($id)->delete();

        // mengalihkan ke url '/tahunAjaran'
        return redirect('/tahunAjaran');
    }
}
