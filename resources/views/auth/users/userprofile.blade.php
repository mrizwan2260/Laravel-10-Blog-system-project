@extends('layouts.auth')
@section('title', 'profile')
@section('content')
    <div class="container col-md-10 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>Profile</h4>
                </div>
                <div>
                    <a href="{{route('edit.profile',auth()->user()->id)}}" class="btn btn-primary btn-square btn-sm">Edit</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody class="pull">

                        <tr>
                            <td>{{auth()->user()->name}}</td>
                            <td>{{auth()->user()->email}}</td>
                            <td>{{auth()->user()->role == 1 ? 'Admin' : 'User'}}</td>
                            <td>{{auth()->user()->created_at}}</td>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
