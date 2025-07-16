@extends('backend.layouts.app')

@section('title')
    Agenda
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
                    <h1>Agenda</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Agenda</strong></li>
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
                                    <h3 class="card-title">Agenda Kegiatan</h3>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-warning rounded-web float-right"
                                        data-toggle="modal" data-target="#addAgenda"><i class="fas fa-plus"></i>
                                        Buat</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="postTable" class="table table-bordered text-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 10%">
                                            Tanggal
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Detail
                                        </th>
                                        <th style="width: 10%">
                                            Penyelenggara
                                        </th>
                                        <th style="width: 5%">
                                            Jam
                                        </th>
                                        <th style="width: 15%">
                                            Lokasi
                                        </th>
                                        <th style="width: 10%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $agenda)
                                        <tr>
                                            <td>{{ $agenda->tanggal->format('Y-m-d') }}</td>
                                            <td>{{ $agenda->nama }}</td>
                                            <td>{{ $agenda->detail }}</td>
                                            <td>{{ $agenda->penyelenggara }}</td>
                                            <td>{{ $agenda->jam->format('H:i') }}</td>
                                            <td>{{ $agenda->lokasi }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger rounded-web"
                                                    onclick="deletePost({{ $agenda->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                                <form id="delete-form-{{ $agenda->id }}"
                                                    action="{{ route('agenda.destroy', $agenda->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm btn-warning rounded-web"
                                                    data-toggle="modal" data-target="#editAgenda{{ $agenda->id }}">
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

    <!-- Modal Add Agenda-->
    <div class="modal fade" id="addAgenda" tabindex="-1" aria-labelledby="addAgendaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgendaLabel">Buat Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- <label for="penyelenggara" class="small">Penyelenggara</label>
                            <select class="form-control penyelenggara" style="width: 100%;" id="penyelenggara"
                                name="penyelenggara" required>
                                <option></option>
                                @foreach ($pengurus as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('penyelenggara') == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penyelenggara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            <label for="penyelenggara" class="mb-0 form-label col-form-label-sm">Penyelenggara</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                id="penyelenggara" name="penyelenggara" placeholder="Tulis nama kegiatan"
                                value="{{ old('penyelenggara') }}">
                            @error('penyelenggara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="name" class="mb-0 mt-2 form-label col-form-label-sm">Nama Kegiatan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Tulis nama kegiatan" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="date" class="mb-0 form-label col-form-label-sm">Tanggal Kegiatan</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="time" name="date" value="{{ old('date') }}">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="time" class="mb-0 form-label col-form-label-sm">Jam Kegiatan</label>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary rounded-web">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($agendas as $agenda)
        <!-- Modal Edit Agenda-->
        <div class="modal fade" id="editAgenda{{ $agenda->id }}" tabindex="-1" aria-labelledby="editAgendaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAgendaLabel">Ubah Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                {{-- <label for="penyelenggara" class="small">Penyelenggara</label>
                            <select class="form-control penyelenggara" style="width: 100%;" id="penyelenggara"
                                name="penyelenggara" required>
                                <option></option>
                                @foreach ($pengurus as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('penyelenggara') == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penyelenggara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                                <label for="penyelenggara" class="mb-0 form-label col-form-label-sm">Penyelenggara</label>
                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                    id="penyelenggara" name="penyelenggara" placeholder="Tulis nama kegiatan"
                                    value="{{ $agenda->penyelenggara }}">
                                @error('penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="name" class="mb-0 mt-2 form-label col-form-label-sm">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Tulis nama kegiatan"
                                    value="{{ $agenda->nama }}">
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
                                            id="time" name="date"
                                            value="{{ \Carbon\Carbon::parse($agenda->tanggal)->format('Y-m-d') }}">
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
                                            id="time" name="time"
                                            value="{{ \Carbon\Carbon::parse($agenda->jam)->format('H:i') }}">
                                        @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <label for="lokasi" class="mb-0 mt-2 form-label col-form-label-sm">Lokasi</label>
                                <textarea type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                                    value="{{ old('lokasi') }}" placeholder="Tulis lokasi kegiatan" required>{{ $agenda->lokasi }}</textarea>
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="detail" class="mb-0 mt-2 form-label col-form-label-sm">Detail</label>
                                <textarea type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail"
                                    value="{{ old('detail') }}" placeholder="Tulis detail kegiatan" required>{{ $agenda->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary rounded-web">Update</button>
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
            $('.penyelenggara').select2({
                placeholder: "Pilih Penyelenggara",
                allowClear: true,
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
