<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/front/assets/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('/front/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('/front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/assets/css/owl.css')}}">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><h2>Car Dealer <em>Website</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{route('cars.index')}}">Cars</a></li>


                    <li class="nav-item"><a class="nav-link" href="{{route('about_us')}}">About Us</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{route('contact_us')}}">Contact Us</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    @else

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('profile.show')}}">Profile</a>
                                <a class="dropdown-item text-danger" href="{{route('log-out')}}">logout</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright © 2020 Company Name - Template by: <a
                            href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="{{asset('/front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- Additional Scripts -->
<script src="{{asset('/front/assets/js/custom.js')}}"></script>
<script src="{{asset('/front/assets/js/owl.js')}}"></script>
@yield('script')
</body>
</html>
