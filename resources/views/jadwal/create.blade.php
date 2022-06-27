@extends('layouts.app')
@section('content')
    <form method="POST" action="/jadwal" id="form-jadwal">
        <div class="card card-custom mb-5">
            <div class="card-header">
                <span class="font-weight-bold">Tambah Data Jadwal</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" id="" class="form-control tahun-ajaran-input">
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
                            <label for="">Nama Kelas</label>
                            <select name="nama_kelas" id="" class="form-control nama-kelas-input">
                                <option value="">Pilih Nama Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mata_pelajaran" id="" class="form-control mata-pelajaran-input">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}">{{ $item->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select name="hari" id="" class="form-control hari-input">
                                <option value="">Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Waktu</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" class="text-primary">Mulai</label>
                                    <input type="time" name="waktu_mulai" class="form-control waktu-mulai-input">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="text-primary">Selesai</label>
                                    <input type="time" name="waktu_selesai" class="form-control waktu-selesai-input">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Guru</label>
                            <select name="guru" id="" class="form-control guru-input">
                                <option value="">Pilih Guru</option>
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                        <button type="submit" class="btn btn-success btn-block mb-2">
                            <span class="fa fa-save"></span> Simpan
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ url('jadwal') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection