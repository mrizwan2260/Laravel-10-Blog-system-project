@extends('layouts.site')
@section('title', 'Index')
@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Our blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">

                @foreach ($category_posts as $post)
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="blog-item">
                            <a href="{{ route('blog.page', $post->slug) }}"><img loading="lazy"
                                    src="{{ asset('storage/auth/posts/') . '/' . $post->gallery->image }}" alt="blog"
                                    class="img-fluid rounded"></a>

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                    <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                            class="ti-comment mr-2"></i>{{ $post->comment()->where('status', 1)->count() }}
                                        Comments</span>
                                    <span class="text-black text-capitalize d-inline-block mr-3"><i
                                            class="ti-time mr-1"></i>{{ $post->created_at->format('h:ia  d-M-Y') }}</span>
                                </div>

                                <h3 class="mt-3 mb-3"><a href="{{ route('blog.page', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="mb-4"><a
                                        href="{{ route('blog.page', $post->slug) }}">{{ Str::limit($post->description, 100) }}</a>
                                </p>
                                <a href="{{ route('blog.page', $post->slug) }}"
                                    class="btn btn-small btn-main btn-round-full">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- custom pagination --}}
            <div class="row justify-content-center mt-5">
                {{ $category_posts->links('vendor.pagination.custom.custom') }}
            </div>

        </div>
    </section>
@endsection
