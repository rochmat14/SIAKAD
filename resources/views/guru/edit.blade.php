@extends('layouts.app')
@section('content')
    <form method="POST" action="/guru/{{ $guru->noRef }}" id="form-guru">
        <div class="card card-custom mb-5">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Guru</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control username-input" value="{{ $user->username }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Password : <span for="" class="text-primary">Jika Tidak di Ubah Kosongkan</span>
                            </label><br>
                            
                            <div class="input-group">
                                <input id="cpassword" type="password" name="password" class="form-control">
                                <div class="input-group-append">
                                    <span id="showpaswd" style="cursor: pointer" class="input-group-text">Tampilkan</span>
                                </div>
                            </div>
            
                            <input type="text" name="password_value" class="form-control" value="{{ $user->password }}" hidden>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nip</label>
                            <input type="text" name="nip" class="form-control nip-input" value="{{ $guru->nip }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Guru</label>
                            <input type="text" name="nama" class="form-control nama-guru-input" value="{{ $guru->nama }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control jenis-kelamin-input">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" 
                                    @if ( $guru->jenis_kelamin == "Laki-Laki" ) 
                                        {{ 'selected' }} 
                                    @endif>Laki-Laki</option>
            
                                <option value="Perempuan" 
                                    @if ( $guru->jenis_kelamin == "Perempuan" ) 
                                        {{ 'selected' }} 
                                    @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control alamat-input" value="{{ $guru->alamat }}">
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
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ url('guru') }}" class="btn btn-danger btn-block">
                                <span class="fa fa-window-close"></span> Batal
                            </a>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="{{ asset('js/show-and-hide-password.js') }}"></script>
@endsection