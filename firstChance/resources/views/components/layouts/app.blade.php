<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
        
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body> 
        
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Navbar  -->
        <div class="container-xxl bg-white p-0">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
                <a href="{{ route('home') }}" wire:navigate class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                    <h1 class="m-0 text-primary">First Chance</h1>
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="{{ route('home') }}" wire:current.strict="active" wire:navigate class="nav-item nav-link active">Home</a>
                        <a href="#" wire:navigate class="nav-item nav-link">Contact</a>     
                        <a href="#" wire:navigate class="nav-item nav-link">About</a>
                        @guest
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Register & Login</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('login')}}" wire:navigate class="dropdown-item ">Login</a>     
                                <a href="{{route('register')}}" wire:navigate class="dropdown-item">Register</a>
                            </div>
                        </div>
                        @endguest
                        @auth
                            <a href="{{ route('favorite', auth()->user()->name) }}" wire:navigate class="nav-item nav-link">Favorites</a>
                        @endauth
                    </div>
                    <a href="{{ route('jobCreate') }}" wire:navigate class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </nav>
            @if (session('register'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('register')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('login_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('login_success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

            {{ $slot }}   

        <!-- Footer Start -->
        <div class="container-xxl bg-white p-0">
            <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Company</h5>
                            <a class="btn btn-link text-white-50" href="#">About Us</a>
                            <a class="btn btn-link text-white-50" href="#">Contact Us</a>
                            <a class="btn btn-link text-white-50" href="#">Our Services</a>
                            <a class="btn btn-link text-white-50" href="#">Privacy Policy</a>
                            <a class="btn btn-link text-white-50" href="#">Terms & Condition</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Quick Links</h5>
                            <a class="btn btn-link text-white-50" href="#">About Us</a>
                            <a class="btn btn-link text-white-50" href="#">Contact Us</a>
                            <a class="btn btn-link text-white-50" href="#">Our Services</a>
                            <a class="btn btn-link text-white-50" href="#">Privacy Policy</a>
                            <a class="btn btn-link text-white-50" href="#">Terms & Condition</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Contact</h5>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Vahdat, Tajikistan</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>majidzodaabdulloh@gmail.com</p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="{{route('home')}}">firstchance.com</a>, All Right Reserved.
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="{{route('home')}}">Home</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    
        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>

        </body>
</html>
