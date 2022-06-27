@extends('layouts.app')
@section('content')
    <form method="POST" action="/guru" id="form-guru">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Tambah Data Guru</span>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control username-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group" id="password-group">
                            <label for="">Password</label>
                            <div class="input-group">
                                <input id="cpassword" type="password" name="password" class="form-control password-input">
                                <span id="showpaswd" style="cursor: pointer" class="input-group-append input-group-text">Tampilkan</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
    
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nip</label>
                            <input type="text" name="nip" class="form-control nip-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Guru</label>
                            <input type="text" name="nama" class="form-control nama-guru-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control jenis-kelamin-input">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control alamat-input">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="btn btn-success mb-2 btn-block">
                            <span class="fa fa-save"></span> Simpan 
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ url('guru') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/show-and-hide-password.js') }}"></script>
@endsection