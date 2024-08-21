@extends('backend.layouts.app')

@section('title')
    Post Edit
@endsection

@push('css')
    <script src="https://cdn.tiny.cloud/1/4ce77u0y45a0kxjxqgmq8hyqdgrqd8pdetaervdmri41d1qa/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#body', // Replace this CSS selector to match the placeholder element for TinyMCE
            // plugins: 'powerpaste advcode code table lists checklist',
            // toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | alignleft aligncenter alignright alignjustify | outdent indent'
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Post Edit</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline rounded-web card-secondary">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <h3 class="card-title">Title</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="mb-0 form-label col-form-label-sm">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Enter post title"
                                        value="{{ $post->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-group">
                                        <label class="mb-0 form-label col-form-label-sm" for="thumbnail">Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                                                <input class="form-control @error('thumbnail') is-invalid @enderror"
                                                    type="file" id="thumbnail" name="thumbnail"
                                                    accept="image/png, image/jpeg, image/jpg, image/webp">
                                                <small class="text-danger">*Thumbnail ratio 4:3</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline rounded-web card-secondary">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <h3 class="card-title">Info</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="m-0 form-label col-form-label-sm" for="categories">Categories</label>
                                    <select
                                        class="form-control categories select2 @error('categories') is-invalid @enderror"
                                        style="width: 100%;" id="categories" name="categories">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('categories', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="m-0 form-label col-form-label-sm" for="tags">Tags</label>
                                    <select class="form-control tags select2 @error('tags') is-invalid @enderror"
                                        multiple="multiple" style="width: 100%;" id="tags" name="tags[]">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-outline rounded-web card-secondary">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <h3 class="card-title">Content</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <textarea name="content" id="content">
                                    {!! $post->body !!}
                                </textarea>
                            </div>
                            <div class="card-footer rounded-web">
                                <button type="submit" class="btn btn-primary rounded-web">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        //Initialize Select2 Elements
        $('.tags').select2({
            placeholder: "Choose tag",
            allowClear: true,
            // tags: true
        })
        $('.categories').select2({
            placeholder: "Choose categories",
            allowClear: true
        })
    </script>
@endpush
