@extends('layouts.app')
@section('content')

@foreach ($mapel as $item)
    <h5 class="alert alert-info text-center">Ubah KKM : {{ $item->mata_pelajaran }}</h5>
@endforeach
        
    <form method="POST" action="/kkm" id="form_kkm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th hidden>Id</th>
                    <th hidden>Tahun Ajaran</th>
                    <th>Nama Kelas</th>
                    <th>KKM</th>
                </tr>
            </thead>

            <?php $no = 1; ?>
            <?php $no_kkm_web = 0; ?>
            @foreach($kkm as $item)
            <tbody>
                <tr>
                    <td>{{ $no++ }}</td>
                    
                    <td hidden>
                        <input 
                            type="text" 
                            name="id[]" 
                            value="{{$item->id}}"
                        >
                    </td>
                    
                    <td hidden>
                        <input 
                            type="text" 
                            name="tahunAjaran_id" 
                            value="{{$item->tahunAjaran_id}}"
                        >
                    </td>
                    
                    <td>
                        <input 
                            readonly
                            type="text" 
                            name="nama_kelas[]" 
                            value="{{$item->nama_kelas}}" 
                            class="form-control"
                        >
                    </td>
                    
                    <td>
                        <input 
                            type="number" 
                            step="1" 
                            name={{ 'kkm[' . $no_kkm_web++ . ']' }} 
                            value="{{$item->kkm}}" 
                            class="form-control kkm_input"
                        >
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-success col-md-5 fl mb-2">
            <span class="fa fa-save"></span> Simpan
        </button>
    </form>

    <form method="POST" action="/kkm/create2">
        @foreach ($data_kkm as $item)
            <p></p>
            <input hidden type="text" name="tahun_ajaran" value="{{ $tahun_ajaran_id }}">
            <input hidden type="text" name="mata_pelajaran" value="{{ $item->mapel_id }}">
        @endforeach

        @csrf
        <input type="hidden" name="_method" value="POST">
        <button type="submit" class="btn btn-danger col-md-5 fr">
            <span class="fa fa-window-close"></span> Batalkan
        </button>
    </form>
@endsection