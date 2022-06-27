<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    
    <title>SIAKAD</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

</head>
<body>
    <div class="container" style="overflow-x: auto">
        @if (!count($nilaiSiswa) == 0)

            <div class="row">
                <div class="col-sm-6">
                    <table class="float-left">
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>SMP Negeri 14 Bojong Simpang</td>
                        </tr>
                        <tr>
                            <td>Alamat Sekolah</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>JL.Rengas Hadikusumo</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>
                                {{ ucwords($nilai_rapor->siswa->nama) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>
                                {{ $nilai_rapor->siswa->nis }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-sm-6">
                    <table>
                        <tr>
                            <td>Kelas</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>
                                {{ strtoupper($nilai_rapor->kelas->nama_kelas) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>
                                {{ $nilai_rapor->semester }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Pelajaran</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td>
                                {{ $nilai_rapor->tahunAjaran->tahun_ajaran }}
                            </td>
                        </tr>     
                    </table>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered mt-3">
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
        
                        <tbody>
                            <?php $no = 1; ?>

                            @foreach ($nilai_rapor->nilaiSiswa as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->mapel->mata_pelajaran }}</td>
                                    <td>{{ $item->kkm->kkm }}</td>
                                    <td>{{ $item->nilai_akhir }}</td>
                                    <td>
                                        @php
                                            $nilai_akhir = ($item->nilai_akhir);
                
                                            // mengganti titik menjadi koma
                                            $hasil_nilai_akhir = str_replace(".", ",", $nilai_akhir);
                
                                            echo terbilang($hasil_nilai_akhir);
                                        @endphp
                                    </td>

                                    <td>{{ ucwords($item->keterangan) }}</td>

                                </tr>
                            @endforeach
                            
                            <tr>
                                <td colspan="3" class="text-center">Jmlah Nila Rata-Rata</td>
                                <td>
                                    {{ round($nilaiSiswa->sum('nilai_akhir') / $nilaiSiswa->count(), 1) }}
                                </td>
                                <td colspan="2">
                                    @php
                                        $nilai_akhir = $nilaiSiswa->sum('nilai_akhir') / $nilaiSiswa->count();
                
                                        // fungsi round untuk mengurangi angka di belakang koma sekaligus membulatkan
                                        $round_nilai = round($nilai_akhir,1);
                
                                        $hasil_nilai_akhir = str_replace(".", ",", $round_nilai);
                
                                        echo terbilang($hasil_nilai_akhir);
                                    @endphp
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Jenis</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
        
                        <tbody>
                                <tr>
                                    <td>Pengembangan Diri</td>
                                    <td>{{ $nilai_rapor->ekstrakulikuler->ekstrakulikuler }}</td>
                                    <td>{{ $nilai_rapor->nilai_eskul }}</td>
                                    <td>{{ $nilai_rapor->keterangan_eskul }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>Akhlak</th>
                            <td>{{ $nilai_rapor->nilai_akhlak }}</td>
                        </tr>
                        <tr>
                            <th>Keperibadian</th>
                            <td>{{ $nilai_rapor->nilai_keperibadian }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-sm-8">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2">Ketidakhadiran</th>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td>{{ $nilai_rapor->izin }}</td>
                        </tr>
                        <tr>
                            <td>Sakit</td>
                            <td>{{ $nilai_rapor->sakit }}</td>
                        </tr>
                        <tr>
                            <td>Tanpa Keterangan</td>
                            <td>{{ $nilai_rapor->tanpa_keterangan }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-sm-6">
                    <div class="float-left text-center">
                        <p class="lh-0">Mengetahui:</p>
                        <p>Orang Tua/Wali</p>
        
                        <br>
                        <br>
        
                        <p>(.................................)</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-right text-center">
                        <p>
                            Bojong Simpang, {{ date('d-F-Y', strtotime( $nilai_rapor->created_at )) }}
                        </p>
                        <p>Wali Kelas</p>
        
                        <br>
                        <br>
        
                        <p>(.................................)</p>
                    </div>
                </div>
            </div>

            <script>
                window.print();
            </script>

            @else
            
            <div class="jumbotron">
                <h1>Nilai  {{ $nilai_rapor->siswa->nama }} belum di isi</h1>

                <h4>Silakan isi terlebih dahulu pada menu Nilai Siswa</h4>

                <button class="btn btn-danger btn-lg" onclick="window.close()">Kembali</button>
            </div>
        @endif

    </div>

    
</body>
</html>
