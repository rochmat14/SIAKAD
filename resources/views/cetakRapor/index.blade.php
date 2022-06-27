@extends('layouts.app')
@section('content')
    <h2></h2>

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
                                    <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control semester-input">
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" class="form-control kelas-input">
                                {{-- @foreach($guru as $item) --}}
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                {{-- @endforeach --}}
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
@endsection