@extends('layouts.app')
@section('content')

    @if(auth()->user()->role == 'guru')
        <h2>Daftar Nilai Siswa</h2>
        {{-- <form method="POST" action="/daftarNilai/search">
            <div class="col-md-2 fl">
                <select name="where" id="" class="form-control">
                    <option value="siswa_id">Nama Siswa</option>
                    <option value="kelas_id">Nama Kelas</option>
                </select>
            </div>

            <div class="col-md-2 fl">
                <input type="text" name="search" class="form-control">
            </div>

            <input type="hidden" name="_method" value="GET">
            <button type="submit" class="btn btn-primary fl col-md-1 ml-3 "><span class="fa fa-search"></span> Cari</button> --}}

            <a href="{{ url('nilaiSiswa') }}" class="btn btn-warning mb-2">
                <span class="fa fa-edit"></span> Kelola Nilai Siswa
            </a>

            
        {{-- </form> --}}
    @endif
    

    {{-- hak akses siswa --}}
    @if(auth()->user()->role == 'siswa')
        <form method="POST" action="/nilaiTampil" id="form-nilai-siswa">
            <div class="card card-custom">
                <div class="card-header font-weight-bold">Daftar Nilai Siswa</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
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
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control semester-input">
                                    <option value="">Pilih Semester</option>
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
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            @csrf
                            <input type="hidden" name="_method" value="post">
                            <button class="btn btn-warning btn-block">
                                <i class="fa fa-eye"></i> Tampilkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
    
    <br>

    <hr>
    
    {{-- hak akses guru --}}
    @if(auth()->user()->role == 'guru')
        <input type="text" class="form-control mb-3 table-web" id="search-web" name="search" placeholder="cari siswa"></input>
        
        
    
        <div style="overflow-x: auto">
            <table class="table table-striped table-web">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Semester</th>
                        <th>Tugas</th>
                        <th>Ujian Harian</th>
                        <th>Ujian Semeter</th>
                        <th>Akhir</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                @foreach($nilaiSiswa as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td hidden>
                            <input type="text" name="id[]" value="{{$item->id}}">
                        </td>
                        <td>
                            {{ $item->siswa->nama }}
                        </td>
                        <td>
                            {{ $item->kelas->nama_kelas }}
                        </td>
                        <td>
                            {{ $item->tahunAjaran->tahun_ajaran }}
                        </td>
                        <td>
                            {{ $item->mapel->mata_pelajaran }}
                        </td>
                        <td>
                            {{ $item->semester }}
                        </td>
                        <td>
                            {{$item->nilai_tugas}}
                        </td>
                        <td>
                            {{$item->nilai_ujian_harian}}
                        </td>
                        <td>
                            {{$item->nilai_ujian_semester}}
                        </td>
                        <td>
                            {{$item->nilai_akhir}}
                        </td>
                        <td>
                            {{ucwords($item->keterangan)}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <input type="text" class="form-control mb-3 table-android" id="search-android" name="search" placeholder="cari siswa"></input>

        <?php $no=1; ?>
        <table class="table table-bordered table-android">
        @foreach ($nilaiSiswa as $item)
                    <tr>
                        <th>No</th>
                        <td>{{ $no++ }}</td>
                    </tr>

                    <tr>
                        <th>Nama Siswa</th>
                        <td>{{ $item->siswa->nama }}</td>
                    </tr>

                    <tr>
                        <th>Kelas</th>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                    </tr>

                    <tr>
                        <th>Tahun Ajaran</th>
                        <td>{{ $item->tahunAjaran->tahun_ajaran }}</td>
                    </tr>

                    <tr>
                        <th>Mata Pelajaran</th>
                        <td>{{ $item->mapel->mata_pelajaran }}</td>
                    </tr>

                    <tr>
                        <th>Semester</th>
                        <td>{{ $item->semester }}</td>
                    </tr>

                    <tr>
                        <th>Tugas</th>
                        <td>{{ $item->nilai_tugas }}</td>
                    </tr>

                    <tr>
                        <th>Ujian Harian</th>
                        <td>{{ $item->nilai_ujian_harian }}</td>
                    </tr>

                    <tr>
                        <th>Ujian Semester</th>
                        <td>{{ $item->nilai_ujian_semester }}</td>
                    </tr>

                    <tr>
                        <th>Akhir</th>
                        <td>{{ $item->nilai_akhir }}</td>
                    </tr>

                    <tr>
                        <th>Keterangan</th>
                        <td>{{ ucwords($item->keterangan) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">============================</th>
                    </tr>
                    @endforeach
                </table>

    @else
        @if(!$nilaiSiswa->isEmpty())
            <div style="overflow-x: auto">
                <table class="table table-bordered mb-5">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Mata Pelajaran</th>
                            <th rowspan="2">KKM</th>
                            <th colspan="2">Nilai</th>
                            <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <th>Angka</th>
                            <th>Terbilang</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    @foreach($nilaiSiswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $item->mapel->mata_pelajaran }}
                            </td>
                            <td>
                                {{ $item->kkm->kkm }}
                            </td>
                            <td>
                                {{ $item->nilai_akhir }}
                            </td>
                            <td>
                                @php
                                    $nilai_akhir = ($item->nilai_akhir);
        
                                    $hasil_nilai_akhir = str_replace(".", ",", $nilai_akhir);
        
                                    echo terbilang($hasil_nilai_akhir);
                                @endphp
                            </td>
                            <td>
                                {{ ucwords($item->keterangan) }}
                            </td>
                        </tr>
                    @endforeach
        
                    <tr>
                        <td colspan="3" class="text-center">Nilai Rata-Rata</td>
                        <td>
                            {{-- fungsi round untuk mengurangi angka di belakang koma sekaligus membulatkan --}}
                            {{ round($nilaiSiswa->sum('nilai_akhir') / $nilaiSiswa->count('nilai_siswa'),1) }}
                        </td>
                        <td colspan="2">
                            @php
                                $nilai_akhir = $nilaiSiswa->sum('nilai_akhir') / $nilaiSiswa->count('nilai_siswa');
        
                                // fungsi round untuk mengurangi angka di belakang koma sekaligus membulatkan
                                $round_nilai = round($nilai_akhir,1);
        
                                $hasil_nilai_akhir = str_replace(".", ",", $round_nilai);
        
                                echo terbilang($hasil_nilai_akhir);
                            @endphp
                        </td>
                    </tr>
                </table>
            </div>
            {{-- <h3 class="alert alert-danger text-center">Maaf Data Kosong</h3> --}}

            @else
                <div class="card card-custom">
                    <div class="card-body">
                        <h4 class="text-danger text-center">Nilai Siswa tidak ditemukan</h4>
                    </div>
                </div>
        @endif

    @endif

    {{-- untuk mencari dara siswa menggunakn input --}}
    {{-- menggunakan ajax --}}
    <script type="text/javascript">
        // event input id search-web akan di jalankan ketika input dimakan data
        $('#search-web').on('keyup',function(){

            // membaca value dari input yang memiliki id search-web
            $value=$(this).val();

            // call ajax
            $.ajax({

                // type method get
                type : 'get',
                
                // url yang diakses dari file web
                url : '{{URL::to('daftarNilai/search-web')}}',

                // mengeirim value input dengan nama request->search
                data:{'search':$value},

                // jika berhasil ditemukan 
                success:function(data){

                    // maka element beserta data akan dijalankan pada html
                    $('tbody').html(data);
                }
            });
        })

        // event input id search-web akan di jalankan ketika input dimakan data
        $('#search-android').on('keyup',function(){

            // membaca value dari input yang memiliki id search-web
            $value=$(this).val();

            // call ajax
            $.ajax({

                // type method get
                type : 'get',

                // url yang diakses dari file web
                url : '{{URL::to('daftarNilai/search-android')}}',

                // mengeirim value input dengan nama request->search
                data:{'search':$value},

                // jika berhasil ditemukan 
                success:function(data){

                    // maka element beserta data akan dijalankan pada html
                    $('tbody').html(data);
                }
            });
        })
    </script>

    {{-- untuk csrf laravel --}}
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection