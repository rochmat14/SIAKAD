@extends('layouts.app')
@section('content')
    <h2>Data Tahun Ajaran</h2>
    
    <table class="table table-bordered table-tahun-ajaran-web">
        <thead>
            <tr>
                <td>No</td>
                <td>Tahun Ajaran</td>
                <td>
                    <form method="POST" action="/tahunAjaran/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span> Tambah Tahun Ajaran
                        </button>
                    </form>
                </td>
            </tr>
        </thead>
    
        <?php $no = 1; ?>
        @foreach ($tahunAjaran as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->tahun_ajaran }} </td>
                <td>
                    <form method="POST" action="/tahunAjaran/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning col-md-5 fl">
                            <span class="fa fa-edit"></span> Ubah
                        </button>
                    </form>
                    
                    <form method="POST" action="/tahunAjaran/{{ $item->id }}">
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
    @foreach ($tahunAjaran as $item)
        <table class="table table-bordered table-tahun-ajaran-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Tahun Ajaran</th>
                <td>{{ $item->tahun_ajaran }}</td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/tahunAjaran/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </th>
                <td>
                    <form method="POST" action="/tahunAjaran/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning float-left mr-3">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>
                    
                    <form method="POST" action="/tahunAjaran/{{ $item->id }}">
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
