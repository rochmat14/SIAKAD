@extends('layouts.app')
@section('content')
    <form method="POST" action="/daftarCetakRapor" id="form-cetak-rapor">
        <div class="card card-custom">
            <div class="card-header font-weight-bold">Cetak Rapor Siswa</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select name="tahunAjaran_id" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach($tahunAjaran as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if ($item->id == $find[0])
                                            selected
                                        @endif
                                    >{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control semester-input">
                                <option 
                                    value=""
                                    @if ("" == $find[1])
                                        selected
                                    @endif
                                >Pilih Semester</option>
                                <option 
                                    value="Ganjil"
                                    @if ("Ganjil" == $find[1])
                                        selected
                                    @endif
                                >Ganjil</option>
                                <option 
                                    value="Genap"
                                    @if ("Genap" == $find[1])
                                        selected
                                    @endif
                                >Genap</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" class="form-control kelas-input">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $item)
                                    <option 
                                    value="{{ $item->id }}"
                                    @if ($item->id == $find[2])
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
                        <button type="submit" class="btn btn-warning btn-block">
                            <i class="fa fa-eye"></i> Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <br>

    @if($nilaiRapor->count() != 0)
        <div class="card card-custom">
            <div class="card-header">
                <table>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>&nbsp;:&nbsp;</th>
                        <td>{{ $tahunAjaran_id->tahun_ajaran }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <th>&nbsp;:&nbsp;</th>
                        <td>{{ $find[1] }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>&nbsp;:&nbsp;</th>
                        <td>
                            @foreach ($nilaiRapor as $item)
                                {{ $item->kelas->nama_kelas }}
                                <?php break; ?>  {{-- fungsi break untuk mengambil hanya satu dara dari perulangan foreach --}}
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
    
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Cetak Rapor</th>
                    </tr>
                    
                    @foreach($nilaiRapor as $item)
                        <form method="POST" action="/rapor" target="_blank">
                            <tr>
                                <td hidden>
                                    <input type="text" name="tahun_ajaran" value="{{ $tahunAjaran_id->id }}">
                                    <input type="text" name="semester" value="{{ $find[1] }}">
                                    <input type="text" name="id_siswa" value="{{ $item->id }}">
                                </td>
                                <td>
                                    <input type="hidden" name="id_siswa" value="{{ $item->siswa->id }}">
                                    {{ $item->siswa->nama }}
                                </td>
                                <td>
                                    <input type="hidden" name="kelas_id" value="{{ $item->kelas_id }}">
                                    {{ $item->kelas->nama_kelas }}
                                </td>
                                <td>
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-print"></i> Cetak
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="card card-custom">
            <div class="card-body text-center">
                <h4 class="text-danger">Maaf Rapor Siswa Tidak Ditemukan</h4>
            </div>
        </div>
    @endif
@endsection