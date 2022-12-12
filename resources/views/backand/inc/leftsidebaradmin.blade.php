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
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item 
                @if(url()->current() == 
                url('kelola-users') OR  
                url('kategorijasa') OR  
                url('listjasas') OR  
                url('portofolios') OR  
                url('teams')
                ) 
                menu-open 
                @endif ">
                  {{--  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Master Data
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>  --}}
                  {{--  <ul class="nav nav-treeview ">  --}}
                    <li class="nav-item">
                      <a href="{{ url('kelola-users') }}"  class="nav-link @if(url()->current() == url('kelola-users')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelola User</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('kelola-kriteria') }}"  class="nav-link @if(url()->current() == url('kelola-kriteria')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelola Kriteria</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('kelola-alternatif') }}"  class="nav-link @if(url()->current() == url('kelola-alternatif')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelola Alternatif</p>
                      </a>
                    </li>
                    {{--  <li class="nav-item">
                      <a href="{{ url('kelola-kategoris') }}"  class="nav-link @if(url()->current() == url('kelola-kategoris')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori Jasa</p>
                      </a>
                    </li>  --}}
                  {{--  <li class="nav-item">
                      <a href="{{ url('kelola-jasas') }}"  class="nav-link @if(url()->current() == url('kelola-jasas')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Jasa</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('kelola-portofolios') }}"  class="nav-link @if(url()->current() == url('kelola-portofolios')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Portofolio</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('kelola-teams') }}"  class="nav-link @if(url()->current() == url('kelola-teams')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Team</p>
                      </a>
                    </li>
                     <li class="nav-item">
                      <a href="{{ url('kelola-seos') }}"  class="nav-link @if(url()->current() == url('kelola-seos')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Seo</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('gensitemap') }}"  class="nav-link @if(url()->current() == url('gensitemap')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Generate Sitemaps</p>
                      </a>
                    </li>  --}}
                  {{--  </ul>  --}}
                {{--  </li>  --}}
               
                {{--  <li class="nav-header">Proses</li>
                <li class="nav-item">
                  <a href="{{ route('kelola-penilaian.index')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Data Uji</p>
                  </a>
                </li>  --}}
                
                <li class="nav-header">Menu Lain</li>
                {{--  <li class="nav-item">
                  <a href="{{ url('setting-profil')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Setting Akun</p>
                  </a>
                </li>  --}}
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
