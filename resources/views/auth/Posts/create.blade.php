@extends('layouts.auth')
@section('title', 'Create Post')
@section('content')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
<div class="container col-md-10 p-1">
    <div class="card shadow-lg p-2">
        <div class="d-flex justify-content-between card-header">
            <div class="pt-1">
                <h4>Create Post</h4>
            </div>
            <div>
                <a href="{{ route('post.index') }}" class="btn btn-primary btn btn-square btn-sm">Back</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mt-2">
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label for="">Description</label>
                <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') }}" placeholder="Description" cols="30" rows="10"></textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Is Publish</label>
                    <select name="is_publish" class="form-control @error('is_publish') is-invalid @enderror">
                        <option value="" disabled selected>Choose Option</option>
                        <option value="1">Publish</option>
                        <option value="0">Draft</option>
                    </select>
                    @error('is_publish')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="">Category</label>
                    @if (count($categories) > 0)
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="" disabled selected>Choose Option</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <h5 class="text-danger">No Category</h5>
                    @endif
                    @error('category')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label>Tags</label>
                    @if (count($tags) > 0)
                        <select name="tags[]" class="form-control selectpicker @error('tags') is-invalid @enderror"
                            multiple data-live-search="true">
                            <option value="" disabled selected>Choose Option</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <h5 class="text-danger">No Tags</h5>
                    @endif
                    @error('tags')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="">Image</label>
                    <input type="file" name="image" value="{{ old('image') }}"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mt-6">
                    <button class="btn btn-success btn-sm btn-square">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/auth/js/multi-dropdown.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- <script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script> --}}
@endsection
