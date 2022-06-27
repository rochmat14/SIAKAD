@extends('layouts.app')
@section('content')
    <h2>Data Admin</h2>

    <table class="table table-bordered table-web">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $item)
                <tr>
                    <td>{{ $item->name }}</td> 
                    <td>{{ $item->username }}</td> 
                    <td>

                        <form method="POST" action="/admin/{{ $item->id }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-warning col-sm-5 float-left">
                                <span class="fa fa-edit"> Ubah</span> 
                            </button>
                        </form>

                        <form method="POST" action="/admin/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <button class="btn btn-danger col-sm-5 float-right">
                                <span class="fa fa-trash"> Hapus</span> 
                            </button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tampilan Mobile --}}
    <?php $no = 1; ?>
    @foreach ($admin as $item)
        <table class="table table-bordered table-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Nama</th>
                <td>{{ $item->name }}</td>
            </tr>

            <tr>
                <th>Username</th>
                <td>{{ $item->username }}</td>
            </tr>

            <tr>
                <th>
                    <form method="POST" action="/admin/{{ $item->id }}/edit">
                        <input type="hidden" name="_method" value="GET">
                        <button class="btn btn-warning col-sm-5 float-left">
                            <span class="fa fa-edit"> Ubah</span> 
                        </button>
                    </form>
                </th>

                <th>
                    <form method="POST" action="/admin/{{ $item->id }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <button class="btn btn-danger col-sm-5 float-right">
                            <span class="fa fa-trash"> Hapus</span> 
                        </button>
                    </form>
                </th>
            </tr>
        </table>
    @endforeach
@endsection