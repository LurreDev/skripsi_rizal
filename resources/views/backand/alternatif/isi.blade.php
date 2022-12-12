@extends('backand.main_layout')
{{--  @extends('adminlte::page')  --}}
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{@$alternatif['kode_alternatif']}}</h3>

                    <p class="text-muted text-center">{{@$alternatif['nama_alternatif']}}</p>

                    <button href="" class="btn btn-primary btn-block btn-sm" onclick="submitForm(event)"><b>Simpan</b></button>

                    <a href="{{route('kelola-alternatif.index')}}" class="btn btn-default btn-block btn-sm"><b>Kembali ke Alternatif</b></a>


                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body ">
                    <form action="{{route('kelola-alternatif.save_isi', $alternatif)}}" method="post" id="form-isi">
                        @csrf
                        <table class="table table-hover table-bordered datatable table-responsive">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@$kriterias && $kriterias->count())
                            @foreach($kriterias as $key => $kriteria)
                                @php
                                    $pilihan = $alternatif->bobot_alternatif_kriteria()->where('kriteria_id', $kriteria['id'])->first();
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$kriteria['kode_kriteria']}} - {{$kriteria['nama_kriteria']}}</td>
                                    <td>
                                        @if($kriteria['tipe_kriteria']=='integer')
                                            <input type="number" class="form-control" name="kriteria[{{$kriteria['id']}}]"
                                                   placeholder="Isi dengan bilangan bulat" step="1" autocomplete="off" value="{{$pilihan['nilai']}}"
                                            >
                                        @endif
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <script>
        $(".select2-kriteria").select2();
        function submitForm(event) {
            event.preventDefault();
            $("#form-isi").submit();
        }
  </script>