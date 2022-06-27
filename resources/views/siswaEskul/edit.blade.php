@extends('layouts.app')
@section('content')
    <form method="POST" action="/siswaEskul/">
        <div class="card card-custom">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-bl">
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Mengambil Ekstrakulikuler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                {{ $siswa->nama }}
                            </td>
                            <td>
                                <select name="ekstrakulikuler_id" class="form-control">
                                    <option value="0">Belum Memilih Ekstrakulikuler</option>
                                    @foreach($eskul as $item)
                                        <option value="{{ $item->id }}" 
                                            @if($siswa->ekstrakulikuler->count() == 1)
                                                @if($eskulId->id == $item->id)
                                                    {{ 'selected' }}
                                                @endif
                                            @endif
                                        >{{ $item->ekstrakulikuler }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-success btn-block mb-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ url('/siswaEskul') }}" class="btn btn-danger btn-block">
                            <i class="fa fa-window-close"></i> Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection