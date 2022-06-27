@extends('layouts.app')
@section('content')
    <h2>Data Ekstrakulikuler</h2>
    
    <table class="table table-bordered table-ekstrakulikuler-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ekstrakulikuler</th>
                <th>
                    <form method="POST" action="/eskul/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-12">
                            <span class="fa fa-plus"></span> Tambah Pengumuman
                        </button>
                    </form>
                </th>
            </tr>
        </thead>
    
        <?php $no = 1; ?>
        @foreach ($eskul as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->ekstrakulikuler }} </td>
                <td>
                    <form method="POST" action="/eskul/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning col-md-5 fl">
                            <span class="fa fa-edit"></span> Ubah
                        </button>
                    </form>
                                
                    <form method="POST" action="/eskul/{{ $item->id }}">
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
    @foreach ($eskul as $item)
        <table class="table table-bordered table-ekstrakulikuler-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Nama <br> Ekstrakulikuler</th>
                <td>{{ $item->ekstrakulikuler }}</td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/eskul/create">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary col-12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </form>
                </th>
                <td>
                    <form method="POST" action="/eskul/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-warning fl mr-3">
                            <span class="fa fa-edit"></span>
                        </button>
                    </form>
                                
                    <form method="POST" action="/eskul/{{ $item->id }}">
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
