@extends('layouts.app')
@section('content')
    <h2>Data Guru</h2>
    
    <table class="table table-bordered table table-guru-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Mengajar</th>
                <td>
                    <form method="POST" action="/guru/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span> Tambah Guru
                        </button>
                    </form>
                </td>
            </tr>
        </thead>

        <?php $no = 1; ?>
        @foreach ($guru as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->nip }} </td>
                <td> {{ ucwords($item->nama) }} </td>
                <td> {{ $item->jenis_kelamin }} </td>
                <td> {{ strtoupper($item->alamat) }} </td>
                <td>
                    <form method="POST" action="/guru/{{ $item->id }}">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" name="submit" class="btn btn-success">
                            <span class="fa fa-eye"></span> Mengajar
                        </button>                        
                    </form>
                </td>
                <td>
                    <form method="POST" action="/guru/{{ $item->noRef }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" name="submit" class="btn btn-warning col-md-12 mb-2">
                            <span class="fa fa-edit"></span> Ubah
                        </button> 
                    </form>
        
                    <form method="POST" action="/guru/{{ $item->noRef }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" name="submit" class="btn btn-danger col-md-12">
                            <span class="fa fa-trash"></span> Hapus
                        </button>                         
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <?php $no = 1; ?>
    @foreach ($guru as $item)
        <table class="table table-bordered table-guru-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Nip</th>
                <td>{{ $item->nip }}</td>
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
                <th>Alamat</th>
                <td>{{ strtoupper($item->alamat) }}</td>
            </tr>

            <tr>
                <th>Mengajar</th>
                <td>
                    <form method="POST" action="/guru/{{ $item->id }}">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" name="submit" class="btn btn-success">
                            <span class="fa fa-eye"></span> Mengajar
                        </button>                        
                    </form>
                </td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/guru/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </th>
                <td>
                    <form method="POST" action="/guru/{{ $item->noRef }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" name="submit" class="btn btn-warning fl mr-3">
                            <span class="fa fa-edit"></span>
                        </button> 
                    </form>
        
                    <form method="POST" action="/guru/{{ $item->noRef }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" name="submit" class="btn btn-danger">
                            <span class="fa fa-trash"></span>
                        </button>                         
                    </form>
                </td>
            </tr>
        </table>
    @endforeach
@endsection
