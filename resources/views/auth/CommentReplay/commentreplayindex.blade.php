@extends('layouts.auth')
@section('title', 'Comment Replay')
@section('style')
    <style>
        .table {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container col-md-10 p-1">
        <div class="card shadow-lg p-2">
            <div class="d-flex justify-content-between card-header">
                <div class="pt-1">
                    <h4>All Comment Replay</h4>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-1 btn-square">Back</a>
                </div>
            </div>
            @if (count($commentreplies) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            {{-- <th>Comment</th> --}}
                            <th>Comment Reply</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="pull">
                        @foreach ($commentreplies as $commentreply)
                            <tr>
                                <td>
                                    <a href="{{route('blog.page',$commentreply->post->slug)}}">{{$commentreply->post->title}}</a>
                                </td>
                                {{-- <td>{{ $commentreply->Comment->comment }}</td> --}}
                                <td>{{ $commentreply->comment }}</td>
                                <td>{{ $commentreply->user->name }}</td>
                                <td>
                                    <form action="{{ route('commentreplay.update', $commentreply->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        @if ($commentreply->status == 1)
                                            <button class="btn btn-success btn-sm btn-pill" name="status" type="submit"
                                                value="0">Approved</button>
                                        @else
                                            <button class="btn btn-light btn-sm btn-pill" name="status" type="submit"
                                                value="1">UnApprove</button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <form id="delete-form-{{ $commentreply->id }}"
                                        action="{{ route('commentreply.destroy', $commentreply->id) }}" method="post">
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
                <h2 class="text-center my-3 text-danger">No commentreply Yet.</h2>
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
