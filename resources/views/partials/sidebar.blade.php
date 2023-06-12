<div class="main-sidebar bg-dark">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-3">
            {{--  <a href="">{{ config('app.name') }}</a>  --}}
            <img src="{{ asset('assets/web/sis.jpg') }}" alt="logo sekolah" width="70px">
            <p>SISEKOLAH</</p>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
        </div>
        <ul class="sidebar-menu">

            @if (Auth::check() && Auth::user()->roles == 'admin')
            <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>


            <li class="{{ request()->routeIs('jurusan.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jurusan.index') }}"><i class="fas fa-book"></i> <span>Jurusan</span></a></li>
            <li class="{{ request()->routeIs('mapel.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mapel.index') }}"><i class="fas fa-book"></i> <span>Mata Pelajaran</span></a></li>
            <li class="{{ request()->routeIs('guru.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-user"></i> <span>Guru</span></a></li>
            <li class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelas.index') }}"><i class="far fa-building"></i> <span>Kelas</span></a></li>
            <li class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Siswa</span></a></li>
            <li class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jadwal.index') }}"><i class="fas fa-calendar"></i> <span>Jadwal</span></a></li>
            {{-- <li class="{{ request()->routeIs('pembayaran') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fas fa-calendar"></i><span>Pembayaran</span></a></li> --}}
             <li class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengumuman.index') }}"><i class="fas fa-calendar"></i><span>Pengumuman</span></a></li>

            <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>User</span></a></li>




              </div>

            @elseif (Auth::check() && Auth::user()->roles == 'guru')
            <li class="{{ request()->routeIs('guru.dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('guru.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Data Akademik</li>
            <li class="{{ request()->routeIs('materi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('materi.index') }}"><i class="fas fa-book"></i> <span>Materi</span></a></li>
            <li class="{{ request()->routeIs('tugas.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tugas.index') }}"><i class="fas fa-list"></i> <span>Tugas</span></a></li>
            <li class="{{ request()->routeIs('absensi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('absensi.index') }}"><i class="fas fa-calendar-check"></i><span>Absensi</span></a></li>
            <li class="{{ request()->routeIs('bayaran.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('bayaran.index') }}"></i><i class="fas fa-money-check-alt"></i><span>Pembayaran</span></a></li>


            @elseif (Auth::check() && Auth::user()->roles == 'siswa')
            <li class="{{ request()->routeIs('siswa.dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->routeIs('materi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.materi') }}"><i class="fas fa-book"></i> <span>Materi</span></a></li>
            <li class="{{ request()->routeIs('tugas.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.tugas') }}"><i class="fas fa-list"></i> <span>Tugas</span></a></li>
            {{-- <li class="{{ request()->routeIs('nilai') ? 'active' : '' }}"><a class="nav-link" href="{{ route('nilai.index') }}"><i class="fas fa-book"></i><span>Penilaian Siswa</span></a></li> --}}
            {{-- <li class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengumuman.index') }}"><i class="fas fa-calendar"></i><span>Pengumuman</span></a></li> --}}

            {{-- <li class="{{ request()->routeIs('absensi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('absensi.absensi-siswa') }}"><i class="fas fa-book"></i> <span>Absensi</span></a></li> --}}

            @endif

        </ul>
    </aside>
</div>
