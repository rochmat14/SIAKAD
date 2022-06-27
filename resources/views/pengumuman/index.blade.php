@extends('layouts.app')
@section('content')
    <h2>Data Pengumuman</h2>
    
    <table class="table table-bordered table-pengumuman-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                @if(auth()->user()->role == 'admin')
                    <th>
                        <form method="POST" action="/pengumuman/create">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-primary col-md-12">
                                <span class="fa fa-plus"></span> Tambah Pengumuman
                            </button>
                        </form>
                    </th>
                @endif
            </tr>
        </thead>
    
        <?php $no = 1; ?>
        @foreach ($pengumuman as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ ucwords($item->judul) }} </td>
                <td> {{date('d F Y', strtotime( $item->tanggal ))}} </td>
                @if(auth()->user()->role == 'admin')
                    <td>
                        <form method="POST" action="/pengumuman/{{ $item->id }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-warning col-md-5 fl">
                                <span class="fa fa-edit"></span> Ubah
                            </button>
                        </form>

                        <form method="POST" action="/pengumuman/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger col-md-5 fr">
                                <span class="fa fa-trash"></span> Hapus
                            </button>
                        </form>          
                    </td>
                @endif
            </tr>
        </tbody>
        @endforeach
    </table>

    <form method="POST" action="/pengumuman/create" class="table-android mb-3">
        <input type="hidden" name="_method" value="GET">
        <button type="submit" class="btn btn-primary col-md-12">
            <span class="fa fa-plus"></span>
        </button>
    </form>

    <?php $no = 1; ?>
    @foreach ($pengumuman as $item)
        <table class="table table-bordered table-pengumuman-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Judul</th>
                <td>{{ $item->judul }}</td>
            </tr>

            <tr>
                <th>Tanggal</th>
                <td>{{date('d F Y', strtotime( $item->tanggal ))}}</td>
            </tr>

            @if(auth()->user()->role == 'admin')
                <tr>
                    <th>
                        
                    </th>
                    <td>
                        <form method="POST" action="/pengumuman/{{ $item->id }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-warning fl mr-3">
                                <span class="fa fa-edit"></span>
                            </button>
                        </form>

                        <form method="POST" action="/pengumuman/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </button>
                        </form>          
                    </td>
                </tr>
            @endif
        </table>
    @endforeach
@endsection
