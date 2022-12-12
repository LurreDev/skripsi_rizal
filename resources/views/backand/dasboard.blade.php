@extends('backand.main_layout')
@section('content') 

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard  
        </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="badge bg-primary text-wrap" >
                 <h1>  Sistem Pendukung Keputusan Pemilihan Makanan Penunjang Saat Diet Menggunakan Metode Weigted product Berbasis Web</h1> 
                </div>
                  {{--  <h3 class="align-justify mb-0">
                  </h3>  --}}
                  <p class="mb-0">
                      Silahkan pilih menu disamping untuk melakukan pengolahan data
                  </p>
                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                      
                  </div>
              @endif
                  @if (Auth::user()->usia==0)
                  <div class="alert alert-danger" role="alert">
                    <strong>Silahkan melangkapi data anda</strong>
                  </div>
                      
                  @endif
                  <img class="img-fluid" src="{{asset('assetadmin/dist/img/home.jpg')}}" alt="">
              </div>
          </div>
      </div>
  </div>
  </div>
</section>
  @endsection
