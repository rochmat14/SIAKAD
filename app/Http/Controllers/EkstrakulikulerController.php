<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan sema data table Ekstrakulikuler
        $eskul = Ekstrakulikuler::orderBy('id', 'DESC')->get();

        // menjalankan file index extrekulikuler menjadi view
        return view('ekstrakulikuler.index', compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // url "http://localhost:8000/eskul/create"

        // menjalankan file create ekstrakulikuler menjadi view
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        // url "http://localhost:8000/eskul" POST;
        
        // menambah data baru pada tabel Ekstrakulikuler
        $ekstrakulikuler = new Ekstrakulikuler;

        // mendapatkan request dari input ekstrakulikuer dan di kirim pada item ekstrakulikuler tabel Ekstrakulikuler
        $ekstrakulikuler->ekstrakulikuler = $request->ekstrakulikuler;

        // menyimpan data ekstrakulikuler yang telah disesuaikan
        $ekstrakulikuler->save();
        
        // mengalihkan pada halaman "/eskul"
        return redirect('/eskul');
    }

    public function edit($id)
    {
        // url "http://localhost:8000/{id}/3/edit"

        // mencari data Ekstrakulikuler berdasarkan id
        $eskul = Ekstrakulikuler::find($id);

        // menjalankan file edit ekstrakulikuler menjadi view`
        return view('ekstrakulikuler.edit', compact('eskul'));
    }

    public function update(Request $request, $id)
    {
        // url "http://localhost:8000/eskul/{id}" PUT

        //mencari data Ektrakulikuler berdasarkan id
        $eskul = Ekstrakulikuler::find($id);

        // mengirim request input pada item tabel Ekstrakulikuler
        $eskul->ekstrakulikuler = $request->ekstrakulikuler;

        // memperbaruhi data yang telah ditemukan dan di sesuaikan dengan item tabel Ekstrakulikuler
        $eskul->update();

        // mengalihkan pada url "/eskul";
        return redirect('/eskul');
    }

    public function destroy($id)
    {
        //url "http://localhost:8000/eskul/{id}"

        // menemukan data ekstrakulikuler berdasarkan id dan melakukan penghapusan data yang telah ditemukan
        Ekstrakulikuler::find($id)->delete();

        // mengalihkan pengalihan url pada "/eskul"
        return redirect('/eskul');
    }
}
