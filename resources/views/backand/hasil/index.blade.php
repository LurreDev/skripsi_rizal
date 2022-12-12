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
                            <th>BB</th>
                            <th>BB Target</th>
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
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
               {{ $message }}
                </div>
            @endif
                <div class="card-header">
                         <form method="post" action="{{ route('pilih-menu.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="22">Pilih Menu makanan minimal 5 jenis menu makanan</label>
                                <select id="22" class="form-control" name="id_alternatif">
                                    @foreach ($dataalternatif as $item)
                                    <option value="{{$item->id}}">{{$item->nama_alternatif}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Pilih</button>
                         </form>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Nama Makanan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($pilihanmakanan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->nama_alternatif}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                        <div class="card-footer">
                            <a href="{{ url('pilih-menu-reset')}}"  class="btn btn-danger">Reset</a>
                            <a   class="btn btn-info" href="{{ route('pilih-menu.show', Auth::user()->id)}}" role="button">Proses </a>
                        </div>
                </div>
            </div>
        </div>

    </section>
@endsection