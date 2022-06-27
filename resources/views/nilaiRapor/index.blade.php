@extends('layouts.app')
@section('content')
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
                            <select name="tahunAjaran_id" id="" class="form-control tahun-ajaran-input">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaran as $item)
                                    <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester" id="" class="form-control semester-input">
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
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
                                        <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
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
                        <button class="btn btn-warning btn-block mb-2">
                            <span class="fa fa-pen"></span> Kelola Nilai Rapor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/nilai-rapor-dropdownOption.js') }}"></script>
    {{-- <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        
        if(exist){
            alert(msg);
        }
    </script> --}}
@endsection
