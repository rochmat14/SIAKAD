@extends('layouts.app')
@section('content')
    <h2>Data Siswa</h2>
    
    <table class="table table-bordered table-siswa-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <td>
                    <form method="POST" action="/siswa/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-plus"></span> Tambah Siswa
                        </button>
                    </form>
                </td>
            </tr>
        </thead>
    
        <?php $no = 1; ?>
        @foreach ($siswa as $item)
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->nis }} </td>
                <td> {{ ucwords($item->nama) }} </td>
                <td> {{ $item->jenis_kelamin }} </td>
                <td> {{ strtoupper($item->kelas_awal) }} </td>
                <td> {{ strtoupper($item->alamat) }} </td>
                <td>
                    <form method="POST" action="/siswa/{{ $item->noRef }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning col-md-5 fl">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>
                    
                    <form method="POST" action="/siswa/{{ $item->noRef }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger col-md-5 fr">
                            <span class="fa fa-trash"></span>
                        </button>
                    </form>     
                </td>
            </tr>
        @endforeach
    </table>

    <?php $no = 1; ?>
    @foreach ($siswa as $item)
        <table class="table table-bordered table-siswa-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Nis</th>
                <td>{{ $item->nis }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ ucwords($item->nama) }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $item->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Kelas Awal</th>
                <td> {{ strtoupper($item->kelas_awal) }} </td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td> {{ strtoupper($item->alamat) }} </td>
            </tr>

            <tr>
                <td>
                    <form method="POST" action="/siswa/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="/siswa/{{ $item->noRef }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning fl mr-3">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>
                    
                    <form method="POST" action="/siswa/{{ $item->noRef }}">
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
