<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kido World</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/dash/bootstap.css') }}">
    <link href="{{ asset('css/dash/dashboard.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <style>
        .fixed-sn main{
         margin-right: 0px !important;
         margin-left: 0px !important;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>
    @include('inc.admin_top_navbar')
    <!-- Fixed button -->
    <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

        <a class="btn-floating btn-lg red">
            <i class="fas fa-pencil-alt"></i>
        </a>

        <ul class="list-unstyled">
            <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
            <li><a href="{{ route('Profile.show', auth()->user()->id) }}" class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
            <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
            <li><a href="{{ route('product.index') }}" class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>

    </div>
    <!-- Fixed button -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('inc.admin_sidebar')
            </div>
            <div class="col-md-9">
                @yield('content-admin')
            </div>
        </div>
    </div>

</main>
<!-- Main layout -->

<!-- Footer -->
<footer class="page-footer pt-0 mt-5   rgba-stylish-light">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2019 Copyright: <a href="#" target="_blank"> Kido World </a>
        </div>
    </div>

</footer>
<!-- Footer -->
<script src="{{ asset('js/dash/jquery.js') }}" defer></script>
<script src="{{ asset('js/dash/popper.js') }}" defer></script>
<script src="{{ asset('js/dash/bootstarp.js') }}" defer></script>
<script src="{{ asset('js/dash/mdb.js') }}" defer></script>
</body>
</html>
