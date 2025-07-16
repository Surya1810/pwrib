@extends('backend.layouts.app')

@section('title')
    Pengurus
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengurus</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Pengurus</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline rounded-web card-secondary text-sm">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Daftar Pengurus</h3>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-warning rounded-web float-right"
                                        data-toggle="modal" data-target="#addPengurus"><i class="fas fa-plus"></i>
                                        Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="postTable" class="table table-bordered text-nowrap text-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Jabatan
                                        </th>
                                        <th style="width: 20%">
                                            Foto
                                        </th>
                                        <th style="width: 10%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penguruses as $pengurus)
                                        <tr>
                                            <td>{{ $pengurus->nama }}</td>
                                            <td>{{ $pengurus->jabatan }}</td>
                                            <td><img src="{{ asset('storage/photo/' . $pengurus->photo) }}" alt="Gambar"
                                                    width="100"></td>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger rounded-web"
                                                    onclick="deletePost({{ $pengurus->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                                <form id="delete-form-{{ $pengurus->id }}"
                                                    action="{{ route('pengurus.destroy', $pengurus->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm btn-warning rounded-web"
                                                    data-toggle="modal" data-target="#editPengurus{{ $pengurus->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Add Pengurus-->
    <div class="modal fade" id="addPengurus" tabindex="-1" aria-labelledby="addPengurusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPengurusLabel">Tambah Pengurus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="mb-0 mt-2 form-label col-form-label-sm">Nama Pengurus</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Tulis nama pengurus" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="jabatan" class="mb-0 mt-2 form-label col-form-label-sm">Jabatan Pengurus</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                name="jabatan" placeholder="Tulis nama kegiatan" value="{{ old('jabatan') }}">
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="mb-0 form-label col-form-label-sm" for="photo">Thumbnail</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="photo">Pilih file</label>
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                        id="photo" name="photo"
                                        accept="image/png, image/jpeg, image/jpg, image/webp">
                                    <small class="text-danger">*Thumbnail ratio 4:3</small>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary rounded-web">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($penguruses as $pengurus)
        <!-- Modal Edit Pengurus-->
        <div class="modal fade" id="editPengurus{{ $pengurus->id }}" tabindex="-1" aria-labelledby="editPengurusLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPengurusLabel">Ubah Pengurus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama" class="mb-0 mt-2 form-label col-form-label-sm">Nama Pengurus</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Tulis nama pengurus"
                                    value="{{ $pengurus->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="jabatan" class="mb-0 mt-2 form-label col-form-label-sm">Jabatan
                                    Pengurus</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" placeholder="Tulis nama kegiatan"
                                    value="{{ $pengurus->nama }}">
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label class="mb-0 form-label col-form-label-sm" for="photo">Thumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="photo">Pilih file</label>
                                        <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                            id="photo" name="photo"
                                            accept="image/png, image/jpeg, image/jpg, image/webp">
                                        <small class="text-danger">*Thumbnail ratio 4:3</small>
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary rounded-web">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
            $('#postTable').DataTable({
                "paging": true,
                'processing': true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                // "scrollX": true,
                // width: "700px",
                // columnDefs: [{
                //     className: 'dtr-control',
                //     orderable: false,
                //     targets: -8
                // }]
            });
        });

        function deletePost(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
