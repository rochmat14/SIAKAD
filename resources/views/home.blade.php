@extends('layouts.app')
@section('content')
    <div class="grid-home">
        <div class="box card satu">
            <div class="card-body">
                <h3 class="text-center font-weight-bold">Jumlah Guru</h3>
    
                <br>
                
                <h4 class="text-center font-weight-bold">Total {{ $guru->count() }} Guru<h4>
            </div>
        </div>

        <div class="box card dua">
            <div class="card-body">
                <h3 class="text-center font-weight-bold">Jumlah Siswa</h3>
    
                <br>
                
                <h4 class="text-center font-weight-bold">Total {{ $siswa->count() }} Siswa</h4>
            </div>
        </div>

        <div class="box card tiga">
            <div class="card-body">
                <h3 class="text-center font-weight-bold">Jumlah Kelas</h3>
    
                <br>
                
                <h4 class="text-center font-weight-bold">Total {{ $kelas->count() }} Ruangan</h4>
            </div>
        </div>
    </div>
@endsection         
