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
                            <select name="tahun_ajaran" id="" class="form-control tahun_ajaran_input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $item)
                                    <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                            {{-- <span class="text-danger">{{ ($errors->has('tahun_ajaran')) ? $errors->first('tahun_ajaran'):'' }}</span> --}}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mata_pelajaran" id="" class="form-control mata_pelajaran_input">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}">{{ $item->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                            {{-- <span class="text-danger">{{ ($errors->has('mata_pelajaran')) ? $errors->first('mata_pelajaran'):'' }}</span> --}}
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
        </div>
    </form>
@endsection
