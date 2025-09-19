<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="PWRIB, pwrib pusat, wartawan, indonesia, bersatu">
    <meta name="author" content="Perkumpulan Wartawan Republik Indonesia Bersatu">

    <title>@yield('title') | PWRIB - Perkumpulan Wartawan Republik Indonesia Bersatu</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/FontAwesome/6.2.1/css/all.min.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('favicons/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicons/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="PWRIB" />
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style_fe.css') }}">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/4ce77u0y45a0kxjxqgmq8hyqdgrqd8pdetaervdmri41d1qa/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#desc',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist | code | table | alignleft aligncenter alignright alignjustify | indent outdent'
        });
    </script>

    <style>
        .background-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('{{ asset('assets/img/background/1.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .background-wrapper::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>

    <style>
        /* Default untuk layar besar (≥1400px) */
        .floating-ad {
            width: 160px;
            height: auto;
        }

        /* Laptop sedang (≥992px dan <1400px) */
        @media (max-width: 1399px) {
            .floating-ad {
                width: 100px;
                height: auto;
            }
        }

        /* Laptop kecil (≥992px dan <1200px) */
        @media (max-width: 1199px) {
            .floating-ad {
                width: 80px;
                height: auto;
            }
        }
    </style>
    @stack('css')
</head>

<body style="padding-top: 85px">
    <div class="background-wrapper"></div>
    @php
        $time = Carbon\Carbon::now();
    @endphp
    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}">
                <img src="{{ asset('assets/img/logo/main_logo.png') }}" alt="PWRIB" height="60">
                <div class="ms-2 lh-sm">
                    <div class="fw-bold text-warning">PWRIB</div>
                    <div class="text-warning d-block">
                        <span class="d-block d-md-inline"
                            style="font-size: 12px; font-size: clamp(12px, 2vw, 0.75rem);">
                            Perkumpulan Wartawan
                        </span>
                        <span class="d-block d-md-inline"
                            style="font-size: 12px; font-size: clamp(12px, 2vw, 0.75rem);">
                            Republik Indonesia Bersatu
                        </span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-white" aria-current="page"
                            href="{{ route('landing') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle text-white" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('tentang') }}">Tentang PWRIB</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengurus') }}">Daftar Pengurus</a></li>
                            <li><a class="dropdown-item" href="{{ route('pendaftaran.pengurus') }}">Pendaftaran
                                    DPD/DPC</a></li>
                            <li><a class="dropdown-item" href="{{ route('agenda') }}">Agenda Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle text-white" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Keanggotaan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('anggota') }}">Daftar Anggota</a></li>
                            <li><a class="dropdown-item" href="{{ route('pendaftaran.anggota') }}">Pendaftaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-white" aria-current="page" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <button
                                class="nav-link dropdown-toggle mx-2 text-white {{ request()->is('keanggotaan*') ? 'active' : '' }}"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('berita.create') }}">Buat Berita</a></li>
                                <li><a class="dropdown-item" href="{{ route('agenda.create') }}">Buat Agenda</a></li>
                                <li><a class="dropdown-item" href="{{ route('video.create') }}">Unggah Video</a></li>
                                <li><a class="dropdown-item" href="{{ route('pengumuman.create') }}">Unggah
                                        Pengumuman</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('anggota.index') }}">Cek Pendaftaran</a>
                                </li> --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="nav-scroller bg-warning shadow-sm">
        <div class="container">
            <nav class="nav" aria-label="Secondary navigation">
                <a class="nav-link active text-decoration-none"
                    aria-current="page"><strong>{{ $time->toFormattedDateString() }}</strong></a>
                <a class="nav-link text-black"><i class="fa-solid fa-envelope"></i> hi.pwrib@gmail.com</a>
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
                    <a href="{{ route('landing') }}"
                        class="d-flex align-items-center mb-5 link-body-emphasis text-decoration-none">
                        <img src="{{ asset('assets/img/logo/main_logo.png') }}" alt="PWRIB" height="80">
                        <div class="ms-2 lh-sm">
                            <div class="fw-bold text-warning fs-4">PWRIB</div>
                            <div class="text-warning">
                                <span class="d-block d-md-inline" style="font-size: 12px;">
                                    Perkumpulan Wartawan
                                </span>
                                <span class="d-block d-md-inline" style="font-size: 12px;">
                                    Republik Indonesia Bersatu
                                </span>
                            </div>
                        </div>
                    </a>

                    <p class="text-light">
                        <i class="fa-solid fa-location-dot me-3"></i>
                        Jl. Tubagus Ismail VIII No.41 RT.002 RW.010, Kelurahan Sekeloa, Kecamatan Coblong, Kota
                        Bandung
                    </p>
                    <p class="text-light">
                        <i class="fa-solid fa-envelope-open-text me-3"></i>
                        hi.pwrib@gmail.com
                    </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-6 col-md-3 mb-3">
                    <h5 class="text-warning">PROFIL</h5>
                    <hr class="text-light">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('tentang') }}"
                                class="nav-link p-0 text-light">Tentang PWRIB</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('pengurus') }}"
                                class="nav-link p-0 text-light">Struktur Organisasi</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('pendaftaran.pengurus') }}"
                                class="nav-link p-0 text-light">Pendaftaran DPD/DPC</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('agenda') }}"
                                class="nav-link p-0 text-light">Agenda Kegiatan</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('kontak') }}"
                                class="nav-link p-0 text-light">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <h5 class="text-warning">KEANGGOTAAN</h5>
                    <hr class="text-light">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('anggota') }}"
                                class="nav-link p-0 text-light">Daftar Anggota</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('pendaftaran.anggota') }}"
                                class="nav-link p-0 text-light">Pendaftaran</a>
                        </li>
                        @auth
                        @else
                            <li class="nav-item mb-2"><a href="{{ route('login') }}"
                                    class="nav-link p-0 text-light">Login - Admin</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="row text-center pt-4 mt-4 mb-3 border-top text-light">
                <small>&copy; Copyright 2025 <strong class="text-warning">PWRIB</strong> - All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button type="button" class="btn btn-dark btn-floating btn-lg shadow-lg " id="btn-back-to-top"
        aria-label="Back to Top">
        <i class="fas fa-angle-up fa-2xl text-center" style="color: #1e1e1e"></i>
    </button>

    @include('components.ads')

    <!-- REQUIRED SCRIPTS -->
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

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

    <!-- Sweetalert2 -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })

        @if (session('pesan'))
            @switch(session('level-alert'))
                @case('alert-success')
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-danger')
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-warning')
                Toast.fire({
                    icon: 'warning',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-question')
                Toast.fire({
                    icon: 'question',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @default
                Toast.fire({
                    icon: 'info',
                    title: '{{ Session::get('pesan') }}'
                })
            @endswitch
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: '{{ $error }}'
                })
            @endforeach
        @endif
    </script>

    @stack('scripts')
</body>

</html>
