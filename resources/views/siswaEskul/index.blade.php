@extends('layouts.app')
@section('content')
    <h2>Data Siswa Yang Mengambil Ekstrakulikuler</h2>

    <table class="table table-bordered table-siswa-eskul-web">
        <thead class="bg-bl">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Ekstrakulikuler Pilihan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($siswa as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @if($item->ekstrakulikuler->count() == 0)
                            Belum Mengambil Ekstrakulikuler
                        @endif

                        @foreach($item->ekstrakulikuler as $eskul)
                            {{ $eskul->ekstrakulikuler }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ url('/siswaEskul/'.$item->id.'/edit') }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Kelola
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <?php $no = 1; ?>
    @foreach ($siswa as $item)
        <table class="table table-bordered table-siswa-eskul-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Nama Siswa</th>
                <td>{{ $item->nama }}</td>
            </tr>

            <tr>
                <th>Ekstrakulikuler <br> Pilihan</th>
                <td>
                    @if($item->ekstrakulikuler->count() == 0)
                        Belum Mengambil Ekstrakulikuler
                    @endif

                    @foreach($item->ekstrakulikuler as $eskul)
                        {{ $eskul->ekstrakulikuler }}
                    @endforeach
                </td>
            </tr>

            <tr>
                <th colspan="2">
                    <a href="{{ url('/siswaEskul/'.$item->id.'/edit') }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Kelola
                    </a>
                </th>
            </tr>
        </table>
    @endforeach
@endsection