@extends('layouts.app')
@section('content')
    <form method="POST" action="/admin/{{ $admin->id }}" id="form-admin">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Admin</span>
            </div>

            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control nama-input" value="{{ $admin->name }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control username-input" value="{{ $admin->username }}">
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Password</label><br>
                                <label for="" class="text-primary font-weight-bold">Jika Tidak di Ubah Kosongkan</label>
                                <div class="input-group">
                                    <input id="cpassword" type="password" name="password" class="form-control">
                                    <div class="input-group-append">
                                        <span id="showpaswd" style="cursor: pointer" class="input-group-text">Tampilkan</span>
                                    </div>
                                </div>

                                <input type="text" name="password_value" class="form-control" value="{{ $admin->password }}" hidden>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-success btn-block mb-3">
                            <span class="fa fa-save"> Simpan</span>
                        </button>
                    </div>

    {{-- batas form ubah data   --}}
    </form>
                    {{-- button Lihat Data Admin harus berada diluar form edit data 
                    jika tidak akan di baca simpan --}}
                    <div class="col-sm-6">
                        <form method="post" action="/admin">
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-warning btn-block">
                                <span class="fa fa-eye"> Lihat Data Admin</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/show-and-hide-password.js') }}"></script>
@endsection