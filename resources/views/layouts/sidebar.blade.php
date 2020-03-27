<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item {{ setActive(['/', 'home']) }}"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
          <li class="nav-item {{ setActive(['anggota*', 'buku*', 'user*']) }}">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['anggota*', 'buku*', 'user*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['anggota*']) }}" href="{{route('user.index')}}">Data Pengguna</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['buku*']) }}" href="{{route('opd.index')}}">Data OPD</a>
              </ul>
            </div>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-abk" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">ABK</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-abk">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('abk_struktural')}}">Struktural</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('abk_fungsional')}}">Fungsional</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-account-network"></i>
              <span class="menu-title">Informasi Jabatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/trs')}}">Struktural</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Fungsional</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-informasi" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-compass"></i>
              <span class="menu-title">Daftar Jabatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-informasi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('struktural.index')}}">Struktural</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('fungsional.index')}}">Fungsional</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item {{ setActive(['transaksi*']) }}">
            <a class="nav-link" href="{{route('user.index')}}">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Pengaturan</span>
            </a>
          </li>
         
        </ul>