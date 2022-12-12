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
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Tabs</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab Master Pengguna</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                     <div class="col-12">
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                   {{ $message }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>usia</th>
                                <th>berat_badan</th>
                                <th>tinggi_badan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
	                         @foreach ($data as $users)

                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->jenis_kelamin }}</td>
                                <td>{{ $users->usia }}</td>
                                <td>{{ $users->berat_badan }}</td>
                                <td>{{ $users->tinggi_badan }} Meter</td>
                                <td>
                                    <a target="_blank" href="{{ route('kelola-users.show', $users->id)}}" class="btn btn-primary">Detail</a>
	                              </td>
                            </tr>
	                        @endforeach
                             
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Nohp</th>
                              <th>Akses</th>
                              <th>Aksi</th>
                            </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
 
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection