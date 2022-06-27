@extends('layouts.app')
@section('content')
    <h3 class="alert alert-success">Data Mengajar Guru: {{ $guru->nama }}</h3>
    
    <table class="table table-bordered table-guru-web">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Semester</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($jadwal as $item)
        <tbody>
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $item->tahunAjaran->tahun_ajaran }} </td>
                <td> {{ $item->semester }} </td>
                <td> {{ $item->mapel->mata_pelajaran }} </td>
                <td> {{ $item->nama_kelas }} </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <?php $no = 1; ?>
    @foreach ($jadwal as $item)
        <table class="table table-bordered table-guru-android">
            <tr>
                <th>No</th>
                <td>{{ $no++ }}</td>
            </tr>
            
            <tr>
                <th>Tahun Ajaran</th>
                <td>{{ $item->tahunAjaran->tahun_ajaran }}</td>
            </tr>

            <tr>
                <th>Semester</th>
                <td>{{ $item->semester }}</td>
            </tr>

            <tr>
                <th>Mata Pelajaran</th>
                <td> {{ $item->mapel->mata_pelajaran }} </td>
            </tr>

            <tr>
                <th>Nama Kelas</th>
                <td> {{ $item->nama_kelas }} </td>
            </tr>
        </table>
    @endforeach

    <a href="{{ url('guru') }}" class="btn btn-danger mb-5">
        <span class="fa fa-window-close"></span> Kembali
    </a> 
@endsection