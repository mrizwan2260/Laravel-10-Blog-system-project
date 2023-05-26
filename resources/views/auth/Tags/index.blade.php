@extends('layouts.auth')
@section('title', 'Tags')
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
                    <h4>All Tag</h4>
                </div>
                <div>
                    <a href="{{ route('tag.create') }}" class="btn btn-primary mb-1 btn-square">Create</a>
                </div>
            </div>
            @if (count($tags) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="pull">
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <form id="delete-form-{{ $tag->id }}" action="{{ route('tag.destroy', $tag->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="delete" type="submit" class="btn btn-danger btn-square btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2 class="text-center my-3 text-danger">No Tag Yet.</h2>
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
