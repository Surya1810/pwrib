@extends('frontend.layouts.app')

@section('title')
    Buat Agenda
@endsection

@push('css')
@endpush

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card card-outline rounded-web card-secondary">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <h3 class="card-title">Tulis Berita</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="penyelenggara"
                                        class="mb-0 form-label col-form-label-sm">Penyelenggara</label>
                                    <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                        id="penyelenggara" name="penyelenggara" placeholder="Tulis nama kegiatan"
                                        value="{{ old('penyelenggara') }}">
                                    @error('penyelenggara')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="name" class="mb-0 mt-2 form-label col-form-label-sm">Nama
                                        Kegiatan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Tulis nama kegiatan"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="date" class="mb-0 form-label col-form-label-sm">Tanggal
                                                Kegiatan</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id="time" name="date" value="{{ old('date') }}">
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="time" class="mb-0 form-label col-form-label-sm">Jam
                                                Kegiatan</label>
                                            <input type="time" class="form-control @error('time') is-invalid @enderror"
                                                id="time" name="time" value="{{ old('time') }}">
                                            @error('time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <label for="lokasi" class="mb-0 mt-2 form-label col-form-label-sm">Lokasi</label>
                                    <textarea type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                                        value="{{ old('lokasi') }}" placeholder="Tulis lokasi kegiatan" required></textarea>
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="detail" class="mb-0 mt-2 form-label col-form-label-sm">Detail</label>
                                    <textarea type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail"
                                        value="{{ old('detail') }}" placeholder="Tulis detail kegiatan" required></textarea>
                                    @error('detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning rounded-web float-right">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
