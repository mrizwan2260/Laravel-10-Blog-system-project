@extends('layouts.auth')
@section('title', 'Edit profile')
@section('content')
    <div class="container col-md-10 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>Edit Profile</h4>
                </div>
                <div>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-square btn-sm">Back</a>
                </div>
            </div>
            <form action="{{ route('update.profile', $user->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="mt-2">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="">Email</label>
                    <input type="email" name="email" readonly value="{{ old('email', $user->email) }}"
                        placeholder="Email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror">
                    @error('password')
                        <p class="is-invalid">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <button class="btn btn-success btn-sm btn-square">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
