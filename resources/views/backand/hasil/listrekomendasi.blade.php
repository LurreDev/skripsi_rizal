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
                <h3 class="card-title p-3">Hitung kebutuhan Kalori</h3>
              <div class="card-header d-flex p-0">
                <table class="table table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nama</th>
                            <th>jenis_kelamin</th>
                            <th>usia</th>
                            <th>Berat badan Asal</th>
                            <th>Berat badan Target</th>
                            <th>TB</th>
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
                                <td>{{$user->berat_badan}}Kg</td>
                                <td>{{$user->berat_badan_target}}Kg</td>
                                <td>{{$user->tinggi_badan}}CentiMeter</td>
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
                                <strong>{{$data['nkalori']}} Kal</strong> 
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
                <h3 class="card-title p-3">Daftar List Hasil Rekomendasi Menu Makanan dalam satu hari</h3>
                    <div class="card-tools">
                        @if ($hasilRekomendasi->count()==3)
                         @else
                        <a href="{{ url('pilih-menu')}}" type="button" class="btn btn-primary">Tambah Lagi </a>
                         @endif
                        <a href="{{ url('hapus-hasil-rekomendasi')}}" type="button" class="btn btn-danger">Hapus Rekomendasi </a>
                    </div>
                </div>
                <div class="card-body" id='printMe'>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                   {{ $message }}
                    </div>
                     @endif
                   
                            @if ($hasilRekomendasi->count()<=3)
                                  @forelse ($hasilRekomendasi as $item)
                                  @if ($loop->iteration==1)
                                  <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-info" role="alert">
                                             <h4>Pagi</h4>
                                        </div>
                                    <img class="img-fluid" src="{{ asset('assetadmin/dist/img/pagi.png')}}" width="25%" alt="">
                                        <h6 class="card-text">{{ $item->alternatif->nama_alternatif}}</h6>
                                        <h6 class="card-text">{{ $item->jumlah_kalori}} Kalori</h6>
                                    </div>
                                </div>
                                  @endif
                                  @if ($loop->iteration==2)
                                  <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-danger" role="alert">
                                            <h4>siang</h4>
                                       </div>
                                    <img class="img-fluid" src="{{ asset('assetadmin/dist/img/siang.png')}}" width="25%" alt="">
                                    <h6 class="card-text">{{ $item->alternatif->nama_alternatif}}</h6>
                                    <h6 class="card-text">{{ $item->jumlah_kalori}} Kalori</h6>
                                    </div>
                                  </div>
                                  @endif
                                  @if ($loop->iteration==3)
                                  <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-success" role="alert">
                                            <h4>sore</h4>
                                       </div>
                                    <img class="img-fluid" src="{{ asset('assetadmin/dist/img/malam.png')}}" width="25%" alt="">
                                    <h6 class="card-text">{{ $item->alternatif->nama_alternatif}}</h6>
                                        <h6 class="card-text">{{ $item->jumlah_kalori}} Kalori</h6>
                                    </div>
                                    </div>
                                  @endif
                                  @empty
                                  <h5>Tidak ada data</h5>
                                  @endforelse 
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <div class="alert bg-warning" role="alert">
                                        <h4>Total Kalori</h4>
                                        <h6  class="card-text"> {{ $totalkalori}}</h6>
                                        <h6  class="card-text">Sisa Kalori  :</h6>
                                        <h6  class="card-text"> {{$data['nkalori']}}-{{ $totalkalori}} ={{ $data['nkalori']-$totalkalori}} Kalori</h6>
                                   </div>
                                </div>
                                </div>
                    </table>
                </div>
                <div class="p-5 align-right">
                    <button onclick="printDiv('printMe')" class="btn btn-primary float-right">Cetak Hasil</button>
                </div>
                <br>
                </div>
        </div>

    </section>
   
    <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection