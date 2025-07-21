@extends('frontend.layouts.app')

@section('title')
    Pendaftaran Anggota
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-3">
        <h1 class="fs-3 fw-600 mb-3 text-center">Pendaftaran Anggota</h1>

        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title">Langkah-langkah Pendaftaran</h3>
                <ol class="mt-3">
                    <li>Unduh formulir pendaftaran.</li>
                    <li>Isi formulir sesuai dengan data asli.</li>
                    <li>Scan dalam bentuk PDF.</li>
                    <li>Unggah dalam 1 file dengan format ZIP yang berisi formulir dan dokumen pendukung lainnya, ukuran
                        maks. 10MB.</li>
                </ol>
            </div>
        </div>

        <h1 class="fs-3 fw-600 my-3 text-center">Formulir Pendaftaran Anggota</h1>
        <div class="row justify-content-center">
            <div class="col-6 col-md-3">
                <a href="{{ route('download.anggota') }}">
                    <div class="card bg-primary rounded-5 text-white">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-file-word"></i> Unduh
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <hr class="my-5">

        <form action="{{ route('pendaftaran.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>Upload Formulir Pendaftaran</h3>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <input name="jenis" type="hidden" value="anggota">

                                    <div class="col-12 col-md-6">
                                        <label for="name" class="mb-0 form-label col-form-label-sm">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nama sesuai KTP"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="phone" class="mb-0 form-label col-form-label-sm">Telepon</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Nomor yang dapat dihubungi"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <label class="mb-0 form-label col-form-label-sm" for="file">File <small
                                        class="text-danger">*Hanya file ZIP & Maks. 10MB</small></label>
                                <div class="input-group">
                                    <input class="form-control @error('file') is-invalid @enderror" type="file"
                                        id="file" name="file" accept=".zip" required>
                                </div>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning rounded-5 mt-4">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush
