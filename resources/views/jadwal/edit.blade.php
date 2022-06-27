@extends('layouts.app')
@section('content')
    <form method="POST" action="/jadwal/{{ $jadwal->id }}" id="form-jadwal">
        <div class="card card-custom mb-5">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Jadwal</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" id="" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $item)
                                    <option value="{{ $item->id }}" @if( $jadwal->tahunAjaran_id == $item->id ){{ 'selected' }} @endif>{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester" id="" class="form-control semester-input">
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil" 
                                    @if( $jadwal->semester == "Ganjil" )
                                        {{ 'selected' }} 
                                    @endif>
                                        Ganjil
                                </option>
                                <option value="Genap"  
                                    @if( $jadwal->semester == "Genap" )
                                        {{ 'selected' }} 
                                    @endif>
                                        Genap
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <select name="nama_kelas" id="" class="form-control nama-kelas-input">
                                <option value="">Pilih Nama Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->nama_kelas }}" @if( $jadwal->nama_kelas == $item->nama_kelas ){{ 'selected' }} @endif>{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ ($errors->has('nama_kelas')) ? $errors->first('nama_kelas'):'' }}</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mata_pelajaran" id="" class="form-control mata-pelajaran-input">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}" @if( $jadwal->mapel_id == $item->id ){{ 'selected' }} @endif>{{ $item->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ ($errors->has('mata_pelajaran')) ? $errors->first('mata_pelajaran'):'' }}</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select name="hari" id="" class="form-control hari-input">
                                <option value="">Pilih Hari</option>
                                <option value="Senin"  @if( $jadwal->hari == "Senin" ){{ 'selected' }} @endif>Senin</option>
                                <option value="Selasa" @if( $jadwal->hari == "Selasa" ){{ 'selected' }} @endif>Selasa</option>
                                <option value="Rabu"   @if( $jadwal->hari == "Rabu" ){{ 'selected' }} @endif>Rabu</option>
                                <option value="Kamis"  @if( $jadwal->hari == "Kamis" ){{ 'selected' }} @endif>Kamis</option>
                                <option value="Jum'at" @if( $jadwal->hari == "Jum'at" ){{ 'selected' }} @endif>Jum'at</option>
                                <option value="Sabtu"  @if( $jadwal->hari == "Sabtu" ){{ 'selected' }} @endif>Sabtu</option>
                            </select>
                            <span class="text-danger">{{ ($errors->has('hari')) ? $errors->first('hari'):'' }}</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Waktu</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="text-primary">Mulai</label>
                                    <input type="time" name="waktu_mulai" class="form-control waktu-mulai-input" value="{{ $jadwal->waktu_mulai }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="text-primary">Selesai</label>
                                    <input type="time" name="waktu_selesai" class="form-control waktu-selesai-input" value="{{ $jadwal->waktu_selesai }}">
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
                                    <option value="{{ $item->id }}" @if( $jadwal->guru_id == $item->id ){{ 'selected' }} @endif>{{ $item->nama }}</option>
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
                        <input type="hidden" name="_method" value="PUT">
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