<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PWRI-B | Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style_fe.css') }}">
</head>

<body>
    <main style="width: 100%">
        <div class="background">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center" style="height: 100svh;">
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="{{ asset('assets/img/logo/light/main.png') }}" alt="logo_main">
                        </div>
                        <div class="card p-3 border-0 shadow rounded-4">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="my-3">
                                        <label for="name" class="form-label col-form"
                                            style="font-weight: 500">{{ __('Nama Lengkap') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Nama lengkap sesuai KTP">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <label for="nik" class="form-label col-form"
                                            style="font-weight: 500">{{ __('NIK') }}</label>
                                        <input id="nik" type="text"
                                            class="form-control @error('nik') is-invalid @enderror" name="nik"
                                            value="{{ old('nik') }}" required autocomplete="nik" autofocus
                                            placeholder="Nomor Induk Kependudukan">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <label for="phone" class="form-label col-form"
                                            style="font-weight: 500">{{ __('Nomor Hp') }}</label>
                                        <input id="phone" type="number" min="0"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                            placeholder="000000000000">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <label for="email" class="form-label col-form"
                                            style="font-weight: 500">{{ __('Email') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="email@gmail.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="my-3">
                                        <label for="password" class="form-label col-form"
                                            style="font-weight: 500">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="******">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <label for="password-confirm" class="form-label col-form"
                                            style="font-weight: 500">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="******">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">
                                            Setuju dengan <a href="#" class="text-decoration-none"
                                                style="font-weight: 500">ketentuan</a> yang berlaku
                                        </label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary px-3 rounded-5 w-100"
                                            style="font-weight: 500;font-size: 15px">
                                            {{ __('Daftar') }}
                                        </button>
                                    </div>
                                </form>
                                <p class="text-secondary line my-5"><span> <strong>Atau</strong> </span></p>
                                <div class="text-center text-secondary mb-3">Sudah punya akun? <a
                                        href="{{ route('login') }}" class="text-decoration-none"
                                        style="font-weight: 500">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- REQUIRED SCRIPTS -->
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>

</html>
