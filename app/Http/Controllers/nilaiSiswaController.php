<?php

namespace App\Http\Controllers;

use App\Models\KKM;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\nilaiSiswa;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use App\Helpers\AngkaTerbilang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class nilaiSiswaController extends Controller
{
    
    public function index()
    {
        // url "http://localhost:8000/nilaiSiswa" get

        // menampilkan sermua data tabel tahunAjaran dengan item id dan tahun_ajaran
        // untuk select option Tahun Ajaran
        $tahunAjaran = tahunAjaran::select('id', 'tahun_ajaran')->get();

        // menampilkan semuad data tabel Mapel dengan item id dan mata_pelajaran
        // untuk select option Mata Pelajaran 
        $mapel       = Mapel::select('id', 'mata_pelajaran')->get();

        // menampilkan semaua data tabel Kelas denga item id dan nama_kelas
        // untuk select option Kelas
        $kelas       = Kelas::select('id', 'nama_kelas')->get();

        // menjalankan file index pada folder nilaiSiswa menjadi view
        return view('nilaiSiswa.index', compact('tahunAjaran', 'mapel', 'kelas'));
    }

    public function create2(Request $request)
    {
        // url "http://localhost:8000/nilaiSiswa/create2" get

        // variabel yang menampung request input form
        // untuk select option Tahun Ajaran $find[0]
        // untuk select option Semster $find[1]
        // untuk select Mata Pelajaran $find[2]
        // untuk select Kelas $find[3]
        // untuk link action button Ubah $find[0], $find[1], $find[2], $find[3]
        $find = array(
            Input::get('tahunAjaran_id'),
            Input::get('semester'),
            Input::get('mapel_id'),
            Input::get('kelas_id')
        );

        // menghitung jumlah string sekaligus memisahkan
        $kelas_expl = explode(".", $request->kelas_id);

        // mengambil urutan string pada variabel $kelas_expl yang sudah di pidahkan dengan explode
        // id kelas
        // dipakan untuk variabel $cekData untuk menjadi item pencarian berdasarkan kelas_id
        $kelas_id = $kelas_expl[0];

        // mengambil urutan string pada variabel $kelas_expl yang sudah di pidahkan dengan explode
        // nama kelas
        // untuk variabel $kkm untuk item mencari berdasarkan nama_kelas
        // untuk variabel $siswa untuk item mencari berdasarkan kelas_awal
        $kelas_nama = $kelas_expl[1];

        // mencari data KKM berdasarkan tahunAjaran_id, nama_kelas, mapel_id
        // untuk mengecek jika $kkm kosong
        $kkm = KKM::where([
            ['tahunAjaran_id', '=', $request->tahunAjaran_id],
            ['nama_kelas', '=', $kelas_nama],
            ['mapel_id', '=', $request->mapel_id]
        ])->get();

        // menampilkan semua data tabel tahunAjaran
        // untuk select option Tahun Ajaran
        $tahunAjaran1 = tahunAjaran::select('id', 'tahun_ajaran')->get();

        // mencari tahun ajaran berdasarkan id
        // untuk item tahunAjaran_id saat insert tabel nilaiSiswa
        $tahunAjaran2 = tahunAjaran::find($find[0]);
        
        // menampilkan semua data tabel Mapel
        // untuk select option Mata Pelajaran
        $mapel1       = Mapel::select('id', 'mata_pelajaran')->get();

        // mencari data tabel Mapel berdasarkan id
        // untuk item mapel_id saat insert pada tabel nilaiSiswa
        $mapel2       = Mapel::find($find[2]);

        // menampilkan semua data kelas 
        // untuk dropdown kelas
        $kelas1       = Kelas::select('id', 'nama_kelas')->get();

        // mencari data tabel Kelas berdasarkan id
        // untuk insert data pada tabel nilaiSiswa
        $kelas2       = Kelas::find($find[3]);

// ================================================================================================

        // mencari data tabel Kelas berdasarkan id dan mendapatkan data nama_kelas
        $kelas4 = Kelas::find($find[3])->nama_kelas;

        // mencari data tabel Sisswa berdasarkan kelas_awal
        $siswa  = Siswa::where('kelas_awal', $kelas_nama)->get();

// ================================================================================================
        // memeriksa jika data sudah ada maka keluar button ubah dan hapus

        // mencari data tabel nilaiSiswa berdasarkan tahunAjaran_id, semester, mapel_id, kelas_id
        $cekData = nilaiSiswa::where([
            ['tahunAjaran_id', '=', $request->tahunAjaran_id],
            ['semester', '=', $request->semester],
            ['mapel_id', '=', $request->mapel_id],
            ['kelas_id', '=', $kelas_id],
        ])->get();

// ================================================================================================
        // membuat collection tabel nilaiSiswa
        foreach($cekData as $item);


        // mengecek idRef table nilai siswa
        // jika data tabel KKM kosong
        if( $kkm->isEmpty() ){
            
        // jika variable $cekData tidak kosong 
        }else if(!$cekData->isEmpty()){

            // maka akan mengirim "$idRef = $item->idRef" pada return
            $idRef = $item->idRef;

            // jika varible "$kkm" kosong dan variable "$cekData" tidak kosong 
            // atau di luar kondisi if dan else if di atas maka 
            // tidak mengirim "$idRef = $item->idRef" pada return
        }else{
            
        }
    
        // menjalankan file create pada folder nilaiSiswa menjadi view
        return view('nilaiSiswa.create', compact('find', 'tahunAjaran1', 'tahunAjaran2', 'mapel1', 'mapel2', 'kelas1', 'kelas2', 'kkm', 'siswa', 'cekData', 'idRef'));
// ================================================================================================
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/nilaiSiswa" post

        // memenggil fungsi idRef pada model nilaiSiswa
        // dan mendapatkan data terakhir berbentuk angka untuk di tambahkan 
        // menjadi auto number item id ref pada tabel nialiSiswa
        $ref    = nilaiSiswa::idRef();

        // menghitung jumlah data yang ada pada tabel nilaiSiswa
        $count  = nilaiSiswa::count();
        
        // jika jumlah data nilaiSiswa yang dibungkus pada variabel $count nilainya 0
        if($count == 0){

            // maka variabel $autoNum bernilai 1
            $autoNum = 1 ;

        // lain pula jika jumlah data pada tabel nilaiSiswa 
        // yang dibungkus pada variabel $count nilainy diatas 0
        }elseif($count > 0){

            // mendatapkan value item idRef pada tabel nilaiSiswa.  lalu menambahkan dengan angka 1
            $autoNum = $ref->idRef + 1;
        }

        // $condition = $input['tahunAjaran_id'];

        
        // foreach ($condition as $key => $condition) {
        //     $detailorder = new nilaiSiswa;
        //     $detailorder->idRef                 = $autoNum;
        //     $detailorder->tahunAjaran_id        = $input['tahunAjaran_id'][$key];
        //     $detailorder->semester              = $input['semester'][$key];
        //     $detailorder->kelas_id              = $input['kelas_id'][$key];
        //     $detailorder->mapel_id              = $input['mapel_id'][$key];
        //     $detailorder->kkm_id                = $input['kkm_id'][$key];
        //     $detailorder->siswa_id              = $input['siswa_id'][$key];
        //     $detailorder->nilai_tugas           = $input['nilai_tugas'][$key];
        //     $detailorder->nilai_ujian_harian    = $input['nilai_ujian_harian'][$key];
        //     $detailorder->nilai_ujian_semester  = $input['nilai_ujian_semester'][$key];
        //     $detailorder->nilai_akhir           = $input['nilai_akhir'][$key];
        //     $detailorder->keterangan            = $input['keterangan'][$key];
        //     $allOrders[]=$detailorder;

        //     $detailorder->save();
            
        // }
        
        // variabel yang menampung data input request
        $input = Input::all();

        // pengulangan jiak 0 lebih kecil dari jumlah request nilai tugas 
        // maka melakkan pengulangan save data pada nilaiSiswa
        for($n=0; $n < count($request->nilai_tugas); $n++) {

            // membuat object baru untuk tabel nilaiSiswa
            $detailorder = new nilaiSiswa;

            // men set item tabel berdasarkan data request input
            $detailorder->idRef                 = $autoNum;
            $detailorder->tahunAjaran_id        = $input['tahunAjaran_id'][$n];
            $detailorder->semester              = $input['semester'][$n];
            $detailorder->kelas_id              = $input['kelas_id'][$n];
            $detailorder->mapel_id              = $input['mapel_id'][$n];
            $detailorder->kkm_id                = $input['kkm_id'][$n];
            $detailorder->siswa_id              = $input['siswa_id'][$n];
            $detailorder->nilai_tugas           = $input['nilai_tugas'][$n];
            $detailorder->nilai_ujian_harian    = $input['nilai_ujian_harian'][$n];
            $detailorder->nilai_ujian_semester  = $input['nilai_ujian_semester'][$n];
            $detailorder->nilai_akhir           = $input['nilai_akhir'][$n];
            $detailorder->keterangan            = $input['keterangan'][$n];

            // melakukan penyimpanan data yang telah di sesuaikan pada object baru dan item tabel
            $detailorder->save();
        }
        
        // menagalihkan ke url "/nilaiSiswa"
        return redirect('/nilaiSiswa');
    }

    public function showAll()
    {
        // url "http://localhost:8000/daftarNilai" get

        // menampilkan semua data tabel nilaiSiswa
        $nilaiSiswa = nilaiSiswa::orderBy('id', 'DESC')->get();

        // menjalankan file daftar_nilai pada folder nilaiSiswa
        return view('nilaiSiswa.daftar_nilai', compact('nilaiSiswa'));
    }

    public function searchWeb(Request $request){

        // url "/daftarNilai/search-web" ajax input search

        // mendeteksi jika ada request ajax
        if($request->ajax())
        {
            // mencari cara tabel Siswa berdasarkan nama
            $siswa = Siswa::where('nama','LIKE','%'.$request->search."%")->first();
            
            // jika input request search kosong
            if($request->search == ""){
                
                // mencari data tabel nilaiSiswa tetap dengan request kosong
                $nilaiSiswas= nilaiSiswa::where('siswa_id','LIKE','%'.""."%")->get();
                
            // jika input request searct dari ajax berisi data
            }else{

                // mencari data tabel nilaiSiswa berdasarkan siswa_id dari
                $nilaiSiswas= nilaiSiswa::where('siswa_id','LIKE','%'.$siswa->id."%")->get();
            }
            
            // menpung element yang telah ditemukan
            $output="";

            // jika $nilaiSiswa kondisi benar
            if($nilaiSiswas)
            {
                // urutan nomor 
                $no = 1;

                // mengulang data yang ditemukan
                foreach ($nilaiSiswas as $item) {
                    $output.='<tr class="table-web">'.
                        '<td>'.$no++.'</td>'.
                        '<td>'.$item->siswa->nama.'</td>'.
                        '<td>'.$item->kelas->nama_kelas.'</td>'.
                        '<td>'.$item->tahunAjaran->tahun_ajaran.'</td>'.
                        '<td>'.$item->mapel->mata_pelajaran.'</td>'.
                        '<td>'.$item->semester.'</td>'.
                        '<td>'.$item->nilai_tugas.'</td>'.
                        '<td>'.$item->nilai_ujian_harian.'</td>'.
                        '<td>'.$item->nilai_ujian_semester.'</td>'.
                        '<td>'.$item->nilai_akhir.'</td>'.
                        '<td>'.ucwords($item->keterangan).'</td>'.
                    '</tr>';
                }
                
                // mengirim response element ke variabel $output
                return Response($output);
            }
        }
    }


    public function searchAndroid(Request $request){

        // url "/daftarNilai/search" ajax input search

        // mendeteksi jika ada request ajax
        if($request->ajax())
        {
            
            // mencari cara tabel Siswa berdasarkan nama
            $siswa = Siswa::where('nama','LIKE','%'.$request->search."%")->first();
            
            // jika input request search kosong
            if($request->search == ""){

                // mencari data tabel nilaiSiswa tetap dengan request kosong
                $nilaiSiswas= nilaiSiswa::where('siswa_id','LIKE','%'.""."%")->get();
                
            // jika input request searct dari ajax berisi data
            }else{

                // mencari data tabel nilaiSiswa berdasarkan siswa_id dari
                $nilaiSiswas= nilaiSiswa::where('siswa_id','LIKE','%'.$siswa->id."%")->get();
            }
            
            // menpung element yang telah ditemukan
            $output="";

            // jika $nilaiSiswa kondisi benar
            if($nilaiSiswas)
            {
                
                // urutan nomor
                $no=1;

                // mengulang data yang ditemukan
                foreach ($nilaiSiswas as $item){
                    $output.=
                            '<tr>'.
                                '<th>No</th>'.
                                '<th>'.$no++.'</th>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Nama Siswa</th>'.
                                '<td>'.$item->siswa->nama.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Kelas</th>'.
                                '<td>'.$item->kelas->nama_kelas.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Tahun Ajaran</th>'.
                                '<td>'.$item->tahunAjaran->tahun_ajaran.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Mata Pelajaran</th>'.
                                '<td>'.$item->mapel->mata_pelajaran.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Semester</th>'.
                                '<td>'.$item->semester.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Tugas</th>'.
                                '<td>'.$item->nilai_tugas.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Ujian Harian</th>'.
                                '<td>'.$item->nilai_ujian_harian.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Ujian Semester</th>'.
                                '<td>'.$item->nilai_ujian_semester.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Akhir</th>'.
                                '<td>'.$item->nilai_akhir.'</td>'.
                            '</tr>'.

                            ' <tr>'.
                                '<th>Keterangan</th>'.
                                '<td>'.ucwords($item->keterangan).'</td>'.
                            '</tr>'.
                            ' <tr>'.
                                '<th colspan="2" class="text-center">============================</th>'.
                            '</tr>';
                }

                // mengirim response element ke variabel $output
                return Response($output);
            }
        }
    }


    public function edit($idRef, $tahunAjaran_id, $semester, $mapel_id, $kelas_id)
    {
        // mecari data tabel nilaiSiswa berdasarkan idRef dan mengambil hanya datu data
        // fungsi take untuk menentukan berap jumlah data yang ingin di ambil
        // fungsi first tanpa collection
        $nilaiSiswaGet1 = nilaiSiswa::where('idRef', $idRef)->take(1)->first();

        // mencari nilaiSiswa berdasarkan idRef
        // fungsi get menggunakan collection
        $nilaiSiswa = nilaiSiswa::where('idRef', $idRef)->get();

        // menjalankan file edit pada folder nilaiSiswa menjadi view
        return view('nilaiSiswa.edit', compact('nilaiSiswaGet1', 'nilaiSiswa', 'tahunAjaran_id', 'semester', 'mapel_id', 'kelas_id'));
    }

    
    public function update(Request $request)
    {
        // url "http://localhost:8000/nilaiSiswa/9"
        
        // menampung semua rerquest input ke dalam varabel $input
        $input = $request->all();

        // foreach($input['nilai_tugas'] as $key => $value) {
        //     $data           = nilaiSiswa::where('id','=', $input['id'][$key])->first();
        
        //     $tugas          = $input['nilai_tugas'][$key];
        //     $ujian_harian   = $input['nilai_ujian_harian'][$key];
        //     $ujian_semester = $input['nilai_ujian_semester'][$key];
        //     $nilai_akhir    = $input['nilai_akhir'][$key];
        //     $keterangan     = $input['keterangan'][$key];
        
        //     $data->nilai_tugas          = $tugas;
        //     $data->nilai_ujian_harian   = $ujian_harian;
        //     $data->nilai_ujian_semester = $ujian_semester;
        //     $data->nilai_akhir          = $nilai_akhir;
        //     $data->keterangan           = $keterangan;
            
        //     $data->save();
        // }

        // melakukan pengulangan peyimpanan data sampai memenuhi memenuhi jumlah $request->nilai_tugas
        for($no=0; $no < count($request->nilai_tugas); $no++){

            // mencari data nilaiSiswa berdasarkan id
            $data = nilaiSiswa::where('id','=', $input['id'][$no])->first();
            
            // men set item tabel dengan request input
            $data->nilai_tugas          = $input['nilai_tugas'][$no];
            $data->nilai_ujian_harian   = $input['nilai_ujian_harian'][$no];
            $data->nilai_ujian_semester = $input['nilai_ujian_semester'][$no];
            $data->nilai_akhir          = $input['nilai_akhir'][$no];
            $data->keterangan           = $input['keterangan'][$no];
            
            // menyimpan data ke tabel nilaiSiswa yang telah di sesuaikan
            $data->save();
        }

        // menygaikan ke url "/nilaiSiswa"
        return redirect('/nilaiSiswa'); 
    }

    public function destroy($idRef)
    {
        // url "http://localhost:8000/nilaiSiswa/{idRef}"

        // mencari data tabel nilaiSiswa dan melakukan penghapusan data
        nilaiSiswa::where('idRef', $idRef)->delete();

        // mengalihkan ke url  "/nilaiSiswa"
        return redirect('/nilaiSiswa');
    }

    public function nilaiTampil(Request $request){
        // url "http://localhost:8000/nilaiTampil" post hak akses siswa
        
        // menampilkan semau data tabel tahunAjaran
        // select option Tahun Ajaran
        $tahunAjaran = tahunAjaran::all();

        // membaut array yang menampung request input tahunArajan_id dan sesemster
        $find = array(
            INPUT::get('tahunAjaran_id'),
            INPUT::get('semester')
        );

        // mencari data tabel Siswa berdasarkan noRef hak akses yang login
        $siswa = Siswa::where('noRef', auth()->user()->noRef)->first();

        // mencari data tabel Kelas berdasarkan nama_kelas
        $kelas = Kelas::where('nama_kelas', $siswa->kelas_awal)->first();

        // mencari data tabel nilaiSiswa berdasarkan tahunAjaran_id, semester, kelas_id, siswa_id
        $nilaiSiswa = nilaiSiswa::where([
            ['tahunAjaran_id', '=', $request->tahunAjaran_id],
            ['semester', '=', $request->semester],
            ['kelas_id', '=', $kelas->id],
            ['siswa_id', '=', $siswa->id]
        ])->get();  
        
        // menjalankan file daftar_nilai pada folder nilaiSiswa
        return view('nilaiSiswa.daftar_nilai', compact('tahunAjaran', 'find', 'nilaiSiswa'));
    }
}
