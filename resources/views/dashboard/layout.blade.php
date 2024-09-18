<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Aug 2024 17:02:31 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- App favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    {{-- public/ --}}

    <!-- App css -->
    <link href="{{ asset('ud/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    {{-- @vite('resources/css/app.css') --}}
    <!-- Icons -->
    <link href="{{ asset('ud/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/dash.css') }}?version={{ \Str::random(45) }}" rel="stylesheet" type="text/css" />
    <style>


    </style>



</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">
@yield('badcock')
    <!-- Begin page -->
    <div id="app-layout">


        <!-- Topbar Start -->
        <div class="bg-transparent topbar-custom">
            <div class="container-xxl dash-top-bar">
                <div class="d-flex justify-content-between">
                    <ul class="mb-0 list-unstyled topnav-menu d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link ps-0">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-none">
                            <div class="position-relative topbar-search">
                                <input type="text" class="bg-opacity-75 form-control bg-light border-light ps-4"
                                    placeholder="Search...">
                                <i
                                    class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                            </div>
                        </li>
                    </ul>

                    <ul class="mb-0 list-unstyled topnav-menu d-flex align-items-center">

                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                            </button>
                        </li>



                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('user.jpeg') }}" alt="user-image"
                                    class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="m-0 text-overflow">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='{{ url('profile') }}'>
                                    <i class="align-middle mdi mdi-account-circle-outline fs-16"></i>
                                    <span>My Account</span>
                                </a>



                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='{{ url('logout') }}'>
                                    <i class="align-middle mdi mdi-location-exit fs-16"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        @include('partial.nav')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-xxl">

                    @yield('body')




                </div> <!-- container-fluid -->
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="text-center col fs-13 text-muted">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a
                                href="#!" class="text-reset fw-semibold">{{ env('APP_NAME') }}</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('ud/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('ud/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- Apexcharts JS -->
    <script src="{{ asset('ud/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- for basic area chart -->
    <script src="{{ asset('ud/assets/js/stock-prices.js') }}"></script>

    <!-- Widgets Init Js -->
    <script src="{{ asset('ud/assets/js/pages/analytics-dashboard.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('ud/assets/js/app.js') }}"></script>

</body>


</html>
