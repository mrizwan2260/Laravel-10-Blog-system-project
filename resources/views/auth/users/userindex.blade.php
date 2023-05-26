@extends('layouts.auth')
@section('title', 'users')
@section('style')
    <style>
        .table {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container col-md-8 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>All Users</h4>
                </div>
                <div>
                    {{-- <a href="" class="btn btn-primary mb-1 btn-square">Create</a> --}}
                </div>
            </div>
            @if (count($users) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="pull">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('user.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        @if ($user->role == 1)
                                            <button class="btn btn-success btn-sm btn-pill btn-block" type="submit" name="role" value="0">Admin</button>
                                        @else
                                            <button class="btn btn-light btn-sm btn-pill btn-block" type="submit" name="role" value="1">User</button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <form id="delete-form-{{ $user->id }}"
                                        action="{{ route('delete.user', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="delete" type="submit" class="btn btn-danger btn-square btn-sm"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2 class="text-center my-3 text-danger">No User Yet.</h2>
            @endif
        </div>
    </div>
@section('script')

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>

@endsection
@endsection
