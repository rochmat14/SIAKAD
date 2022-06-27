<?php

namespace App\Http\Controllers;

use App\Models\KKM;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KkmController extends Controller
{
    public function index()
    {
        //url "http://localhost:8000/kkm"; get

        // menampilkan semua data tabel Kelas
        $kelas = Kelas::all();

        // menampilkan semua data tabel tahunAjaran
        $tahunAjaran = tahunAjaran::all();

        // menampilkan semau data tabel Mapel
        $mapel = Mapel::all();

        // menjalankan file index pada folder kkm menjadi view
        return view('kkm.index', compact('kelas', 'tahunAjaran', 'mapel'));
    }

    public function create2(Request $request)
    {
        // url "http://localhost:8000/kkm/create2" get
        
        // membuat array request input kedalam sebuah variabel $menemukan
        $menemukan = array(
            Input::get('tahun_ajaran'),
            Input::get('mata_pelajaran')
        );

        // mencari data tabel KKM berdasarkan tahunAjaran_id, mapel_id
        $kkmMapelId = KKM::where([
            ['tahunAjaran_id', $menemukan[0]],
            ['mapel_id', $menemukan[1]]
        ])->get();

        // menampilkan semua data tabel tahunAjaran 
        $tahunAjaran = tahunAjaran::all();

        // mencari data tabel tahunAjaran berdasarkan id
        $tahunWhereId = tahunAjaran::find($menemukan[0]);
        
        // menampilkan semuda data tabel Mapel
        $mapel = Mapel::all();

        // mencari data tabel Mapel berdasarkan id
        $mapel_id = Mapel::find($menemukan[1]);

        // menampilkan semua data tabel Kelas
        $kelas = Kelas::all();

        // menjalankan file create pada folder kkm menjadi view
        return view('kkm.create', compact('menemukan', 'kkmMapelId', 'tahunAjaran', 'tahunWhereId', 'mapel', 'mapel_id', 'kelas'));
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/kkm" post

    // =====================================================================
        // syntax auto number

        // memanggil fungsi idRef pada model KKM
        $ref = KKM::idRef();

        // membuat collection kkm yang dibungkus variabel $fef
        foreach($ref as $idRef);

        // menentukan jumlah data pada tabel KKM
        $count = KKM::count();

        // jika data tabel KKM 0
        if($count == 0){

            // variabel $autoNum bernilai 1
            $autoNum = 1 ;

            // kalau tidak jika jumlah tabel KKM diatas 0
        }elseif($count > 0){

            // variabel $autoNum berisi nilai akhir idRef + 1 contoh jika nilai akhir idRef 3+1=4
            $autoNum = $idRef->idRef + 1;
        }
    // =====================================================================
        // multiple insert degan jquery validate
        $input = Input::all();

        // jika $no<jumlah request input maka $no dijalankan 
        // sampai nilai akhir dibawah dwai jumlah request input
        for($no=1; $no<=count($input['kkm']); $no++){

            // membuat objek tabel KKM baru
            $detailkkm = new KKM;

            // men set item tabel KKM dengan request input
            $detailkkm->idRef = $autoNum;
            $detailkkm->tahunAjaran_id = $input['tahunAjaran_id'][$no];
            $detailkkm->mapel_id = $input['mapel_id'][$no];
            $detailkkm->nama_kelas = $input['nama_kelas'][$no];
            $detailkkm->kkm = $input['kkm'][$no];

            // menyimpan data tabel KKM
            $detailkkm->save();
        }
    // =====================================================================
        // multiple insert degan tanpa validate

        // $condition = $input['tahunAjaran_id'];

        // $allOrders=array();
        
        // foreach ($condition as $key => $condition) {
        //     $detailorder = new KKM;
        //     $detailorder->idRef = $autoNum;
        //     $detailorder->tahunAjaran_id = $input['tahunAjaran_id'][$key];
        //     $detailorder->mapel_id = $input['mapel_id'][$key];
        //     $detailorder->nama_kelas = $input['nama_kelas'][$key];
        //     $detailorder->kkm = $input['kkm'][$key];
        //     $allOrders[]=$detailorder;

        //     $detailorder->save();
        // }

        // mengalihkan url pada "/kkm"
        return redirect('/kkm');
    }

    public function edit($tahun_ajaran_id, $mapel_id)
    {
        // url "http://localhost:8000/kkm/{tahun_ajaran_id}/{mapel_id}/edit" get

        // mencari data tabel KKM berdasarkan mapel_id dan mengambil hanya 1 data
        // dengan menggunakan take(1)
        $data_kkm = KKM::where('mapel_id', $mapel_id)->take(1)->get();

        // membuat collection data tabel KKM 
        foreach($data_kkm as $item) 

        // mengambil item idRef dari collectin tabel KKM dan dibungkus pada variabel $idRef
        $idRef = $item->idRef;

        // mencari data tabel KKM berdasarkan tahunAjaran_id, mapel_id
        $kkm = KKM::where([
            ['tahunAjaran_id', $tahun_ajaran_id],
            ['mapel_id', $mapel_id],
        ])->get();

        // mencari data tabel Mapel berdasarkan id
        $mapel = Mapel::where('id', $mapel_id)->get();

        // menjalakan file edit pada folder kkm menjadi view
        return view('kkm.edit', compact('tahun_ajaran_id', 'data_kkm', 'idRef', 'kkm', 'mapel'));
    }

    public function update(Request $request)
    {
        // url "http://localhost:8000/kkm/11" put

        // multiple input to tabel kkm 
        // perularan for. jika 0 lebih kecil dari jumlah request input kkm maka terung melakukan pengulangan seimpan data
        for($no=0; $no<count($request->kkm); $no++){

            // mencari data tabel KKM berdasarkan id
            $detailKKM = KKM::where('id','=', $request->id[$no])->first();

            // men set data item tabel kkm dengan request body input
            $detailKKM->tahunAjaran_id = $request->tahunAjaran_id;
            $detailKKM->nama_kelas = $request->nama_kelas[$no];
            $detailKKM->kkm = $request->kkm[$no];

            // melakukan penyimpanan pada tabel KKM`
            $detailKKM->save();
        }
        
        // foreach($input['tahunAjaran_id'] as $key => $value) {
        //     $data = KKM::where('id','=', $input['id'][$key])->first();
        //     $thnAjaran = $input['tahunAjaran_id'][$key];
        //     $kelas = $input['nama_kelas'][$key];
        //     $kkm = $input['kkm'][$key];
        
        //     $data->tahunAjaran_id = $thnAjaran;
        //     $data->nama_kelas = $kelas;
        //     $data->kkm = $kkm;
            
        //     $data->save();
        //     print $data;
        // }

        // mengalihkan pada url "/kkm"
        return redirect('/kkm'); 
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/kkm/2" delete

        // mencari data tabel KKM berdasarkan id
        $idMapel = KKM::where('mapel_id', $id)->delete();

        // mengalihkan pada url "/kkm"
        return redirect('/kkm');
    }


    // untuk test multiple input
    public function testing(Request $request){

        // menampilkan data input reqiest multiple input
        dd($request->name);
    }
}
