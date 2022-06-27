<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\tahunAjaran;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //url "http://localhost:8000/jadwal" get

        // menampilkan semuda data pada tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();
        
        // menampilkan semua data pada tabel Jadwal
        $jadwal = Jadwal::orderBy('id', 'DESC')->get();

        // menjalakna file index pada folder jadwal
        return view('jadwal.index', compact('jadwal', 'tahunAjaran'));
    }

    public function create()
    {
        //url  "http://localhost:8000/jadwal/create" get
        
        // menampilkan sedua data tabel Jadwal
        $jadwal = Jadwal::all();

        // menampilkan semua data tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();

        // menampilkan semua data tabel Kelas
        $kelas  = Kelas::all();

        // menampilkan semua data tabel Mapel
        $mapel  = Mapel::all();

        // menampilkan semua data tabel Guru
        $guru   = Guru::all();

        // menjalankan file create dari folder jadwal
        return view('jadwal.create', compact('jadwal', 'tahunAjaran', 'kelas', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/jadwal"
        
        // menciptakan objeck jadwal baru
        $jadwal = new Jadwal;

        // men set item tabel jadwal yang diambil dari request body
        $jadwal->tahunAjaran_id = $request->tahun_ajaran;
        $jadwal->semester       = $request->semester;
        $jadwal->nama_kelas     = $request->nama_kelas;
        $jadwal->mapel_id       = $request->mata_pelajaran;
        $jadwal->hari           = $request->hari;
        $jadwal->waktu_mulai    = $request->waktu_mulai;
        $jadwal->waktu_selesai  = $request->waktu_selesai;
        $jadwal->guru_id        = $request->guru;

        // menyimpan data table Jadwal ke database
        $jadwal->save();

        // mengalihkan pada url "/jadwal"
        return redirect('/jadwal');
    }

    public function edit($id)
    {
        //url "http://localhost:8000/jadwal/7/edit" get

        // mencari data Jadwal tabel berdasarkan id
        $jadwal = Jadwal::find($id);

        // menampilkan semua data tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();

        // menampilkan semua data tabel Kelas
        $kelas = Kelas::all();
        
        // menampilkan semua data tabel Mapel
        $mapel = Mapel::all();

        // menampilkan semua data tabel Guru
        $guru = Guru::all();

        // menjalankan file edit pada folder jadwal menjadi view
        return view('jadwal.edit', compact('jadwal', 'tahunAjaran', 'kelas', 'mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/jadwal/{id}" put
        
        // mencari data tabel Jadwal berdasarkan id
        $jadwal = Jadwal::find($id);

        // men set item table Jadwal yang di ambil dari request body
        $jadwal->tahunAjaran_id = $request->tahun_ajaran;
        $jadwal->semester       = $request->semester;
        $jadwal->nama_kelas     = $request->nama_kelas;
        $jadwal->mapel_id       = $request->mata_pelajaran;
        $jadwal->hari           = $request->hari;
        $jadwal->waktu_mulai    = $request->waktu_mulai;
        $jadwal->waktu_selesai  = $request->waktu_selesai;
        $jadwal->guru_id        = $request->guru;

        // menyimpan data tabel jadwal pada database
        $jadwal->save();
        
        // mengalihkan pada url "/jadwal"
        return redirect('/jadwal');
    }

    public function destroy($id)
    {
        //url "localhost:8000/jadwal/{id}" delete

        // mencari data tabel Jadwal berdasarkan id lalu melakukan penghapusan data
        Jadwal::find($id)->delete();

        // mengalihkan pada url "/jadwal"
        return redirect('/jadwal');
    }

    public function jadwalTampil(Request $request){
        // url "http://localhost:8000/jadwalTampil" post pada hak akses siswa`

        // menampilkan semua data tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();

        // menamung request body tahunAjaran_id dan semester pada variabel $find
        $find = array(
            INPUT::get('tahunAjaran_id'),
            INPUT::get('semester')
        );

        // mencari data tabel Siswa berdasarkan noRef 
        $kelas_siswa = Siswa::where('noRef', auth()->user()->noRef)->get();

        // membuat collection tabel siswa yang dibungkus variabel $kelas_siswa
        foreach($kelas_siswa as $kelas);
        
        // mencari data tabel Jadwal berdasarkan tahunAjaran_id, semester, nama_kelas
        $jadwal = Jadwal::where([
            ['tahunAjaran_id', '=', $request->tahunAjaran_id],
            ['semester', '=', $request->semester],
            ['nama_kelas', '=', $kelas->kelas_awal]
        ])->get();
        
        // menjalankan file jadwalTampil pada folder jadwal menjadi view
        return view('jadwal.jadwalTampil', compact('tahunAjaran', 'find', 'kelas', 'jadwal' ));
    }
}
