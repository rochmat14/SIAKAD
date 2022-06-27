@extends('layouts.app')
@section('content')
    <form method="POST" action="/pengumuman" id="form-pengumuman">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Tambah Data Pengumuman</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Pengumuman</label>
                            <input type="text" name="judul" class="form-control pengumuman-input">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control tanggal-input">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" name="submit" value="" class="btn btn-success btn-block mb-2">
                            <span class="fa fa-save"></span> Simpan
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ url('pengumuman') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection