@extends('layouts.app')
@section('content')

    {{-- input pencarian data siswa  --}}
    <form method="POST" action="/nilaiRapor/create" id="form-nilai-rapor">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Kelola Rapor Siswa</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahunAjaran_id" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $item)
                                    <option 
                                        value="{{ $item->id }}" 
                                        @if($item->id == $find[0])
                                            selected
                                        @endif
                                    >{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester" id="" class="form-control semester-input">
                                <option 
                                    value="" 
                                    @if("" == $find[1])
                                        selected
                                    @endif
                                >Pilih Semester</option>
                                <option 
                                    value="Ganjil"
                                    @if("Ganjil" == $find[1])
                                        selected
                                    @endif
                                >Ganjil</option>
                                <option 
                                    value="Genap"
                                    @if("Genap" == $find[1])
                                        selected
                                    @endif
                                >Genap</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control kelas-input">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kls)
                                    @foreach($kls->kelas as $kelas)
                                        <option 
                                            value="{{ $kelas->nama_kelas }}"
                                            @if($kelas->nama_kelas == $find[2])
                                                selected
                                            @endif
                                        >{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Siswa</label>
                            <select name="siswa_id" id="siswa" class="form-control siswa-input">
                                <option value="">Pilih Siswa</option>
                                @foreach ($siswa as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if ($find[3] == $item->id)
                                            selected
                                        @endif
                                    >{{ $item->nama }}</option>
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
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-warning btn-block">
                            <span class="fa fa-pen"></span> Kelola Nilai Rapor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <br>
    
    {{-- jika data rapor belum ada maka isi rapor siswa --}}
    @if($jumlahData == 0)
        <form method="POST" action="/nilaiRapor" id="form-tetapkan-nilai-rapor">
            <div class="card card-custom">
                <div class="card-header">
                    <table>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>&nbsp;:</th>
                            <td>
                                @foreach($tahunWhere as $tahun)
                                    {{ $tahun->tahun_ajaran }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <th>&nbsp;:</th>
                            <td>{{ $find[1] }}</td>
                        </tr><tr>
                            <th>Kelas</th>
                            <th>&nbsp;:</th>
                            <td>{{ $find[2] }}</td>
                        </tr><tr>
                            <th>Siswa</th>
                            <th>&nbsp;:</th>
                            <td>
                                @foreach ($siswaWhere as $siswa)
                                    {{$siswa->nama}}
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="card-body">
                    <h5 class="font-weight-bold">Nilai Ekstrakulikuler</h5>
    
                    <div class="row">
                        <?php
                            $no_eskul = 1;
                            $no_ket = 1;
                        ?>
                        @foreach($kelasID as $k)
                            <div class="col-sm-4 font-weight-bold">
                                <div class="form-group">
                                    <label for="">Nama Ekskul</label>
                                    @foreach($tahunWhere as $tahun)
                                        <input hidden type="text" name="tahunAjaran_id" value="{{ $tahun->id }}">
                                    @endforeach

                                    <input hidden type="text" name="semester" value="{{ $find[1] }}">

                                    <input hidden type="text" name="kelas_id" value="{{ $k->id }}">

                                    <input hidden type="text" name="siswa_id" value="{{ $find[3] }}">

                                    @foreach($eskul->ekstrakulikuler as $item)
                                        <input hidden type="text" name="ekstrakulikuler_id" value="{{ $item->id }}">

                                        <label class="form-control">{{ $item->ekstrakulikuler }}</label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nilai</label>
                                    @if(count($eskul->ekstrakulikuler) > 0)
                                        <input type="number" min="10" step="1" name="nilai_eskul" id="nilai_eskul-{{ $no_eskul++ }}" class="hitung form-control nilai-eskul-input">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4 font-weight-bold">
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    @if(count($eskul->ekstrakulikuler) > 0)
                                        <input readonly type="text" name="keterangan_eskul" id="keterangan_eskul-{{ $no_ket++ }}" class="keterangan form-control">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                

                    <hr>

                    <h5 class="font-weight-bold">Nilai Akhlak dan Keperibadian</h5>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Akhlak</label>
                                <select name="nilai_akhlak" class="form-control btn-block akhlak-input">
                                    <option value="">Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Keperibadian</label>
                                <select name="nilai_keperibadian" class="form-control btn-block keperibadian-input">
                                    <option value="">Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="font-weight-bold">Ketidakhadiran</h5>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Izin</label>
                                <input type="number" min="0" name="izin" class="form-control izin-input">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Sakit</label>
                                <input type="number" min="0" name="sakit" class="form-control sakit-input">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Tanpa Keterangan</label>
                                <input type="number" min="0" name="tanpa_keterangan" class="form-control tanpa-keterangan-input">
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <h5 class="font-weight-bold">Keputusan</h5>

                    <div class="row">
                        <div class="col-sm-12">
                            <select name="keputusan" class="form-control naik-kelas-input">
                                <option value="">Pilih Keputusan</option>
                                <option value="naik kelas">Naik Kelas</option>
                                <option value="tinggal kelas">Tinggal Kelas</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    @csrf
                    <input type="hidden" name="_method" value="POST">
                    <button class="btn btn-success col-md-5">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                </div>
            </div>
        </form>

    {{-- jika nilai Rapor Sudah di kelola --}}
    @elseif($jumlahData > 0)
        <div class="card card-custom">
            <div class="card-body"> 
                <p class="text-danger">Nilai Rapor Sudah di Kelola</p>

                @foreach($cekDataGanda as $item)
                    <form method="POST" action="/nilaiRapor/{{ $item->id }}/{{ $find[0] }}/{{ $find[1] }}/{{ $find[2] }}/{{ $find[3] }}/edit">
                
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary btn-lg col-lg-5 fl mb-3">
                            <span class="fa fa-edit"></span> Ubah
                        </button>
                    </form>
        
                    <form method="POST" action="/nilaiRapor/{{ $item->id }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-lg col-lg-5 fr">
                            <span class="fa fa-trash"></span> Hapus
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    @endif
    <br>
    <br>

    <script src="{{ asset('js/nilai-rapor-dropdownOption.js') }}"></script>
    <script src="{{ asset('js/keterangan-nilai-rapor.js') }}"></script>
@endsection
