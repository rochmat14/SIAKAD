@extends('layouts.app')
@section('content')
    <h2 class="alert alert-info text-center">Ubah Rapor :{{ $rapor->siswa->nama }}</h2>        
        
    <div class="card card-custom">
        <form method="POST" action="/nilaiRapor/{{ $rapor->id }}" id="form-tetapkan-nilai-rapor">
            <div class="card-body">
                <h5 class="font-weight-bold">Nilai Ekstrakulikuler</h5>

                <div class="row">
                    <div class="col-sm-2">
                        <label class="font-weight-bold">Nama Ekskul</label>
                        <label class="form-control">
                            {{ $rapor->ekstrakulikuler->ekstrakulikuler }}
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <label class="font-weight-bold">Nilai</label>
                        <input type="number" step="1" min="10" max="100"  name="nilai_eskul" id="nilai_eskul" class="hitung form-control nilai-eskul-input" value="{{ $rapor->nilai_eskul }}">
                    </div>
                    <div class="col-sm-5">
                        <label class="font-weight-bold">Keterangan</label>
                        <input readonly type="text" name="keterangan_eskul" id="keterangan_eskul" class="keterangan form-control">
                    </div>
                </div>

                <hr>
                <h5 class="font-weight-bold">Nilai Akhlak dan Keperibadian</h5>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Akhlak</label>
                        <select name="nilai_akhlak" class="form-control akhlak-input">
                            <option value="">Pilih</option>
                            <option 
                                value="A" 
                                @if($rapor->nilai_akhlak == 'A') 
                                    {{  'selected' }} 
                                @endif
                            >A</option>
                            <option 
                                value="B" 
                                @if($rapor->nilai_akhlak == 'B') 
                                {{  'selected' }} 
                                @endif
                            >B</option>
                            <option     
                                value="C"   
                                @if($rapor->nilai_akhlak == 'C') 
                                {{  'selected' }} 
                                @endif
                            >C</option>
                            <option 
                                value="D"  
                                @if($rapor->nilai_akhlak == 'D') 
                                {{  'selected' }} 
                                @endif
                            >D</option>
                            <option 
                                value="E" 
                                @if($rapor->nilai_akhlak == 'E') 
                                {{  'selected' }} 
                                @endif
                            >E</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label class="font-weight-bold">Keperibadian</label>
                        <select name="nilai_keperibadian" class="form-control keperibadian-input">
                            <option value="">Pilih</option>
                            <option 
                                value="A" 
                                @if($rapor->nilai_keperibadian == 'A') 
                                {{  'selected' }} 
                                @endif
                            >A</option>
                                <option 
                                value="B" 
                                @if($rapor->nilai_keperibadian == 'B') 
                                {{  'selected' }} @endif
                            >B</option>
                            <option 
                                value="C" 
                                @if($rapor->nilai_keperibadian == 'C') 
                                {{  'selected' }} 
                                @endif
                            >C</option>
                            <option 
                                value="D" 
                                @if($rapor->nilai_keperibadian == 'D') 
                                {{  'selected' }} 
                                @endif
                            >D</option>
                            <option 
                                value="E" 
                                @if($rapor->nilai_keperibadian == 'E') 
                                {{  'selected' }} 
                                @endif
                            >E</option>
                        </select>
                    </div>
                </div>

                <hr>

                <h5 class="font-weight-bold">Ketidakhadiran</h5>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="font-weight-bold">Izin</label>
                        <input type="number" min="0" name="izin" class="form-control izin-input" value="{{ $rapor->izin }}">
                    </div>
                    <div class="col-sm-4">
                        <label class="font-weight-bold">Sakit</label>
                        <input type="number" min="0" name="sakit" class="form-control sakit-input" value="{{ $rapor->sakit }}">
                    </div>
                    <div class="col-sm-4">
                        <label class="font-weight-bold">Tanpa Keterangan</label>
                        <input type="number" min="0" name="tanpa_keterangan" class="form-control tanpa-keterangan-input" value="{{ $rapor->tanpa_keterangan }}">
                    </div>
                </div>

                <hr>

                <h5 class="font-weight-bold">Keputusan</h5>

                <div>
                    <select name="keputusan" class="form-control naik-kelas-input">
                        <option value="">Pilih Keputusan</option>
                        <option value="naik kelas"
                            @if($rapor->keputusan == 'naik kelas')
                                {{ 'selected' }}
                            @endif>
                            Naik Kelas
                        </option>
                        <option value="tinggal kelas"
                            @if($rapor->keputusan == 'tinggal kelas')
                                {{ 'selected' }}
                            @endif>
                            Tinggal Kelas
                        </option>
                    </select>
                </div>
            </div>
            
            <div class="card-body">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <button class="btn btn-success col-md-5 float-left mb-3">
                    <i class="fa fa-save"></i>
                    Simpan
                </button>
            
        </form>

                <form method="POST" action="/nilaiRapor/create">
                    @csrf
                    <input type="hidden" name="_method" value="POST">

                    <input hidden type="text" name="tahunAjaran_id" value="{{ $idTahunAjaran }}">
                    <input hidden type="text" name="semester" value="{{ $semester }}">
                    <input hidden type="text" name="kelas" value="{{ $idKelas }}">
                    <input hidden type="text" name="siswa_id" value="{{ $idSiswa }}">
                    <button class="btn btn-danger col-md-5 float-right mb-3">Batal</button>
                </form>
            </div>
    </div>
    <br>
    <br>

    <script>
        var nilai = ($('#nilai_eskul').val());                  
            n     = parseFloat(nilai);
        
        if((n >= 1) && (n <= 59)) {
            $('#keterangan_eskul').val("kurang".toUpperCase());

        }else if((n >= 60) && (n <= 79)){
            $('#keterangan_eskul').val("cukup".toUpperCase());

        }else if((n >= 80) && (n <= 90)){
            $('#keterangan_eskul').val("baik".toUpperCase());
            
        }else if((n >= 91) && (n <= 100)){
            $('#keterangan_eskul').val("sangat baik".toUpperCase());
            
        }else{
            $('#keterangan_eskul').val("");
        }
        
        $('body').on('focus', '.hitung', function() {

            $(this).bind('keyup mouseup', function(){
                setTimeout(function(){
                    var nilai = ($('#nilai_eskul').val());                  
                        n     = parseFloat(nilai);

                    if((n >= 1) && (n <= 59)) {
                        $('#keterangan_eskul').val("kurang".toUpperCase());

                    }else if((n >= 60) && (n <= 79)){
                        $('#keterangan_eskul').val("cukup".toUpperCase());

                    }else if((n >= 80) && (n <= 90)){
                        $('#keterangan_eskul').val("baik".toUpperCase());
                        
                    }else if((n >= 91) && (n <= 100)){
                        $('#keterangan_eskul').val("sangat baik".toUpperCase());
                        
                    }else{
                        $('#keterangan_eskul').val("");
                    }
                }, 50);
                
            });
        });
    </script>
@endsection
