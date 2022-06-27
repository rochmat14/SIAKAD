@extends('layouts.app')
@section('content')
    <form method="POST" action="/nilaiSiswa/create2" id="form-nilai-siswa">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Kelola Nilai Siswa</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahunAjaran_id" id="" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran1 as $item)
                                    <option value="{{ $item->id }}" 
                                        @if($find[0] == $item->id)
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
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil"
                                    @if($find[1] == "Ganjil")
                                        selected
                                    @endif
                                >Ganjil</option>
                                <option value="Genap"
                                    @if($find[1] == "Genap")
                                        selected
                                    @endif
                                >Genap</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mapel_id" id="" class="form-control mata-pelajaran-input">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel1 as $item)
                                    <option value="{{ $item->id }}"
                                        @if($find[2] == $item->id)
                                            selected
                                        @endif
                                    >{{ $item->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" id="" class="form-control kelas-input">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas1 as $item)
                                    <option value="{{ $item->id. "." .$item->nama_kelas }}"
                                        @if($find[3] == $item->id)
                                            selected
                                        @endif
                                    >{{ $item->nama_kelas }}</option>
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
                        <button type="submit" class="btn btn-warning btn-block mb-2">
                            <span class="fa fa-pen"></span> Kelola Nilai Siswa
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ url('daftarNilai') }}" class="btn btn-success btn-block">
                            <span class="fa fa-eye"></span> Daftar Nilai Siswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <br>
    <hr>

    {{-- kondisi jika data sudah ada --}}
    @if(count($cekData) > 0)
        <div class="card card-custom mb-3"> 
            <div class="card-body">
                <p class="text-danger">Data yang Ingin Ditampilkan Sudah di Kelola</p>
    
                <div class="row">
                    <div class="col-sm-6">
                        <form method="POST" action="/nilaiSiswa/{{ $idRef }}/{{ $find[0] }}/{{ $find[1] }}/{{ $find[2] }}/{{ $find[3] }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mb-2">
                                <span class="fa fa-edit"></span> Ubah
                            </button>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <form method="POST" action="/nilaiSiswa/{{ $idRef }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-lg btn-block">
                                <span class="fa fa-trash"></span> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    {{-- kondisi jika variable "$kkm" kosong --}}
    @elseif($kkm->isEmpty())
    <div class="card card-custom mb-3">
        <div class="card-body">
            <h4 class="text-danger text-center">Maaf KKM belum ditetapkan</h4>
        </div>
    </div>
        
    @else    
        <h3 class="alert alert-success text-center">Tetapkan Nilai Siswa</h3>
        <table>
            <tr>
                <td><label for="">Tahun Ajaran</label></td>
                <td><p name="tahun_ajaran">&nbsp; &nbsp;{{ "= ".$tahunAjaran2->tahun_ajaran }}</p></td>
            </tr>
            <tr>
                <td><label for="">Semester</label></td>
                <td><p>&nbsp; &nbsp;{{ "= ".$find[1] }}</p></td>
            </tr>
            <tr>
                <td><label for="">Mata Pelajaran</label></td>
                <td>
                    <p>&nbsp; &nbsp;{{ "= ".$mapel2->mata_pelajaran }}</p>
                </td>
            </tr>
            <tr>
                <td><label for="">Kelas</label></td>
                <td><p>&nbsp; &nbsp;{{ "= ".$kelas2->nama_kelas }}</p></td>
            </tr>
            <tr>
                <td><label for="">KKM</label></td>
                @foreach ($kkm as $item)
                    <td><p id="paragraf">&nbsp; &nbsp;{{ "= ".$item->kkm }}</p></td>
                @endforeach
            </tr>
        </table>
        
        {{-- <form method="POST" action="/nilaiSiswa">
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th hidden>Tahun Ajaran</th>
                    <th hidden>Semester</th>
                    <th hidden>Kelas</th>
                    <th hidden>Mapel</th>
                    <th hidden>KKM</th>
                    <th>Nama Siswa</th>
                    <th>N.RT.Tugas</th>
                    <th>N.UN</th>
                    <th>N.US</th>
                    <th>N.Akhir</th>
                    <th>Keterangan</th>
                </tr>
                
                nomor urut
                
                @foreach($siswa as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td hidden><input type="text" name="tahunAjaran_id[]" value="{{ $tahunAjaran2->id }}"></td>
                        <td hidden><input type="text" name="semester[]" value="{{ $find[1] }}"></td>
                        <td hidden><input type="text" name="kelas_id[]" value="{{ $kelas2->id }}"></td>
                        <td hidden>
                            <input type="text" name="mapel_id[]" value="{{ $mapel2->id }}">
                        </td>
                        <td hidden>
                            <input type="text" name="kkm_id[]" value="{{ $kkm->id }}">
                        </td>
                        <td>
                            <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                            {{ $item->nama }}
                        </td>
                        <td><input type="number" step=".01" min="1" name="nilai_tugas[]" id="nTugas-{{ $iTugas++ }}" class="hitung col-md-8 form-control"></td>
                        <td><input type="number" step=".01" min="1" name="nilai_ujian_harian[]" id="nHarian-{{ $iHarian++ }}" class="hitung col-md-8 form-control"></td>
                        <td><input type="number" step=".01" min="1" name="nilai_ujian_semester[]" id="nSemester-{{ $iSemester++ }}" class="hitung col-md-8 form-control"></td>
                        <td><input readonly type="text" name="nilai_akhir[]" id="nAkhir-{{ $nAkhir++ }}" class="nAkhir col-md-8 form-control"></td>
                        <td><input readonly type="text"   name="keterangan[]" id="keterangan-{{ $keterangan++ }}" class="keterangan form-control"></td>
                    </tr>
                @endforeach
            </table>
                @csrf
                <input type="hidden" name="_method" value="POST">
                <button type="submit" class="btn btn-success">
                    <span class="fa fa-save"></span> Simpan
                </button>
            </div>
        </form> --}}

        {{-- kondisi jika nilai siswa tidak ada data --}}
        @if(!$siswa->isEmpty())
            <form method="POST" action="/nilaiSiswa" id="form-tetapkan-nilai-siswa">
                <?php $no = 1; ?>

                <?php $inputTugas = 0; ?>
                <?php $inputHarian = 0; ?>
                <?php $inputSemester = 0; ?>
                
                <?php $idTugas = 0; ?>
                <?php $idHarian = 0; ?>
                <?php $idSemester = 0; ?>
                <?php $idAkhir = 0; ?>
                <?php $idKeterangan = 0; ?>
                @foreach ($siswa as $item)
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <td>{{ $no++ }}</td>
                            <td hidden>
                                <input type="text" name="tahunAjaran_id[]" value="{{ $tahunAjaran2->id }}">
                            </td>
                            <td hidden>
                                <input type="text" name="semester[]" value="{{ $find[1] }}">
                            </td>
                            <td hidden>
                                <input type="text" name="kelas_id[]" value="{{ $kelas2->id }}">
                            </td>
                            <td hidden>
                                <input type="text" name="mapel_id[]" value="{{ $mapel2->id }}">
                            </td>
                            <td hidden>
                                @foreach ($kkm as $object)
                                    <input type="text" name="kkm_id[]" value="{{ $object->id }}">
                                @endforeach
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Nama Siswa</th>
                            <td>
                                <input 
                                    type="hidden" 
                                    name="siswa_id[]" 
                                    value="{{ $item->id }}"
                                >
                                {{ $item->nama }}
                            </td>
                        </tr>

                        <tr>
                            <th>Nilai Rata2 Tugas</th>
                            <td>
                                <input 
                                    type="number" 
                                    step="1" 
                                    min="10" 
                                    name="nilai_tugas[{{ $inputTugas++ }}]" 
                                    id="nTugas-{{ $idTugas++ }}" {{-- untuk event javascript --}}
                                    class="hitung form-control nilai-rata2-tugas-input"
                                >
                            </td>
                        </tr>

                        <tr>
                            <th>Nilai Ujian Harian</th>
                            <td>
                                <input 
                                    type="number" 
                                    step="1" 
                                    min="10" 
                                    name="nilai_ujian_harian[{{ $inputHarian++ }}]" 
                                    id="nHarian-{{ $idHarian++ }}" {{-- untuk event javascript --}}
                                    class="hitung form-control nilai-ujian-harian-input"
                                >
                            </td>
                        </tr>

                        <tr>
                            <th>Nilai Ujian Semester</th>
                            <td>
                                <input 
                                    type="number" 
                                    step="1" 
                                    min="10" 
                                    name="nilai_ujian_semester[{{ $inputSemester++ }}]" 
                                    id="nSemester-{{ $idSemester++ }}" {{-- untuk event javascript --}}
                                    class="hitung form-control nilai-ujian-semester-input"
                                >
                            </td>
                        </tr>

                        <tr>
                            <th>Nilai Akhir</th>
                            <td>
                                <input 
                                    readonly 
                                    type="text" 
                                    name="nilai_akhir[]" 
                                    id="nAkhir-{{ $idAkhir++ }}" {{-- untuk event javascript --}}
                                    class="nAkhir form-control"
                                >
                            </td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input 
                                    readonly 
                                    type="text" 
                                    name="keterangan[]" 
                                    id="keterangan-{{ $idKeterangan++ }}" {{-- untuk event javascript --}}
                                    class="keterangan form-control"
                                >
                            </td>
                        </tr>
                    </table>
                @endforeach

                @csrf
                <input type="hidden" name="_method" value="POST">
                <button type="submit" class="btn btn-success mb-3">
                    <span class="fa fa-save"></span> Simpan
                </button>
            </form>

        {{-- kondisi jika variable "$siswa" kosong --}}
        @elseif($siswa->isEmpty())
            <h1 class="text-danger text-center">Pada kelas {{ $kelas2->nama_kelas }} belum ada siswa</h1>

        @endif

    @endif

    <script src="{{ asset('js/jumlah-nilai-siswa.js') }}"></script>
@endsection

