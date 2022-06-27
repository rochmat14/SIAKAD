@extends('layouts.app')
@section('content')
    
    
    @if(auth()->user()->role == 'admin')
        <h2>Data Jadwal</h2>

        <div style="overflow-x: auto">
            <table class="table table-bordered table-jadwal-web">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Nama Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Guru</th>
                        <td>
                            <form method="POST" action="/jadwal/create">
                                <input type="hidden" name="_method" value="GET">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    <span class="fa fa-plus"></span> Tambah Jadwal
                                </button>
                            </form>
                        </td>
                    </tr>
                </thead>
                
                <?php $no = 1; ?>
                @foreach ($jadwal as $item)
                <tbody>
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{ $item->tahunAjaran->tahun_ajaran }} </td>
                        <td> {{ $item->semester }} </td>
                        <td> {{ strtoupper($item->nama_kelas) }} </td>
                        <td> {{ strtoupper($item->mapel->mata_pelajaran) }} </td>
                        <td> {{ $item->hari }} </td>
                        <td> {{ date('h:i:A', strtotime($item->waktu_mulai)) }} {{ "-" }} {{ date('h:i:A', strtotime($item->waktu_selesai)) }} </td>
                        <td> {{ ucwords($item->guru->nama) }} </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <form method="POST" action="/jadwal/{{ $item->id }}/edit">
                                            <input type="hidden" name="_method" value="GET">
                                            <button type="submit" class="btn btn-warning">
                                                <span class="fa fa-edit"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <form method="POST" action="/jadwal/{{ $item->id }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>                
                                    </div>
                                </div>
                                
                                
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

        <?php $no = 1; ?>
        @foreach ($jadwal as $item)
            <table class="table table-bordered table-jadwal-android">
                <tr>
                    <th>No</th>
                    <td>{{ $no++ }}</td>
                </tr>
                
                <tr>
                    <th>Tahun Ajaran</th>
                    <td> {{ $item->tahunAjaran->tahun_ajaran }} </td>
                </tr>

                <tr>
                    <th>Semester</th>
                    <td> {{ $item->semester }} </td>
                </tr>

                <tr>
                    <th>Nama Kelas</th>
                    <td> {{ strtoupper($item->nama_kelas) }} </td>
                </tr>

                <tr>
                    <th>Mata Pelajaran</th>
                    <td> {{ strtoupper($item->mapel->mata_pelajaran) }} </td>
                </tr>
                
                <tr>
                    <th>Hari</th>
                    <td> {{ $item->hari }} </td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td> {{ date('h:i:A', strtotime($item->waktu_mulai)) }} {{ "-" }} {{ date('h:i:A', strtotime($item->waktu_selesai)) }} </td>
                </tr>
                <tr>
                    <th>Guru</th>
                    <td> {{ ucwords($item->guru->nama) }} </td>
                </tr>                
                
                <tr>
                    <td>
                        <form method="POST" action="/jadwal/create">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-primary col-md-12">
                                <span class="fa fa-plus"></span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/jadwal/{{ $item->id }}/edit">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-warning fl mr-3">
                                <span class="fa fa-edit"></span>
                            </button>
                        </form>
                        
                        <form method="POST" action="/jadwal/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </button>
                        </form>                
                    </td>
                </tr>
            </table>
        @endforeach
    @endif

    @if(auth()->user()->role == 'siswa')
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
                                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control semester-input">
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
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
@endsection
