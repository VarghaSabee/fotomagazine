<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ФОТО САЛОН-МАГАЗИН</title>
    <link rel="icon" href="{{asset('images/camera.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('index')}}">Фото салон</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{route('index')}}">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ Auth::check() ? route('orders.user') : route('login') }}">Замовлення</a>
                </li>
            <!--
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                            @endauth
                    @endif
                            -->
            </ul>

        </div>
    </div>
</nav>
@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-top: -20px">
    <div class="container">
        <p class="m-0 text-center text-white" style="font-size: 2em">© «ФОТО салон-магазин» {{ date('Y') }}</p><img id="scrollup" src="{{asset('images/up.png')}}" style="float: right; margin-top: -40px;">
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->

<script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom JavaScript for this theme -->

<script>
    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scrollup').fadeIn();
            } else {
                $('#scrollup').fadeOut();
            }
        });

        $('#scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
</script>
</body>
</html>
