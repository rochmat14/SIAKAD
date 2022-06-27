@extends('layouts.app')
@section('content')
    <form method="POST" action="/kkm/create2" id="cari_kkm">
        <div class="card card-custom">
            <div class="card-header">
                <span class="font-weight-bold">Kelola KKM</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" class="form-control tahun_ajaran_input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($menemukan[0] == $item->id) {{ 'selected' }} @endif>
                                        {{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                            <span
                                class="text-danger">{{ $errors->has('tahun_ajaran') ? $errors->first('tahun_ajaran') : '' }}</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mata_pelajaran" id="" class="form-control  mata_pelajaran_input">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($mapel_id->id == $item->id) {{ 'selected' }} @endif>
                                        {{ $item->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                            <span
                                class="text-danger">{{ $errors->has('mata_pelajaran') ? $errors->first('mata_pelajaran') : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <button type="submit" class="btn btn-warning fl mr-3">
                    <span class="fa fa-eye"></span> Tampilkan
                </button>
            </div>
    </form>
    </div>
    <hr>

    @if ($kkmMapelId->count() > 0)
        <div class="card card-custom">
            <div class="card-body">
                <h3 class="alert alert-danger text-center">KKM {{ $mapel_id->mata_pelajaran }} Sudah Ada</h3>

                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="/kkm/{{ $menemukan[0] }}/{{ $mapel_id->id }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mb-2">
                                <span class="fa fa-edit"></span> Ubah
                            </button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" action="/kkm/{{ $mapel_id->id }}">
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
    @elseif($kkmMapelId->count() == 0)
        <div class="card card-custom mb-5">
            <div class="card-body">
                <h3 class="alert alert-success text-center">Tetapkan KKM</h3>

                <table>
                    <tr>
                        <td><label for="">Tahun Ajaran</label></td>
                        <td><label name="tahun_ajaran">{{ ' = ' . $tahunWhereId->tahun_ajaran }}</label></td>
                    </tr>
                    <tr>
                        <td><label for="">Mata Pelajaran</label></td>
                        <td><label name="">{{ ' = ' . $mapel_id->mata_pelajaran }}</label></td>
                    </tr>
                </table>

                <div>
                    <form method="POST" action="/kkm" autocomplete="off" id="form_kkm">

                        <br>

                        <?php $no = 1; ?>
                        <?php $no_tahunAjaran_id = 1; ?>
                        <?php $no_mapel_id = 1; ?>
                        <?php $no_nama_kelas = 1; ?>
                        <?php $no_kkm_web = 1; ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>KKM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>

                                        <td hidden>
                                            <input 
                                                type="text"
                                                name={{ 'tahunAjaran_id[' . $no_tahunAjaran_id++ . ']' }}
                                                value="{{ $menemukan[0] }}"
                                            >
                                        </td>

                                        <td hidden>
                                            <input 
                                                type="text" 
                                                name={{ 'mapel_id[' . $no_mapel_id++ . ']' }}
                                                value="{{ $mapel_id->id }}"
                                            >
                                        </td>

                                        <td>
                                            <input 
                                                readonly 
                                                type="text" 
                                                name={{ 'nama_kelas[' . $no_nama_kelas++ . ']' }}
                                                value="{{ $item->nama_kelas }}" class="form-control"
                                            >
                                        </td>

                                        <td>
                                            <input 
                                                type="number" 
                                                step="1" 
                                                name={{ 'kkm[' . $no_kkm_web++ . ']' }}
                                                class="form-control kkm_input"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-save"></span> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
