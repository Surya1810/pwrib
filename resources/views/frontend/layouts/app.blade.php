<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="PWRIB, pwrib pusat, wartawan, indonesia, bersatu">
    <meta name="author" content="Persatuan Wartawan Republik Indonesia Bersatu">

    <title>@yield('title') | PWRIB - Persatuan Wartawan Republik Indonesia Bersatu</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/FontAwesome/6.2.1/css/all.min.css') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style_fe.css') }}">

    @stack('css')
</head>

<body>
    @php
        $time = Carbon\Carbon::now();
    @endphp
    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-4 shadow" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('assets/img/logo/light/main.png') }}" alt="PWRIB" height="24">
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-2" aria-current="page" href="{{ route('landing') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah</a></li>
                            <li><a class="dropdown-item" href="{{ route('visi_misi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengurus') }}">Pengurus</a></li>
                            <li><a class="dropdown-item" href="{{ route('staff') }}">Staff</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Informasi Publik</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('berita') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('siaran_pers') }}">Siaran Pers</a></li>
                            <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                            <li><a class="dropdown-item" href="{{ route('program') }}">Program</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('agenda') }}">Agenda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Anggota</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dpd') }}">Dewan Pengurus Daerah</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('dpc') }}">Dewan Pengurus Cabang</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('data') }}">Data Anggota</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Pendaftaran Anggota</a></li>
                            <li><a class="dropdown-item" href="{{ route('informasi_iuran') }}">Informasi Iuran</a></li>
                            <li><a class="dropdown-item" href="{{ route('ukw') }}">Uji Kompetensi Wartawan</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Masuk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Pelaporan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('etik') }}">Pelaporan Etik</a></li>
                            <li><a class="dropdown-item" href="{{ route('seksual') }}">Pelaporan Kekerasan
                                    Seksual</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="nav-scroller bg-body shadow-sm">
        <div class="container">
            <nav class="nav" aria-label="Secondary navigation">
                <a class="nav-link active text-decoration-none"
                    aria-current="page">{{ $time->toFormattedDateString() }}</a>
                {{-- <a class="nav-link" href="#">
                    Friends
                    <span class="badge text-bg-light rounded-pill align-text-bottom">27</span>
                </a> --}}
                <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> 0895-</a>
                <a class="nav-link" href="#"><i class="fa-solid fa-envelope"></i> sekretariat@pwrib.or.id</a>
                <a class="nav-link" href="#"><i class="fa-brands fa-twitter"></i> @username</a>
                <a class="nav-link" href="#"><i class="fa-brands fa-facebook-f"></i> @username</a>
                <a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i> @username</a>
                <a class="nav-link" href="#"><i class="fa-brands fa-instagram"></i> @username</a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main style="min-height: 100svh">
        @yield('content')
    </main>

    <!-- Main Footer -->
    <footer class="bg-dark">
        <div class="container pt-5 pb-2">
            <div class="row">
                <div class="col-12 col-md-5 mb-3">

                </div>
                <div class="col-md-1"></div>
                <div class="col-4 col-md-2 mb-3">
                    <h5 class="text-secondary">TENTANG KAMI</h5>
                    <hr class="text-secondary">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('sejarah') }}"
                                class="nav-link p-0 text-white">Sejarah</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('visi_misi') }}"
                                class="nav-link p-0 text-white">Visi & Misi</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('pengurus') }}"
                                class="nav-link p-0 text-white">Pengurus</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('staff') }}"
                                class="nav-link p-0 text-white">Staff</a></li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 mb-3">
                    <h5 class="text-secondary">PROGRAM</h5>
                    <hr class="text-secondary">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-white">Belum ada</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 mb-3">
                    <h5 class="text-secondary">ANGGOTA</h5>
                    <hr class="text-secondary">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('dpd') }}"
                                class="nav-link p-0 text-white">Dewan Pengurus Daerah</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('dpc') }}"
                                class="nav-link p-0 text-white">Dewan Pengurus Cabang</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('data') }}" class="nav-link p-0 text-white">Data
                                Anggota</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('register') }}"
                                class="nav-link p-0 text-white">Pendaftaran</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('informasi_iuran') }}"
                                class="nav-link p-0 text-white">Informasi
                                Iuran</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('ukw') }}" class="nav-link p-0 text-white">Uji
                                Kompetensi Wartawan</a></li>
                    </ul>
                </div>
            </div>
            <div class="row text-center pt-4 mt-4 mb-3 border-top text-white">
                <small>&copy; Copyright 2024 <strong style="color: red">PWRIB</strong> - All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button type="button" class="btn btn-dark btn-floating btn-lg shadow-lg " id="btn-back-to-top"
        aria-label="Back to Top">
        <i class="fas fa-angle-up fa-2xl text-center" style="color: #FFFFFF"></i>
    </button>

    <!-- REQUIRED SCRIPTS -->

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        (() => {
            'use strict'

            document.querySelector('#navbarSideCollapse').addEventListener('click', () => {
                document.querySelector('.offcanvas-collapse').classList.toggle('open')
            })
        })()
    </script>
    <script>
        //Back to Top Button
        let mybutton = document.getElementById("btn-back-to-top");

        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    @stack('scripts')
</body>

</html>
