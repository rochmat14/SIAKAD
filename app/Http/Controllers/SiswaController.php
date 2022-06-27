<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SiswaController extends Controller
{
    public function index()
    {
        // url "http://localhost:8000/siswa" get

        // menampilkan semua data tabel Siswa
        $siswa = Siswa::orderBy('id', 'DESC')->get();

        // menjalankan file index pada folder siswa menjadi view
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        // url "http://localhost:8000/siswa/create" get

        // menampilkan semuda data tabel kelas dengan item id dan nama_kelas
        $kelas = Kelas::select('id', 'nama_kelas')->get();

        // menjalankan file create pada folder siswa menjadi view
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/siswa" post

        // =================================================
        // memanggil fungsi noRef pada model Siswa yang berisi data urutan terakhir
        $siswa    = Siswa::noRef();

        // mengitugn jumlah data pada tabel Siswa
        $count  = Siswa::count();

        // jika jumlah data tabel Siswa 0
        if($count == 0){
            // jumlah data tabel siswa + 1
            $recordPlus = $count + 1;

            // menggabungkan string SW- dengan jumlah data tabel siswa +1
            // jadi seperti SW-1
            $autoNumber = "SW-".$recordPlus;

        // jika data tabel Siswa tidak tidak kosong
        }else{

            // mengambil value noRef tabel Siswa
            $noRef = $siswa->noRef;
            
            // mengambil karakter pada string berdasarkan urutan karakter pada string
            // jika string SW-4 maka menggunakan substr($noRef, 3) hasilnya 4
            $subStr = substr($noRef, 3);

            // variabel subStr yang bernilai angka di ditambah 1
            // contoh jika 4 + 1
            $tambahNo = $subStr + 1;

            // menggabungkan string SW- dengan $tambahNo yang bernilai angka
            // contoh jadi SW-5
            $autoNumber = 'SW-'.$tambahNo;
        }
        // =================================================
        
        // array request input value untuk dikirim pada tabel User
        $user = array(  'noRef'          => $autoNumber,
                        'name'           => Input::get('nama'),
                        'username'       => Input::get('username'),
                        'password'       => bcrypt(Input::get('password')),
                        'remember_token' => str_random(10),
                        'role'           => "siswa"
        );

        // array request input value untuk dikirim pada tabel Siswa
        $siswa = array( 'noRef'             => $autoNumber,
                        'nis'               => Input::get('nis'),
                        'nisn'              => Input::get('nisn'),
                        'nama'              => Input::get('nama'),
                        'tempat_lahir'      => Input::get('tempat_lahir'),
                        'tanggal_lahir'     => Input::get('tanggal_lahir'),
                        'jenis_kelamin'     => Input::get('jenis_kelamin'),
                        'agama'             => Input::get('agama'),
                        'anak_ke'           => Input::get('anak_ke'),
                        'alamat'            => Input::get('alamat'),
                        'no_telepon'        => Input::get('no_telepon'),
                        'asal_sekolah'      => Input::get('asal_sekolah'),
                        'kelas_awal'        => Input::get('kelas_awal'),
                        'tanggal_diterima'  => Input::get('tanggal_diterima'),
                        'nama_ayah'         => Input::get('nama_ayah'),
                        'nama_ibu'          => Input::get('nama_ibu'),
                        'alamat_ortu'       => Input::get('alamat_ortu'),
                        'telepon_ortu'      => Input::get('telepon_ortu'),
                        'pekerjaan_ayah'    => Input::get('pekerjaan_ayah'),
                        'pekerjaan_ibu'     => Input::get('pekerjaan_ibu')
        );

        // insert request $user pada tabel User
        User::create($user);

        // insert request $siswa pada tabel Siswa
        Siswa::create($siswa);

        // mengalihkan pada url "/siswa"
        return redirect('/siswa');
    }

    public function edit($noRef)
    {
        // url "http://localhost:8000/siswa/idRef/edit" get

        // mencari data tabel User berdasarkan noRef
        $user = User::where('noRef', $noRef)->first();

        // mencari data tabel Siswa berdasarkan noRef
        $siswa = Siswa::where('noRef', $noRef)->first(); //jika ingin menampilkan berdasarkan diluar id

        // untuk select option kelas awal
        $kelas = Kelas::all();
        
        // menjalankan file edit pada folder siswa menjadi view
        return view('siswa.edit', compact('user', 'siswa', 'kelas'));
    }

    public function update(Request $request, $noRef)
    {
        // url "http://localhost:8000/siswa/SW-5" put
        
        // jika request input password berisi password baru
        if(!empty($request->password)) {

            // maka melakukan enkripsi pada password baru
            $password = bcrypt(Input::get('password'));

        // jika password tidak di ubah 
        } else {
            
            // maka mengambil request yang sudah bersisi enkripsi password lama
            $password = Input::get('password_value');
        }


        // variabel yang yang memapung 
        // array input request data untuk ke tabel user
        $user = array(  'name'     => Input::get('nama'),
                        'username' => Input::get('username'),
                        'password' => $password,
        );

        // variabel yang yang memapung 
        // array input request data untuk ke tabel siswa
        $siswa = array( 'nis'               => Input::get('nis'),
                        'nisn'              => Input::get('nisn'),
                        'nama'              => Input::get('nama'),
                        'tempat_lahir'      => Input::get('tempat_lahir'),
                        'tanggal_lahir'     => Input::get('tanggal_lahir'),
                        'jenis_kelamin'     => Input::get('jenis_kelamin'),
                        'agama'             => Input::get('agama'),
                        'anak_ke'           => Input::get('anak_ke'),
                        'alamat'            => Input::get('alamat'),
                        'no_telepon'        => Input::get('no_telepon'),
                        'asal_sekolah'      => Input::get('asal_sekolah'),
                        'kelas_awal'        => Input::get('kelas_awal'),
                        'tanggal_diterima'  => Input::get('tanggal_diterima'),
                        'nama_ayah'         => Input::get('nama_ayah'),
                        'nama_ibu'          => Input::get('nama_ibu'),
                        'alamat_ortu'       => Input::get('alamat_ortu'),
                        'telepon_ortu'      => Input::get('telepon_ortu'),
                        'pekerjaan_ayah'    => Input::get('pekerjaan_ayah'),
                        'pekerjaan_ibu'     => Input::get('pekerjaan_ibu')
        );

        // mencari data tabel User berdasarkan noRef 
        // lalu mengupdate data sesuai array input request pada variabel $user
        User::where('noRef', $noRef)->update($user);

        // mencari data tabel Siswa berdasarkan noRef 
        // lalu mengupdate data sesuai array input request pada variabel $siswa
        Siswa::where('noRef', $noRef)->update($siswa);

        // jika role yang login siswa
        if(auth()->user()->role == 'siswa'){

            // mengalihkan url pada "{/noRef/edit}"
            return redirect('/siswa/'.auth()->user()->noRef.'/edit');
        }

        // mengalihkan halaman pada "/siswa"
        return redirect('/siswa');
    }

    public function destroy($noRef)
    {
        // url "http://localhost:8000/siswa/{noRef}" delete

        // mencari data tabel User berdasarkan noRef
        // lalu melakukan penghapusan data
        User::where('noRef', $noRef)->delete();

        // melakukan pencarian data tabel Siswa berdasarkan idRef 
        // lalu melakukan penghapusan data
        Siswa::where('noRef', $noRef)->delete();
        
        // mengalihkan url pada "/siswa"
        return redirect('/siswa');
    }
}
