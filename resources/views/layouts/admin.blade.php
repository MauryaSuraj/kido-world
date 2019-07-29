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
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    @include('inc.admin_sidebar')
    @include('inc.admin_top_navbar')

    <!-- Fixed button -->
    <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

        <a class="btn-floating btn-lg red">
            <i class="fas fa-pencil-alt"></i>
        </a>

        <ul class="list-unstyled">
            <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
            <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
            <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>

    </div>
    <!-- Fixed button -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>

    <div class="container-fluid">
        @yield('content-admin')
    </div>

</main>
<!-- Main layout -->

<!-- Footer -->
<footer class="page-footer pt-0 mt-5 rgba-stylish-light">

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
