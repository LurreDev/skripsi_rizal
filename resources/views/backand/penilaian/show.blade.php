@extends('backand.main_layout')

@section('content') 
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>{{ \Request::path()}}</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">{{ \Request::path()}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <h3 class="card-title p-3">Hitun kebutuhan Kalori</h3>
              <div class="card-header d-flex p-0">
                <table class="table table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nama</th>
                            <th>jenis_kelamin</th>
                            <th>usia</th>
                            <th>TB/BB</th>
                            <th>Nilai IMT </th>
                            <th>Status Gizi	IMT </th>
                           <th>Kebutuhan Kalori per hari</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->jenis_kelamin }}</td>
                                <td>{{$user->usia}}</td>
                                <td>{{$user->tinggi_badan}}cm/{{$user->berat_badan}}Kg</td>
                                <td>{{$data['n_imt']}}</td>
                                <td>
                                    @if ( $data['n_imt'] <=17.0)
                                                <div class="alert alert-primary" role="alert">
                                                    <strong>Sangat Kurus!</strong> 
                                                </div>
                                    @elseif ($data['n_imt']>=17.0 && $data['n_imt'] <=18.4 )
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Kurus!</strong> 
                                    </div>
                                    @elseif ($data['n_imt']>=18.5 && $data['n_imt'] <=25.0 )
                                    <div class="alert alert-primary" role="alert">
                                                    <strong>Normal!</strong> 
                                                </div>
                                    @elseif ($data['n_imt']>=25.1 && $data['n_imt'] <=27.0 )
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Gemuk!</strong> 
                                    </div>

                                    @elseif ($data['n_imt']>=27.0 )
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Sangat Gemuk!</strong> 
                                    </div>
                                    @else 
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Sangat Gemuk!</strong> 
                                    </div>
                                    @endif

                                </td>
                             <td>
                              <div class="alert alert-danger" role="alert">
                                <strong>{{$data['nkalori_pria']}} Kal</strong> 
                            </div>
                            </td>

                            </tr>
                        </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Penilaian
                </div>
                <div class="card-body">
                                   <table class="table table-responsive">

                                            <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Alternatif</th>
                            @foreach(@$penilaianService->getKriterias() as $kriteria)
                                <th>{{$kriteria['nama_kriteria']}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(@$penilaianService->getAlternatifs() as $key => $alternatif)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$alternatif['kode_alternatif']}} - {{$alternatif['nama_alternatif']}}</td>
                                @foreach(@$penilaianService->getKriterias() as $kriteria)
                                    <td>
                                        {{ @$penilaianService->getAngkaViewList()[$alternatif['id']][$kriteria['id']] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="m-5"></div>

                    <h3 class="page-header">Tahap 1 : Mencari Nilai W</h3>
                    <hr>
                    Bobot Tiap Kriteria : <br>
                    W=[{{implode(", ", @$penilaianService->getWList())}}]

                    <div class="m-3"></div>
                    <hr>
                    Normalisasi Bobot W : <br>
                    @foreach(@$penilaianService->getUnnormalizedWList() as $key => $w_list)
                        W{{$loop->index+1}}
                        = {{@$penilaianService->getWList()[$key]}}/{{array_sum(@$penilaianService->getWList())}}
                        = {{round($w_list, 3)}}
                        <br>
                    @endforeach
                    {{--  <div class="m-3"></div>
                    <hr>
                    Normalisasi berdasarkan benefit &amp; cost :<br>
                    @foreach(@$penilaianService->getNormalizedWList() as $key => $w_list)
                        W{{$loop->index+1}}
                        = {{round($w_list, 3)}}
                        @if($w_list<0)
                        (cost)
                        @else
                            (benefit)
                        @endif
                        <br>
                    @endforeach  --}}

                    <div class="m-5"></div>

                    <h3 class="page-header">Tahap 2: Mencari Nilai S</h3>
                    <hr>
                    @foreach(@$penilaianService->getSList() as $key => $s_list)
                        S{{$loop->index+1}} =
                        @foreach($s_list as $s)
                            ({{$s[0]}} <sup>{{round($s[1], 3)}}</sup>)&nbsp;
                        @endforeach
                        &nbsp;&nbsp; = {{round(@$penilaianService->getNormalizedSList()[$key], 3)}}
                        <br>
                    @endforeach

                    <div class="m-5"></div>

                    <h3 class="page-header">Tahap 3: Mencari Nilai V</h3>
                    <hr>
                    @foreach(@$penilaianService->getNormalizedVList() as $key => $v_list)
                        V{{$loop->index+1}} =
                        {{round(@$penilaianService->getNormalizedSList()[$key], 3)}}/{{round(array_sum(@$penilaianService->getNormalizedSList()), 3)}}
                        = {{round($v_list, 3)}}
                        <br>
                    @endforeach

                    <div class="m-5"></div>

                    <h3 class="page-header">Hasil</h3>
                    <hr>
                    @php
                        $unsorted = @$penilaianService->getNormalizedVList();
                        arsort($unsorted);
                        $sorted = $unsorted;
                    @endphp


                                   <table class="table table-responsive">

                                            <thead class="thead-inverse">
cr
                        <tr>
                            <th>No.</th>
                            <th>Alternatif</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sorted as $key => $v_list)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>
                                    {{@$penilaianService->getAlternatif($key)['nama_alternatif']}}
                                    &nbsp;&nbsp;
                                    @if($loop->first)
                                        <small class="text-success"><i class="fas fa-check"></i> alternatif terbaik</small>
                                    @endif
                                </td>
                                <td>{{round($v_list, 3)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection