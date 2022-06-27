@extends('layouts.app')
@section('content')
    <h3 class="alert alert-success text-center">Ubah Nilai Siswa Kelas : {{ $nilaiSiswaGet1->kelas->nama_kelas }}</h3>
        
    <table>
        @foreach($nilaiSiswa->take(1) as $item)
        <tr>
            <th>Mata Pelajaran</th>
            <td>
                {{ "= ".$item->mapel->mata_pelajaran}}
            </td>
        </tr>
        <tr>
            <th>KKM</th>
            <td>
                {{ "= ".$item->kkm->kkm}}
            </td>
        </tr>

            {{-- mengambil nilai kkm untuk di bandingkan pada jquery yang menghasilkan keterangan  --}}
            <p hidden id="paragraf">&nbsp; &nbsp;{{ "= ".$item->kkm->kkm}}</p>
        @endforeach
    </table>

    <form method="POST" action="/nilaiSiswa" id="form-tetapkan-nilai-siswa">
        <?php $no = 1; ?>

        <?php $inputTugas = 0; ?>
        <?php $inputHarian = 0; ?>
        <?php $inputSemester = 0; ?>
        
        <?php $iTugas = 1; ?>
        <?php $iHarian = 1; ?>
        <?php $iSemester = 1; ?>
        <?php $nAkhir = 1; ?>
        <?php $keterangan = 1; ?>
        @foreach($nilaiSiswa as $item)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <td>{{ $no++ }}</td>
                    <td hidden>
                        <input type="text" name="id[]" value="{{$item->id}}">
                    </td>
                </tr>

                <tr>
                    <th>Nama Siswa</th>
                    <td>
                        {{ $item->siswa->nama }}
                    </td>
                </tr>

                <tr>
                    <th>Nilai Rata2 Tugas</th>
                    <td>
                        <input type="number" step="1" min="1" name="nilai_tugas[{{ $inputTugas++ }}]" value="{{ $item->nilai_tugas }}" id="nTugas-{{ $iTugas++ }}" class="hitung col-md-8 form-control nilai-rata2-tugas-input">
                    </td>
                </tr>

                <tr>
                    <th>Nilai Ujian Harian</th>
                    <td>
                        <input type="number" step="1" min="1" name="nilai_ujian_harian[{{ $inputHarian++ }}]" value="{{ $item->nilai_ujian_harian }}" id="nHarian-{{ $iHarian++ }}" class="hitung col-md-8 form-control nilai-ujian-harian-input">
                    </td>
                </tr>

                <tr>
                    <th>Nilai Ujian Semseter</th>
                    <td>
                        <input type="number" step="1" min="1" name="nilai_ujian_semester[{{ $inputSemester++ }}]" value="{{ $item->nilai_ujian_semester }}" id="nSemester-{{ $iSemester++ }}" class="hitung col-md-8 form-control nilai-ujian-semester-input">
                    </td>
                </tr>

                <tr>
                    <th>Nilai Akhir</th>
                    <td>
                        <input readonly type="text" name="nilai_akhir[]" value="{{ $item->nilai_akhir }}" id="nAkhir-{{ $nAkhir++ }}" class="nAkhir col-md-8 form-control">
                    </td>
                </tr>

                <tr>
                    <th>Keterangan</th>
                    <td>
                        <input readonly type="text"   name="keterangan[]" value="{{ $item->keterangan }}" id="keterangan-{{ $keterangan++ }}" class="keterangan form-control">
                    </td>
                </tr>
            </table>
        @endforeach
        
        <div class="row">
            <div class="col-sm-6">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" name="submit" value="" class="btn btn-success btn-block mb-2">
                    <span class="fa fa-save"></span> Simpan
                </button>
            </div>
        </form>

        <div class="col-sm-6">
            {{-- <a href="{{ url('nilaiSiswa') }}" class="btn btn-danger btn-block mb-3">
                <span class="fa fa-window-close"></span> Batal
            </a> --}}

            <form method="POST" action="/nilaiSiswa/create2">
                <input hidden type="text" name="tahunAjaran_id" value="{{ $tahunAjaran_id }}">
                <input hidden type="text" name="semester" value="{{ $semester }}">
                <input hidden type="text" name="mapel_id" value="{{ $mapel_id }}">
                <input hidden type="text" name="kelas_id" value="{{  $kelas_id }}">
                
                @csrf
                <input type="hidden" name="_method" value="POST">
                <button type="submit" class="btn btn-danger btn-block mb-3"><span class="fa fa-window-close"></span> Batal</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/jumlah-nilai-siswa.js') }}"></script>
@endsection