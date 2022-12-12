@extends('backand.main_layout')


@section('content_header')
    <h1 class="m-0 text-dark">Data Alternatif</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{route('kelola-alternatif.create')}}" class="btn btn-primary btn-sm">
                            Tambah Alternatif
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        index                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@$alternatifs && $alternatifs->count())
                            @foreach($alternatifs as $key => $alternatif)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$alternatif['kode_alternatif']}}</td>
                                    <td>{{$alternatif['nama_alternatif']}}</td>
                                    <td>
                                        <a href="{{route('kelola-alternatif.isi', $alternatif)}}" class="btn btn-primary btn-sm">
                                            Isi
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('kelola-alternatif.edit', $alternatif)}}" class="btn btn-success btn-sm">
                                            Ubah
                                        </a>
                                        <form action="{{route('kelola-alternatif.destroy' , $alternatif)}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit" name="submit" value="Hapus" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(".datatable").DataTable();
    </script>
@endpush
