@extends('layouts.app')
@section('content')
    <h2>Data Kelas</h2>
    
    <table class="table table-bordered table table-kelas-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <td>
                    <form method="POST" action="/kelas/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span> Tambah Kelas
                        </button>
                    </form>
                </td>
            </tr>
        </thead>
    
        <?php $no = 1; ?>
        @foreach ($kelas as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->tahunAjaran->tahun_ajaran }} </td>
                <td> {{ strtoupper($item->nama_kelas) }} </td>
                <td> {{ ucwords($item->guru->nama) }} </td>
                <td>
                    <form method="POST" action="/kelas/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning col-md-5 fl">
                            <span class="fa fa-edit"></span> Ubah
                        </button>
                    </form>
                    
                    <form method="POST" action="/kelas/{{ $item->id }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger col-md-5 fr">
                            <span class="fa fa-trash"></span> Hapus
                        </button>
                    </form>               
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <?php $no = 1; ?>
    @foreach ($kelas as $item)
    <table class="table table-bordered table-kelas-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Tahun Ajaran</th>
                <td>{{ $item->tahunAjaran->tahun_ajaran }}</td>
            </tr>

            <tr>
                <th>Nama Kelas</th>
                <td> {{ strtoupper($item->nama_kelas) }} </td>
            </tr>

            <tr>
                <th>Wali Kelas</th>
                <td> {{ ucwords($item->guru->nama) }} </td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/kelas/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </th>
                <td>
                    <form method="POST" action="/kelas/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning fl mr-3">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>
                    
                    <form method="POST" action="/kelas/{{ $item->id }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">
                            <span class="fa fa-trash"></span>
                        </button>
                    </form>               
                </td>
            </tr>
        </table>
        @endforeach
@endsection
