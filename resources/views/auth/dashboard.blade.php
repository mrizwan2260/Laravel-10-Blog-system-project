@extends('layouts.auth')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">

                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h4>Total Posts</h4>
                            <h2>{{ $postCount }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h4>Total Categories</h4>
                            <h2>{{ $categoryCount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h4>Total Tags</h4>
                            <h2>{{ $tagCount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h4>Total Users</h4>
                            <h2>{{ $userCount }}</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
