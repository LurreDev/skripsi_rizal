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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <button class="btn btn-danger"><a href="{{url('kelola-kriteria')}}" >Kembali</a></button>Edit Kriteria</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form action="{{ route('kelola-kriteria.update',$kriteria->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="icon">kode_kriteria</label>
                                                            <input type="text" class="form-control" id="icon" name="kode_kriteria" readonly value="{{ $kriteria->kode_kriteria }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_kriteria">nama_kriteria</label>
                                                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Detail</label>
                                                            <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}">
                                                        </div>
                                                        <input id="tipe_kriteria" type="hidden" name="tipe_kriteria" value="integer">
                                                        <input id="jenis" type="hidden" name="jenis" value="keuntungan">
                      
                                                            <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                    </div>
                                
                                </div>
                            </form>
                    </div>
          </div>
        </div>
        </div>
        </section>
@endsection

 
