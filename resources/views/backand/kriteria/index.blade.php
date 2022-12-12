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
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab Master kriteria</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab Tambah kriteria </a></li>
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
                                <th>Nama </th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
	                         @foreach ($kriterias as $dt)

                            <tr>
                                <td>{{ $dt->kode_kriteria }}</td>
                                <td>{{ $dt->nama_kriteria }}</td>
                                <td>{{ $dt->bobot }}</td>
                                <td>
                                        <a class="btn btn-primary" href="{{ route('kelola-kriteria.edit',$dt->id) }}">Edit</a>|
                                          <form action="{{ route('kelola-kriteria.destroy',$dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
	                            </td>
                            </tr>
	                        @endforeach
                             
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Nama </th>
                              <th>detail</th>
                              <th>Aksi</th>
                            </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="col-12">
                         <form action="{{ route('kelola-kriteria.store') }}" method="POST">
    	                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="icon">kode_kriteria</label>
                                    <input type="text" required class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Enter kode_kriteria">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">nama_kriteria</label>
                                    <input type="text" required class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="nama_kriteria">
                                </div>
                              <div class="form-group">
                                <label for="nama_kriteria">bobot</label>
                                <input type="number" required class="form-control" id="bobot" name="bobot"  placeholder="isi dengan angka bebas" step="1">
                               </div>
                                  <input id="tipe_kriteria" type="hidden" name="tipe_kriteria" value="integer">
                                  <input id="jenis" type="hidden" name="jenis" value="keuntungan">

                            <!-- /.card-body -->
                            <div class="float-right">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->
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

 
