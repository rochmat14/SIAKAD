@extends('layouts.app')
@section('content')
    <form method="POST" action="/siswa/{{ $siswa->noRef }}" id="form-siswa">
        <div class="card card-custom mb-5">
            <div class="card-header">
                <span class="font-weight-bold">Ubah Data Siswa</span>
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
                            <label for="">Password : <span class="text-primary">Jika Tidak di Ubah Kosongkan</span></label><br>
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

                
                @if(auth()->user()->role == 'admin')
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nis</label>
                                <input type="text" name="nis" class="form-control nis-input" value="{{ $siswa->nis }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nisn</label>
                                <input type="text" name="nisn" class="form-control nisn-input" value="{{ $siswa->nisn }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control tempat-lahir-input" value="{{ $siswa->tempat_lahir }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control tanggal-lahir-input" value="{{ $siswa->tanggal_lahir }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control jenis-kelamin-input">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" @if($siswa->jenis_kelamin == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($siswa->jenis_kelamin == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="" class="form-control agama-input">
                                    <option value="">Pilih Agama</option>
                                    <option value="Kristen"  @if($siswa->agama == "Kristen") {{ 'selected' }} @endif>Kristen</option>
                                    <option value="Islam"    @if($siswa->agama == "Islam") {{ 'selected' }} @endif>Islam</option>
                                    <option value="Hindu"    @if($siswa->agama == "Hindu") {{ 'selected' }} @endif>Hindu</option>
                                    <option value="Buddha"   @if($siswa->agama == "Buddha") {{ 'selected' }} @endif>Buddha</option>
                                    <option value="Sikhisme" @if($siswa->agama == "Sikhisme") {{ 'selected' }} @endif>Sikhisme</option>
                                    <option value="Judaisme" @if($siswa->agama == "Judaisme") {{ 'selected' }} @endif>Judaisme</option>
                                    <option value="Baha'i"   @if($siswa->agama == "Baha'i") {{ 'selected' }} @endif>Baha'i</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Anak Ke</label>
                                <input type="text" name="anak_ke" class="form-control anak-ke-input" value="{{ $siswa->anak_ke }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control alamat-input" value="{{ $siswa->alamat }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="no_telepon" class="form-control nomor-telepon-input" value="{{ $siswa->no_telepon }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control asal-sekolah-input" value="{{ $siswa->asal_sekolah }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Kelas Awal</label>
                                <select name="kelas_awal" id="" class="form-control kelas-awal-input">
                                    <option value="">Pilih Kelas Awal</option>
                                    @foreach($kelas as $item)
                                        <option value="{{ $item->nama_kelas }}" 
                                            @if($siswa->kelas_awal == $item->nama_kelas ) 
                                                {{ 'selected' }} 
                                            @endif>
                                                {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tanggal Diterima</label>
                                <input type="date" name="tanggal_diterima" class="form-control tanggal-diterima-input" value="{{ $siswa->tanggal_diterima }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control nama-ayah-input" value="{{ $siswa->nama_ayah }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control nama-ibu-input" value="{{ $siswa->nama_ibu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat Orang Tua</label>
                                <input type="text" name="alamat_ortu" class="form-control alamat-orang-tua-input" value="{{ $siswa->alamat_ortu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Telepon Orang Tua</label>
                                <input type="text" name="telepon_ortu" class="form-control telepon-orang-tua-input" value="{{ $siswa->telepon_ortu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" class="form-control pekerjaan-ayah-input" value="{{ $siswa->pekerjaan_ayah }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" class="form-control pekerjaan-ibu-input" value="{{ $siswa->pekerjaan_ibu }}">
                            </div>
                        </div>
                    </div>
                @else
                    <div hidden class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nis</label>
                                <input type="text" name="nis" class="form-control nis-input" value="{{ $siswa->nis }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nisn</label>
                                <input type="text" name="nisn" class="form-control nisn-input" value="{{ $siswa->nisn }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control tempat-lahir-input" value="{{ $siswa->tempat_lahir }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control tanggal-lahir-input" value="{{ $siswa->tanggal_lahir }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control jenis-kelamin-input">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" @if($siswa->jenis_kelamin == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($siswa->jenis_kelamin == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="" class="form-control agama-input">
                                    <option value="">Pilih Agama</option>
                                    <option value="Kristen"  @if($siswa->agama == "Kristen") {{ 'selected' }} @endif>Kristen</option>
                                    <option value="Islam"    @if($siswa->agama == "Islam") {{ 'selected' }} @endif>Islam</option>
                                    <option value="Hindu"    @if($siswa->agama == "Hindu") {{ 'selected' }} @endif>Hindu</option>
                                    <option value="Buddha"   @if($siswa->agama == "Buddha") {{ 'selected' }} @endif>Buddha</option>
                                    <option value="Sikhisme" @if($siswa->agama == "Sikhisme") {{ 'selected' }} @endif>Sikhisme</option>
                                    <option value="Judaisme" @if($siswa->agama == "Judaisme") {{ 'selected' }} @endif>Judaisme</option>
                                    <option value="Baha'i"   @if($siswa->agama == "Baha'i") {{ 'selected' }} @endif>Baha'i</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Anak Ke</label>
                                <input type="text" name="anak_ke" class="form-control anak-ke-input" value="{{ $siswa->anak_ke }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control alamat-input" value="{{ $siswa->alamat }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="no_telepon" class="form-control nomor-telepon-input" value="{{ $siswa->no_telepon }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control asal-sekolah-input" value="{{ $siswa->asal_sekolah }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Kelas Awal</label>
                                <select name="kelas_awal" id="" class="form-control kelas-awal-input">
                                    <option value="">Pilih Kelas Awal</option>
                                    @foreach($kelas as $item)
                                        <option value="{{ $item->nama_kelas }}" 
                                            @if($siswa->kelas_awal == $item->nama_kelas ) 
                                                {{ 'selected' }} 
                                            @endif>
                                                {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tanggal Diterima</label>
                                <input type="date" name="tanggal_diterima" class="form-control tanggal-diterima-input" value="{{ $siswa->tanggal_diterima }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control nama-ayah-input" value="{{ $siswa->nama_ayah }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control nama-ibu-input" value="{{ $siswa->nama_ibu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat Orang Tua</label>
                                <input type="text" name="alamat_ortu" class="form-control alamat-orang-tua-input" value="{{ $siswa->alamat_ortu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Telepon Orang Tua</label>
                                <input type="text" name="telepon_ortu" class="form-control telepon-orang-tua-input" value="{{ $siswa->telepon_ortu }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" class="form-control pekerjaan-ayah-input" value="{{ $siswa->pekerjaan_ayah }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" class="form-control pekerjaan-ibu-input" value="{{ $siswa->pekerjaan_ibu }}">
                            </div>
                        </div>
                    </div>
                @endif
                
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
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
                            <a href="{{ url('siswa') }}" class="btn btn-danger btn-block">
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