@extends('layouts.auth')
@section('title', 'Create Tag')
@section('content')
    <div class="container col-md-8 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>Create Tag</h4>
                </div>
                <div>
                    <a href="{{ route('tag.index') }}" class="btn btn-primary mb-1 btn-square">Back</a>
                </div>
            </div>
            <form action="{{route('tag.store')}}" method="post">
                @csrf
                <div class="mt-2">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Tag"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button class="btn btn-success btn-pill">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
