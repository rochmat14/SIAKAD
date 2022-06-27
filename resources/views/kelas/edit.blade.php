@extends('layouts.app')
@section('content')
    <form method="POST" action="/kelas/{{ $kelas->id }}" id="form-kelas">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Kelas</span> 
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" id="" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach($tahunAjaran as $item)
                                    <option value="{{ $item->id }}" @if($kelas->tahunAjaran_id == $item->id){{ 'selected' }} @endif>{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control nama-kelas-input" value="{{ $kelas->nama_kelas }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nama Guru</label>
                            <select name="guru" class="form-control nama-guru-input">
                                <option value="">Pilih Guru</option>
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}" @if($kelas->guru_id == $item->id) {{ 'selected' }} @endif>{{ $item->nama }}</option>
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
                        <a href="{{ url('kelas') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection