<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ env('APP_NAME') }} </title>
    <!-- Favicons -->
    <link href="{{ asset('img/logo.ico') }}" rel="icon">
    <link href="{{ asset('img/logo.ico') }}" rel="apple-touch-icon">

    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00a0b0',
                        secondary: '#6a4a3c'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/bukaa6.jpg') }}');

            background-size: cover;
            background-position: center;
        }

        .newsletter-section {
            background-color: rgba(0, 160, 176, 0.1);
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #00a0b0;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active::after {
            width: 100%;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-checkbox input {
            display: none;
        }

        .checkbox-indicator {
            width: 20px;
            height: 20px;
            border: 2px solid #00a0b0;
            border-radius: 4px;
            margin-right: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .custom-checkbox input:checked+.checkbox-indicator {
            background-color: #00a0b0;
        }

        .custom-checkbox input:checked+.checkbox-indicator:after {
            content: '';
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            margin-bottom: 2px;
        }
    </style>
    {{ $slot }}
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('img/my-logo-3.jpg') }}" alt="BUKAA Logo" class="h-10 w-auto mr-2">
                <span class="text-4xl font-['Impact'] text-primary">{{ env('APP_NAME') }} Verification</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="nav-link active text-gray-800 font-medium hover:text-primary transition">Home</a>

                <a href="{{ url('/verification/login') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Login</a>
                <a href="" class="nav-link text-gray-800 font-medium hover:text-primary transition">Charges</a>

                <a href="{{ url('/about') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">About</a>
                <a href="{{ url('/faqs') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">FAQs</a>
                <a href="{{ url('/contact') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Contact</a>

            </nav>


            <!-- Mobile Menu Button -->
            <button class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700" id="mobile-menu-button">
                <i class="ri-menu-line ri-lg"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden hidden bg-white shadow-lg absolute top-full left-0 right-0 p-4 border-t" id="mobile-menu">
            <nav class="flex flex-col space-y-4">
                <a href="{{ url('/') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100 active">Home</a>
                <a href="{{ url('/verification/login') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Login</a>

                <a href="{{ url('/about') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">About
                </a>
                <a href="{{ url('/faqs') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">FAQs
                </a>
                <a href="{{ url('/contact') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2">Contact</a>

            </nav>
            {{-- <ul>
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li><a href="{{ url('/alumni') }}">Alumni</a></li>
                <li><a href="{{ url('/chapters') }}">Chapters</a></li>
                <li><a href="{{ url('/job-adverts') }}">Job Adverts</a></li>
                <li><a href="{{ url('/news-events') }}">News & Events</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
              </ul> --}}
        </div>
        {{-- <div class="flex items-center space-x-4">
            <button class="text-gray-700 hover:text-primary">
            <div class="w-10 h-10 flex items-center justify-center">
            <i class="ri-user-line ri-lg"></i>
            </div>
            </button>
            <button class="bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap">Member Login</button>
            </div> --}}
    </header>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
