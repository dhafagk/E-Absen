  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ (Request::is('/')) ? "active" : "" }}">
          <a href="{{ url('/') }}">
            <i class="fa fa-dashboard"></i> <span>Menu Utama</span>
          </a>
        </li>
        <li class="{{ ((Route::Current()->getName() == 'siswa.index') || Route::Current()->getName() == 'siswa.create' || Route::Current()->getName() == 'siswa.edit') ? "active" : "" }}">
          <a href="{{ route('siswa.index') }}">
            <i class="fa fa-user"></i>
            <span>Siswa</span>
          </a>
        </li>
        @if(Auth::user()->level == 0)
        <li class="{{ (Route::Current()->getName() == 'guru.index' || Route::Current()->getName() == 'guru.create') ? "active" : "" }}">
          <a href="{{ route('guru.index') }}">
            <i class="fa fa-user"></i> <span>Guru</span>
          </a>
        </li>
        <li class="{{ (Route::Current()->getName() == 'kelas.index' || Route::Current()->getName() == 'kelas.create') ? "active" : "" }}">
          <a href="{{ route('kelas.index') }}">
            <i class="fa fa-user"></i> <span>Kelas</span>
          </a>
        </li>
        @endif
        <li class="{{ (Route::Current()->getName() == 'absen.index' || Route::Current()->getName() == 'absen.create' || Route::Current()->getName() == 'absen.edit') ? "active" : "" }}">
          <a href="{{ route('absen.index') }}">
            <i class="fa fa-user"></i> <span>Absen Siswa</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>