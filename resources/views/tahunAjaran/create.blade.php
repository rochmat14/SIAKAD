@extends('layouts.app')
@section('content')
    <form method="POST" action="/tahunAjaran" id="form_tahun_ajaran">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Tambah Tahun Ajaran</span>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control tahun_ajaran_input">
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
                        <a href="{{ url('tahunAjaran') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection