<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('images/pendidikan.png') }}" />
    <title>SIAKAD</title>
    
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src={{ asset('js/jquery.validate.min.js') }}></script>
</head>
<body>
    <header>
        <div class="header">
            <img src="{{ asset('images/pendidikan.png') }}" alt="">
            
            <p class="title1 title-header1">Sistem Informasi Akademik</p>
            <p class="title1 title-header2">Sekolah Menengan Pertama Negeri 14 Bojong Simpang</p>
            <p class="title2 title-header3">Membentuk Siswa Yang Ber`etika dan Rendah Hati Dalam Menuntut Ilmu</p>
        </div>

        <nav>
            <div id="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>  
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div id="sidebar-container" class="sidebar-expanded d-md-block">
                <ul class="list-group">  
                    <li class="dropdown-container list-group-item font-weight-bold">
                        <span class="fa fa-home text-bl"></span>
                        <a href="{{ url('home') }}" id="" class="a-hover text-bl">HOME</a>
                    </li>
                    
                    
                    @if(auth()->user()->role == 'admin')
                        <li class="dropdown-container list-group-item font-weight-bold">
                            <span class="fa fa-user-alt text-bl"></span>
                            <a href="/admin/{{ auth()->user()->id }}/edit" id="" class="a-hover text-bl">UBAH PROFIL</a>
                        </li>

                        <li class="dropdown btn-MD list-group-item font-weight-bold text-bl">
                            <span class="fa fa-server"></span>&nbsp;
                            MASTER DATA &nbsp;
                            <span class="fa fa-arrow-down"></span>
                        </li>
                        <ul class="dropdown-container MD list-btn">
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/admin') }}">ADMIN</a>
                            </li>
                            
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/pengumuman') }}">PENGUMUMAN</a>
                            </li>
                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/guru') }}">GURU</a>
                            </li>

                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/kelas') }}">KELAS</a>
                            </li>

                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/siswa') }}">SISWA</a>
                            </li>
                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/mapel') }}">MATA PELAJARAN</a>
                            </li>
                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/jadwal') }}">JADWAL</a>
                            </li>

                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/kkm') }}">KKM</a>
                            </li>
                        
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/eskul') }}">ESKUL</a>
                            </li>

                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-database text-list"></span>&nbsp;
                                <a href="{{ url('/siswaEskul') }}">ESKUL SISWA</a>
                            </li>
                        </ul>
                    @endif

                    @if(auth()->user()->role == 'admin')
                        <li class="dropdown btn-DC list-group-item font-weight-bold text-bl">
                            <span class="fa fa-server"></span>&nbsp;
                            DATA COMBO &nbsp;&nbsp;
                            <span class="fa fa-arrow-down"></span>
                        </li>
                        <ul class="dropdown-container DC list-btn">
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-list text-list"></span>&nbsp;
                                <a href="{{ url('tahunAjaran') }}">TAHUN AJARAN</a>
                            </li>
                        </ul>
                    @endif

                    @if(auth()->user()->role == 'guru')
                        <li class="dropdown-container list-group-item font-weight-bold ml--5">
                            <form method="POST" action="/guru/{{ auth()->user()->noRef }}/edit">
                                <input type="hidden" name="_method" value="GET">
                                <button type="submit" class="no-btn font-weight-bold text-bl no-outline-f">
                                    <span class="fa fa-user-alt"></span>&nbsp; UBAH PROFIL
                                </button>
                            </form>
                        </li>

                        <li class="dropdown btn-P list-group-item font-weight-bold text-bl">
                            <span class="fa fa-server"></span>&nbsp;
                            PENILAIAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa fa-arrow-down"></span>
                        </li>

                        <ul class="dropdown-container P list-btn">
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-star text-list"></span>
                                <a href="{{ url('nilaiSiswa') }}">NILAI SISWA</a>
                            </li>
                            
                            <li class="list-group-item font-weight-bold bg-bl">
                                <span class="fa fa-star text-list"></span>
                                <a href="{{ url('nilaiRapor') }}">NILAI RAPOR</a>
                            </li>
                        </ul>
                        
                        <li class="dropdown-container list-group-item font-weight-bold">
                            <span class="fas fa-print text-bl"></span>
                            <a href="{{ url('cetakRapor') }}" id="" class="a-hover text-bl">CETAK RAPOR</a>
                        </li>
                    @endif

                    @if(auth()->user()->role == 'siswa')
                        <li class="dropdown-container list-group-item font-weight-bold ml--5">
                            <form method="POST" action="/siswa/{{ auth()->user()->noRef }}/edit">
                                <input type="hidden" name="_method" value="GET">
                                <button type="submit" class="no-btn font-weight-bold text-bl no-outline-f">
                                    <span class="fa fa-user-alt"></span>&nbsp; UBAH PROFIL
                                </button>
                            </form>
                        </li>

                        <li class="dropdown-container list-group-item font-weight-bold">
                            <span class="fas fa-bullhorn text-bl"></span>&nbsp;
                            <a href="{{ url('pengumuman') }}" id="" class="a-hover no-btn font-weight-bold text-bl no-outline-f">PENGUMUMAN</a>
                        </li>

                        <li class="dropdown-container list-group-item font-weight-bold">
                            <span class="fas fa-calendar-alt text-bl"></span>&nbsp;
                            <a href="{{ url('jadwal') }}" id="" class="a-hover no-btn font-weight-bold text-bl no-outline-f">JADWAL MAPEL</a>
                        </li>

                        <li class="dropdown-container list-group-item font-weight-bold">
                            <span class="fas fa-star text-bl"></span>&nbsp;
                            <a href="{{ url('nilaiSiswa') }}" id="" class="a-hover no-btn font-weight-bold text-bl no-outline-f">NILAI</a>
                        </li>
                    @endif    
                    
                    <li class="dropdown-container list-group-item font-weight-bold ml--5">
                        <form method="POST" action="/logout">
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="no-btn font-weight-bold text-bl no-outline-f">
                                <span class="fas fa-sign-out-alt"></span> KELUAR
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
    
            <main class="col">
                <div id="content">
                    <article>
                        <section>
                            @yield('content')
                        </section>
                    </article>
                </div>
                
                <aside>
                    <article></article>
                </aside>
            </main>

            <footer>
                <p></p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/dropdown-sidebar.js') }}"></script>
    <script src={{ asset('js/form-validation.js') }}></script>
</body>
</html>