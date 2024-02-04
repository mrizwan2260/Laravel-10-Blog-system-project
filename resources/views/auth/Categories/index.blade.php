@extends('layouts.auth')
@section('title', 'Category')
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
                    <h4>All Category</h4>
                </div>
                <div>
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-1 btn-square">Create</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="pull">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('category.destroy', $category->id) }}" method="post">
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
