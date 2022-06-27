@extends('layouts.app')
@section('content')
    <h2>Data Mata Pelajaran</h2>
    
    <table class="table table-bordered table-mapel-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>
                    <form method="POST" action="/mapel/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span> Tambah Pengumuman
                        </button>
                    </form>
                </th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        @foreach ($mapel as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ strtoupper($item->mata_pelajaran) }} </td>
                <td>
                    <form method="POST" action="/mapel/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning col-md-5 fl">
                            <span class="fa fa-edit"></span> Ubah
                        </button>
                    </form>

                    <div class="col-md-2"></div>
                    
                    <form method="POST" action="/mapel/{{ $item->id }}">
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
    @foreach ($mapel as $item)
        <table class="table table-bordered table-mapel-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Judul</th>
                <td>{{ strtoupper($item->mata_pelajaran) }}</td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/mapel/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </th>
                <td>
                    <form method="POST" action="/mapel/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning fl mr-3">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>

                    <div class="col-md-2"></div>
                    
                    <form method="POST" action="/mapel/{{ $item->id }}">
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
