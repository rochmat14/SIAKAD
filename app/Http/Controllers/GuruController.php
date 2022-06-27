<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class GuruController extends Controller
{

    public function index()
    {
        // url "http://localhost:8000/guru"
        
        //menampilkan semua data pada tabel Guru
        $guru = Guru::orderBy('id', 'DESC')->get();

        // menjalankan file index guru menjadi view
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        // url "http://localhost:8000/guru/create"

        // menjalankan file create guru menjadi view
        return view('guru.create');
    }

    public function store(Request $request)
    {
        //url "http://localhost:8000/guru" POST

        // ===============================================
        // auto number

        // memanggil fungsi noRef pada model Guru 
        $id1 = Guru::noRef();

        // menghitung jumlah data pada tabel guru
        $count = Guru::count();

        // membuat collection pada varibel $id1
        foreach($id1 as $value);

        // jika kondisi jumlah data guru 0 (nol)
        if($count == 0){

            // $count berisi nilai 0 (nol) + 1 = 1 dan dibungkus pada variabel "$idPlus"
            $idPlus = $count + 1;

            // string "GR-" digabungkan dengan 1 (angka satu) yang menjadi "GR-1"
            // dan ini sudah menjadi auto number
            $autoNumber = "GR-".$idPlus;

        // jika jumlah $count table Guru diluar sama dengan 0 atau tidak 0
        }else{

            // mengambil noRef dari collection "$id1" 
            // mengambil data terakhir pada tabel Guru yang dibungkus pada variabel "$id1"
            $id2 = $value->noRef;

            // fungsi substr() mengambil urutan string
            // contoh string "GR-1" menggunakan substr($id2, 3) maka yang akan terambil angka 1 setelah -. karena urutan dihitung dari angka 0
            $subStr = substr($id2, 3);

            // $subStr yang berisi angka terakhir cintoh 1 maka 1 + 1
            $tambahNo = $subStr + 1;

            // menyatukan string "GR-" dengan variabel "$tambahNo" contoh jika bernilai angka 4, maka menjadi "GR-4" 
            // dan ini sudah menjadi auto number
            $autoNumber = 'GR-'.$tambahNo;
        }
        // ===============================================
        
        // array request input bagian user
        $user = array(  'noRef'           => $autoNumber,
                        'name'            => Input::get('nama'),
                        'username'        => Input::get('username'),
                        'password'        => bcrypt(Input::get('password')),
                        'remember_token'  => str_random(10),
                        'role'            => "guru"
        );

        // array request input bagian guru
        $guru = array(  'noRef'         => $autoNumber,
                        'nip'           => Input::get('nip'),
                        'nama'          => Input::get('nama'),
                        'jenis_kelamin' => Input::get('jenis_kelamin'),
                        'alamat'        => Input::get('alamat')
        );

        // menambah data array variabel $user pada tabel User
        User::create($user);

        // menambah data array variabel $guru pada tabel Guru
        Guru::create($guru);

        // mengalihkan pada url "/guru"
        return redirect('/guru');
    }

    public function show($id)
    {
        // url "http://localhost:8000/guru/{id}" GET

        // mencari data Guru bedasarkan id
        $guru = Guru::find($id);

        // mencari data Jadwal berdasarkan guru_id
        $jadwal = Jadwal::where('guru_id', $id)->orderBy('id', 'DESC')->get();

        // menjalankan file show pada folder guru menjadi view
        return view('guru.show', compact('guru', 'jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($noRef)
    {
        // url "http://localhost:8000/guru/{$noRef}/edit"

        // mencari data User berdasarkan noRef
        $u = User::where('noRef', $noRef)->get();

        // membuat collection data user yang di bungkus variabel $u
        foreach($u as $user); //jika pada bagian akhir sintax menggunakan helper get() maka harus menggunakan pengulangan foreach

        // mencari data Guru berdasarkan noRef
        $g = Guru::where('noRef', $noRef)->get(); //jika ingin menampilkan berdasarkan diluar id menggunakan where

        // membuat collection Guru yang di bungkus variabel $g
        foreach($g as $guru); //jik pada bagian akhir sintax menggunakan helper get() maka harus menggunakan pengulangan foreach

        // menjalankan file edit pada folder guru menjadi view
        return view('guru.edit', compact('user', 'guru'));
    }

    public function update(Request $request, $noRef)
    {
        // url "http://localhost:8000/guru/update/$noRef"

        // jika request input password tidak kosong
        if(!empty($request->password)) {
            
            // array request input data user 
            // pada item password mengambil input password yang akan di ubah. dan di enkripsi menggunakan fungsi Hash
            $user = array(
                'name'     => Input::get('nama'),
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password')),
            );
            
            // array request input data guru
            $guru = array(
                'nip'           => Input::get('nip'),
                'nama'          => Input::get('nama'),
                'jenis_kelamin' => Input::get('jenis_kelamin'),
                'alamat'        => Input::get('alamat')
            );
    
            // mencari data User berdasarkan noRef lalu melakukan updata data dari hasil request input baru pada variabel $user
            User::where('noRef', $noRef)->update($user);
    
            // mencari data Guru berdasarkan noRef lalu melakukan updata data dari hasil request input baru pada variabel $guru
            Guru::where('noRef', $noRef)->update($guru);
    
            // jika dalam kondisi login user dan hak akses role guru
            // jika yang login guru
            if(auth()->user()->role == 'guru'){

                // mengalihkan pada url 'guru/'.$noRef.'/edit';
                return redirect('guru/'.$noRef.'/edit');
            }
            
            // jika yang login bukan admin
            // mengalihkan pada url "guru"
            return redirect('/guru');

        // jika password tidak di ubah atau kosong
        }else{

            // array request input data user 
            // pada item password mengambil input password_value yang berarti tidak ada perubahan password oleh guru.
            $user = array(
                'name'     => Input::get('nama'),
                'username' => Input::get('username'),
                'password' => Input::get('password_value'),
            );
            
            // array request input data guru 
            $guru = array(
                'nip'           => Input::get('nip'),
                'nama'          => Input::get('nama'),
                'jenis_kelamin' => Input::get('jenis_kelamin'),
                'alamat'        => Input::get('alamat')
            );
    
            // mencari data User berdasarkan noRef lalu melakukan update data dari hasil request input baru pada variabel $user
            User::where('noRef', $noRef)->update($user);
    
            // mencari data Guru berdasarkan noRef lalu melakukan update data dari hasil request input baru pada variabel $guru
            Guru::where('noRef', $noRef)->update($guru);
    
            // jika yang login guru
            if(auth()->user()->role == 'guru'){

                // mengalihkan pada url "/guru/'.$noRef.'/edit"
                return redirect('/guru/'.$noRef.'/edit');
            }
            
            // jika yang login admin
            // mengalihkan pada url "/guru"
            return redirect('/guru');
        }
    }

    public function destroy($noRef)
    {
        //url "http://localhost:8000/guru/{noRef}" DELETE

        // mencari data User berdasarkan noRef lalu menghapus
        User::where('noRef', $noRef)->delete();

        // mencari data Guru berdasarkan noRef lalu menghapus
        Guru::where('noRef', $noRef)->delete();
        
        // mengalihkan pada url "/guru"
        return redirect('/guru');
    }
}
