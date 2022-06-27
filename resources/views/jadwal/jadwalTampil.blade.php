@extends('layouts.app')
@section('content')
    <form method="POST" action="/jadwalTampil" id="form-jadwal">
        <div class="card card-custom">
            <div class="card-header font-weight-bold">Data Jadwal</div>

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

    <br>

    <hr>

    @if ( $jadwal->count() > 0)
        <div class="card card-custom">
            <div class="card-header">
                <table>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            @foreach($jadwal->take(1) as $tahun)
                                {{ $tahun->tahunAjaran->tahun_ajaran }}
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td>Semester</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ $find[1] }}</td>
                    </tr>

                    <tr>
                        <td>Kelas</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            {{ $kelas->kelas_awal }}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-web">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Guru</th>
                        </tr>
                    </thead>
                
                    <?php $no = 1; ?>
                    @foreach ($jadwal as $item)
                    <tbody>
                        <tr>
                            <td> {{ $no++ }} </td>
                            <td> {{ $item->mapel->mata_pelajaran }} </td>
                            <td> {{ $item->hari }} </td>
                            <td> {{ date('h:i:A', strtotime($item->waktu_mulai)) }} {{ "-" }} {{ date('h:i:A', strtotime($item->waktu_selesai)) }} </td>
                            <td> {{ $item->guru->nama }} </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

                <?php $no = 1; ?>
                @foreach ($jadwal as $item)
                    <table class="table table-bordered table-android">
                        <tr>
                            <th>No</th>
                            <td>{{ $no++ }}</td>
                        </tr>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <td>{{ $item->mapel->mata_pelajaran }}</td>
                        </tr>
                        <tr>
                            <th>Hari</th>
                            <td>{{ $item->hari }}</td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td>{{ date('h:i:A', strtotime($item->waktu_mulai)) }} {{ "-" }} {{ date('h:i:A', strtotime($item->waktu_selesai)) }}</td>
                        </tr>
                        <tr>
                            <th>Guru</th>
                            <td>{{ $item->guru->nama }}</td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    
        @else
            <div class="card card-custom">
                <div class="card-body">
                    <h4 class="text-danger text-center">Maaf Jadwal yang anda cari tidak ditemukan</h4>
                </div>
            </div>
        @endif
@endsection
