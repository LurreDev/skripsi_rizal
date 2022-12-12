<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="http://solusiskripsi.my.id/" class="brand-link">
    <img src="{{ asset('assetadmin\dist\img\logo.png')}}"
         alt="lurre dev Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">SPK DIET</span>
  </a>
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        {{--  <img src="" class="img-circle elevation-2" alt="User Image">  --}}
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }} 
                       <span class="badge badge-info right">Online</span>
        </a>
      </div>
    </div>

       <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column">
              <li class="nav-item">
                <a href="{{ url('home') }}"  class="nav-link @if(url()->current() == url('home')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting-data') }}"  class="nav-link @if(url()->current() == url('setting-data')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pilih-menu') }}"  class="nav-link @if(url()->current() == url('pilih-menu')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses rekomendasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('hasil-rekomendasi') }}"  class="nav-link @if(url()->current() == url('hasil-rekomendasi')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil rekomendasi</p>
                </a>
              </li>
                 
              <li class="nav-item">
                <a href="{{ url('logout')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Keluar</p>
                </a>
              </li>
 
              
        </ul>
      </nav>
  </div>
</aside>
