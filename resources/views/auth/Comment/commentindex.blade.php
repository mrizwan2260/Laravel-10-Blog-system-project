@extends('layouts.auth')
@section('title', 'Comments')
@section('style')
    <style>
        .table {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container col-md-10 col-sm-12 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>All Comments</h4>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-1 btn-square">Back</a>
                </div>
            </div>
            @if (count($comments) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Comment</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="pull">
                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <a href="{{route('blog.page', $comment->post->slug)}}">{{ $comment->post->title }}</a>
                                </td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->user->name }}</td>

                                <td>
                                    @if ($comment->status == 1)
                                        <form action="{{route('comment.update',$comment->id)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-success btn-sm btn-pill" name="status" value="0" type="submit">Approved</button>
                                        </form>
                                    @else
                                        <form action="{{route('comment.update',$comment->id)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-danger btn-sm btn-pill" name="status" value="1">Disabled</button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                    <form id="delete-form-{{ $comment->id }}" action="{{ route('comment.destroy' , $comment->id) }}"
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
                <h2 class="text-center my-3 text-danger">No comments Yet.</h2>
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

