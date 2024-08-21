@extends('backend.layouts.app')

@section('title')
    Category & Tag
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
                    <h1>Category & Tag</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Category & Tag</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-outline rounded-web card-secondary">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Category List</h3>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="float-right btn btn-sm btn-primary rounded-web"
                                        data-toggle="modal" data-target="#addCategory">
                                        <i class="fas fa-plus"></i> Create
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="categoryTable" class="table table-bordered text-nowrap text-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Slug
                                        </th>
                                        <th style="width: 10%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning rounded-web"
                                                    data-toggle="modal" data-target="#editCategory{{ $category->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger rounded-web"
                                                    onclick="deleteCategory({{ $category->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                                <form id="delete-form-{{ $category->id }}"
                                                    action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-outline rounded-web card-secondary">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Tag List</h3>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="float-right btn btn-sm btn-primary rounded-web"
                                        data-toggle="modal" data-target="#addTag">
                                        <i class="fas fa-plus"></i> Create
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tagTable" class="table table-bordered text-nowrap text-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Slug
                                        </th>
                                        <th style="width: 10%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning rounded-web"
                                                    data-toggle="modal" data-target="#editTag{{ $tag->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger rounded-web"
                                                    onclick="deleteTag({{ $tag->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                                <form id="delete-tag-{{ $tag->id }}"
                                                    action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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

    <!-- Modal Add Category-->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="mb-0 form-label col-form-label-sm">Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter category name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary rounded-web">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Add Tag-->
    <div class="modal fade" id="addTag" tabindex="-1" aria-labelledby="addTagLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagLabel">Add New Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="mb-0 form-label col-form-label-sm">Tag</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter tag name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary rounded-web">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Category-->
    @foreach ($categories as $category)
        <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="mb-0 form-label col-form-label-sm">Category</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter project name"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning rounded-web">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Edit Tag-->
    @foreach ($tags as $tags)
        <div class="modal fade" id="editTag{{ $tag->id }}" tabindex="-1" aria-labelledby="editTagLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTagLabel">Edit Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="mb-0 form-label col-form-label-sm">Tag</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter project name"
                                    value="{{ $tag->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning rounded-web">Update</button>
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
            $('#categoryTable').DataTable({
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

        $(function() {
            $('#tagTable').DataTable({
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

        function deleteCategory(id) {
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

        function deleteTag(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-tag-' + id).submit();
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
