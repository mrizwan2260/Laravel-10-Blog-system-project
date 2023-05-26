<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- MONO CSS -->
    <link id="main-css-href" href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />
    @yield('style')
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>

</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{ route('site.index') }}">
                        <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">MegaKit.</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="section-title">
                            Apps
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#email" aria-expanded="false" aria-controls="email">
                                <i class="fa-solid fa-file" style="font-size: 20px"></i>
                                <span class="nav-text">Post</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('post.index') }}">
                                            <span class="nav-text">All Post</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('post.create') }}">
                                            <span class="nav-text">Create Post</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('category.index') }}">
                                <i class="fa-solid fa-bars" style="font-size: 20px"></i>
                                <span class="nav-text">Category</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('tag.index') }}">
                                <i class="fa-solid fa-paperclip" style="font-size: 20px"></i>
                                <span class="nav-text">Tag</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('comment.index') }}">
                                <i class="fa-solid fa-comment" style="font-size: 20px"></i>
                                <span class="nav-text">Comment</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('commentreplay.index') }}">
                                <i class="fa-solid fa-comments" style="font-size: 20px"></i>
                                <span class="nav-text">Comment Replay</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.index') }}">
                                <i class="fa-solid fa-user" style="font-size: 20px"></i>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </aside>



        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">

                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    {{-- <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" /> --}}
                                        <i class="fa-solid fa-user" style="font-size: 25px"></i>
                                    <span class="d-none d-lg-inline-block">{{ Auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{ route('user.profile') }}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    <li class="dropdown-footer">
                                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a id="logout-button" class="dropdown-link-item"
                                                href="javascript:void(0)"> <i class="mdi mdi-logout"></i> Log Out </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->

            @yield('content')

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>
    <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/mono.js') }}"></script>
    <script src="{{ asset('assets/auth/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--  -->
    <script>
        $(document).ready(function() {
            $('#logout-button').click(function() {
                $('#logout-form').submit();
            });
        });
    </script>

    {{-- script Start of toastr Session --}}
    <script>
        @if (Session::has('success'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
            }
            toastr.success("{{ session('success') }}")
        @endif

        @if (Session::has('delete'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
            }
            toastr.error("{{ session('delete') }}")
        @endif
    </script>
    {{-- script end of toastr Session --}}

    {{-- script start of sweet alert --}}
    <script>
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Delete",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get the ID of the current form
                    var formId = $(this).closest('form').attr('id');

                    // Submit the form with the corresponding ID
                    $('#' + formId).submit();
                }
            })
        });
    </script>
    {{-- script end start of sweet alert --}}

    @yield('script')

</body>

</html>
