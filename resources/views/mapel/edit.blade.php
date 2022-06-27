@extends('layouts.app')
@section('content')
    <form method="POST" action="/mapel/{{ $mapel->id }}" id="form-mata-pelajaran">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Mata Pelajaran</span>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" value="{{ $mapel->mata_pelajaran }}" class="form-control mata-pelajaran-input">
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
                        <a href="{{ url('mapel') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection