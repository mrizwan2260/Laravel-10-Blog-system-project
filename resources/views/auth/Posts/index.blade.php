@extends('layouts.auth')
@section('title', 'Posts')
@section('style')
    <style>
        .post-active {
            background-color: rgb(105, 191, 105);
            color: white;
            border-radius: 50px;
        }

        .post-inactive {
            background-color: rgb(255, 120, 120);
            color: white;
            border-radius: 50px;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="container col-md-10 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>All Posts</h4>
                </div>
                <div>
                    <a href="{{ route('post.create') }}" class="btn btn-primary btn-square btn-sm">Create</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="pull">
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/auth/posts/') . '/' . $post->gallery->image }}" style="width: 90px" alt="">
                            </td>
                            <td>{{ Str::limit($post->title, 10) }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if ($post->status == 1)
                                    <p class="post-active">Active</p>
                                @else
                                    <p class="post-inactive">InActive</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm btn-square"><i
                                        class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></i></i></a>
                                <form id="delete-form-{{ $post->id }}" action="{{ route('post.delete', $post->id) }}"
                                    method="post" class="inner">
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
