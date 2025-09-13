<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BUKAA - ALUMNI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/fontawesome.css') }}"> --}}
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/asset/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">BUKAA</h1>
                    {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#feature" class="nav-item nav-link">Feature</a>
                        <a href="/editors" class="nav-item nav-link">Editorial Board</a>
                        <a href="#review" class="nav-item nav-link">Papers</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    {{--                    <a href="https://school.esms.com.ng/result" target="_blank" --}}
                    {{--                        class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Sign Up</a> --}}
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">BUKAA</h1>
                            <p style="margin-bottom: 180px;" class="text-white pb-3 animated slideInDown">KANO
                                BAYERO UNIVERSITY KANO ALUMNI ASSOCIATION, <br>
                                BAYERO UNIVERSITY, KANO.</p>
                            {{-- <a href=""
                                class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Read
                                More</a>
                            <a href=""
                                class="btn btn-secondary-gradient py-sm-3 px-4 px-sm-5 rounded-pill animated slideInRight">Contact
                                Us</a> --}}
                        </div>
                        {{-- <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp"
                            data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="{{ asset('assets/img/screenshot-1.png') }}" alt="">
                                <img class="img-fluid" src="{{ asset('assets/img/screenshot-2.png') }}" alt="">
                                <img class="img-fluid" src="{{ asset('assets/img/screenshot-3.png') }}" alt="">
                                <img class="img-fluid" src="{{ asset('assets/img/screenshot-4.png') }}" alt="">
                                <img class="img-fluid" src="{{ asset('assets/img/screenshot-5.png') }}" alt="">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
