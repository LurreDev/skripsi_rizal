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
            <div class="card">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
             {{ $message }}
              </div>
                    @endif
                    <div class="col-12">
                      <form action="{{ route('kelola-users.update',$getuser->id) }}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="">
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Usia</label>
                          <div class="input-group"  >
                            <input class="form-control" id="password"  name="usia" type="text" value="{{$getuser->usia}}"><br>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Berat Badan</label>
                          <div class="input-group" >
                            <input class="form-control" id="password"  name="berat_badan" type="number" value="{{$getuser->berat_badan}}"><br>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Berat Badan Target</label>
                          <div class="input-group" >
                            <input class="form-control"  name="berat_badan_target" type="number" value="{{$getuser->berat_badan_target}}"><br>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tinggi Badan (Centimeter)</label>
                          <div class="input-group" >
                            <input class="form-control" id="password"  name="tinggi_badan" type="text" value="{{$getuser->tinggi_badan}}"><br>
                          </div>
                        </div>
                        <div class="p-2"></div>
                            <div class="float-right">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
            </div>
          </div>
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){  
  $('#show-password').click(function(){
   if($(this).is(':checked')){
    $('#password').attr('type','text');
   }else{
    $('#password').attr('type','password');
   }
  });
 });
</script>