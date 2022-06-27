@extends('layouts.app')
@section('content')
    @if(auth()->user()->role == 'guru')
        <form method="POST" action="/nilaiSiswa/create2" id="form-nilai-siswa">
            <div class="card card-custom">
                <div class="card-header">
                    <span class="font-weight-bold">Kelola Nilai Siswa</span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tahun Ajaran</label>
                                <select name="tahunAjaran_id" id="" class="form-control tahun-ajaran-input">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach ($tahunAjaran as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Semester</label>
                                <select name="semester" id="" class="form-control semester-input">
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="mapel_id" id="" class="form-control mata-pelajaran-input">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach ($mapel as $item)
                                        <option value="{{ $item->id }}">{{ $item->mata_pelajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas_id" id="" class="form-control kelas-input">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id. "." .$item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button class="btn btn-warning btn-block mb-2">
                                <span class="fa fa-pen"></span> Kelola Nilai Siswa
                            </button>
                        </div>

                        <div class="col-sm-6">
                            <a href="{{ url('daftarNilai') }}" class="btn btn-success btn-block">
                                <span class="fa fa-eye"></span> Daftar Nilai Siswa
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if(auth()->user()->role == 'siswa')
        <form method="POST" action="/nilaiTampil" id="form-nilai-siswa">
            <div class="card card-custom">
                <div class="card-header">
                    <span class="font-weight-bold">Daftar Nilai Siswa</span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select name="tahunAjaran_id" class="form-control tahun-ajaran-input">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach($tahunAjaran as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control semester-input">
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            @csrf
                            <input type="hidden" name="_method" value="post">
                            <button class="btn btn-warning">
                                <i class="fa fa-eye"></i> Tampilkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
