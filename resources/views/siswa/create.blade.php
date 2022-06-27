@extends('layouts.app')
@section('content')
    <form method="POST" action="/siswa" id="form-siswa">
        <div class="card card-custom mb-5">
            <div class="card-header">
                <span class="font-weight-bold">Tambah Data Siswa</span>
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
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group">
                                <input id="cpassword" type="password" name="password" class="form-control password-input">
                                <div class="input-group-append">
                                    <span id="showpaswd" style="cursor: pointer" class="input-group-text">Tampilkan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nis</label>
                            <input type="text" name="nis" class="form-control nis-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nisn</label>
                            <input type="text" name="nisn" class="form-control nisn-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control nama-siswa-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control tempat-lahir-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control tanggal-lahir-input">
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
                            <label for="">Agama</label>
                            <select name="agama" id="" class="form-control agama-input">
                                <option value="">Pilih Agama</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Sikhisme">Sikhisme</option>
                                <option value="Judaisme">Judaisme</option>
                                <option value="Baha'i">Baha'i</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Anak Ke</label>
                            <input type="text" name="anak_ke" class="form-control anak-ke-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control alamat-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" name="no_telepon" class="form-control nomor-telepon-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control asal-sekolah-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Kelas Awal</label>
                            <select name="kelas_awal" id="" class="form-control kelas-awal-input">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $item)
                                    <option value="{{ $item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control tanggal-diterima-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control nama-ayah-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control nama-ibu-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat Orang Tua</label>
                            <input type="text" name="alamat_ortu" class="form-control alamat-orang-tua-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Telepon Orang Tua</label>
                            <input type="text" name="telepon_ortu" class="form-control telepon-orang-tua-input">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control pekerjaan-ayah-input">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control pekerjaan-ibu-input">
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
                        <a href="{{ url('siswa') }}" class="btn btn-danger btn-block">
                            <span class="fa fa-window-close"></span> Batal
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/show-and-hide-password.js') }}"></script>
@endsection