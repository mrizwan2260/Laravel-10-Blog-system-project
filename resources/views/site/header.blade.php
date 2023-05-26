<header class="navigation">
    <div class="header-top ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-2 col-md-4">
                    <div class="header-top-socials text-center text-lg-left text-md-left">
                        <a href="javascript:void(0)" aria-label="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="javascript:void(0)" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="javascript:void(0)" aria-label="github"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                    <div class="header-top-info mb-2 mb-md-0">
                        <a href="tel:+23-345-67890">Call Us : <span>+23-345-67890</span></a>
                        <a href="mailto:support@gmail.com"><i
                                class="fas fa-envelope mr-2"></i><span>support@gmail.com</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg px-0 py-4">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Mega<span>kit.</span>
                        </a>

                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="fa fa-bars"></span>
                        </button>

                        <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item @@home">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown @@about">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category <i
                                            class="fas fa-chevron-down small"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                        @foreach ($categories as $category)
                                            <li><a class="dropdown-item @@company"
                                                    href="{{route('category.post',$category->slug)}}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item @@service"><a class="nav-link"
                                        href="service.html">About</a></li>
                                <li class="nav-item @@contact"><a class="nav-link"
                                        href="contact.html">Contact</a></li>
                            </ul>
                            <div class="my-2 my-md-0 ml-lg-4 text-center">
                                @if (Auth::user())
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-small btn-main btn-round-full">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-solid-border btn-round-full">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="btn btn-solid-border btn-round-full">Register</a>
                                @endif

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
