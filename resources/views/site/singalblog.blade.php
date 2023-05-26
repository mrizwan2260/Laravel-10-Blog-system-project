@extends('layouts.site')

@section('title', 'blog')

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">News details</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">News details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                <img loading="lazy" src="{{ asset('storage/auth/posts/') . '/' . $blog->gallery->image}}"
                                    alt="blog" class="img-fluid rounded">

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                        <span class="text-muted text-capitalize mr-3"><i
                                                class="ti-comment mr-2"></i>{{ count($comments) }}
                                            Comments</span>
                                        <span class="text-black text-capitalize mr-3"><i
                                                class="ti-time mr-1"></i>{{ $blog->created_at->format('h:ia  d-M-Y') }}</span>
                                    </div>

                                    <h2 class="mt-3 mb-4">{{ $blog->title }}</h2>
                                    <p class="lead mb-4">{{ $blog->description }}</p>


                                    <div
                                        class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                        <ul class="list-inline">
                                            <li>Category:</li>
                                            <li class="list-inline-item"><a
                                                    href="{{ route('category.post', $blog->category->slug) }}"
                                                    rel="tag">{{ $blog->category->name }}</a></li>
                                        </ul>

                                        <ul class="list-inline">
                                            <li class="list-inline-item"> Share: </li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-p"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Alert message start --}}
                        <div class="col-lg-12 ">
                            @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Comment Added SuccessFully!</strong> {{ session::get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        {{-- Alert message end --}}

                        {{-- comment section start --}}
                        <div class="col-lg-12 ">
                            <div class="mb-5 comment-area card border-0 p-5">
                                <form action="{{ route('comment.store', $blog->id) }}" method="post">
                                    @csrf
                                    <h4 class="mb-4">Write a comment</h4>

                                    <textarea
                                        class="form-control mb-3 @error('comment')
                                        is-invalid
                                    @enderror"
                                        name="comment" id="comment" cols="30" rows="4" placeholder="Comment"></textarea>
                                    @error('comment')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror

                                    <input class="btn btn-main btn-round-full" type="submit" name="submit-contact"
                                        id="submit_contact" value="comment" style="float: right">
                                </form>
                            </div>
                        </div>
                        {{-- comment section end --}}

                        {{-- Alert message start --}}
                        <div class="col-lg-12 ">
                            @if (Session::has('replaymessage'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Comment Added SuccessFully!</strong> {{ session::get('replaymessage') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        {{-- Alert message end --}}

                        {{-- comment section start --}}
                        @if (count($comments) > 0)
                            <div class="col-lg-12">
                                <div class="comment-area card border-0 p-5">
                                    <h4 class="mb-4">{{ count($comments) }} Comments</h4>
                                    <ul class="comment-tree list-unstyled">
                                        {{-- comment display start --}}
                                        @foreach ($comments as $comment)
                                            <li class="mb-5">
                                                <div class="comment-area-box">
                                                    <img loading="lazy" alt="comment-author"
                                                        src="{{ asset('assets/site/images/blog/test3.png') }}"
                                                        class="img-fluid float-left mr-3 mt-2" style="width: 35px">

                                                    <h5 class="mb-1">{{ $comment->user->name }}</h5>
                                                    <span>{{ $comment->user->email }}</span>

                                                    <div
                                                        class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                                        <span
                                                            class="date-comm">{{ $comment->created_at->format('h:ia  d-M-Y') }}</span>
                                                    </div>

                                                    <div class="comment-content mt-3">
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                    <div class="ml-5">
                                                        @foreach ($comment->replies as $reply)
                                                            @if ($reply->status == 1)
                                                                <p>{{ $reply->comment }}</p>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <a class="reply-btn" style="float: right; cursor: pointer;">Reply</a>
                                                    {{-- comment reply start --}}
                                                    <div class="reply-div">
                                                        <form action="{{ route('commentreply.store', $comment->id) }}"
                                                            method="post">
                                                            @csrf

                                                            <textarea
                                                                class="form-control mb-3 @error('comment')
                                                        is-invalid
                                                    @enderror"
                                                                name="comment" id="comment" cols="30" rows="2" placeholder="Comment"></textarea>
                                                            @error('comment')
                                                                <p class="invalid-feedback">{{ $message }}</p>
                                                            @enderror

                                                            <input class="btn btn-main btn-round-full" type="submit"
                                                                style="float: right">
                                                        </form>
                                                    </div>
                                                    {{-- comment reply end --}}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        {{-- comment section end --}}
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="search">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                        </div>


                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5>Latest Posts</h5>

                            @foreach ($latestposts as $latestpost)
                                <div class="media border-bottom py-3">
                                    <a href="{{ route('blog.page', $latestpost->slug) }}"><img loading="lazy"
                                            class="mr-4" style="width: 90px"
                                            src="{{ asset('storage/auth/posts/') . '/' . $latestpost->gallery->image }}"
                                            alt="blog"></a>
                                    <div class="media-body">
                                        <h6 class="my-2"><a
                                                href="{{ route('blog.page', $latestpost->slug) }}">{{ $latestpost->title }}</a>
                                        </h6>
                                        <span
                                            class="text-sm text-muted">{{ $latestpost->created_at->format('h:ia d/M/Y') }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>

                            @foreach ($tags as $tag)
                                <a href="{{ route('tag.post', $tag->slug) }}">{{ $tag->name }}</a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.reply-div').hide();
        $(document).ready(function() {
            $('.reply-btn').click(function() {
                $(this).siblings('.reply-div').toggle('swing');
            });
        });
    </script>

@endsection
