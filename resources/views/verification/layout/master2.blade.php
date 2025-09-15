    <!DOCTYPE html>
    <!--
    Template Name: NobleUI - Laravel Admin Dashboard Template
    Author: NobleUI
    Website: https://www.nobleui.com
    Portfolio: https://themeforest.net/user/nobleui/portfolio
    Contact: nobleui123@gmail.com
    Purchase: https://1.envato.market/nobleui_laravel
    License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
    -->
    <html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Portal Login - BUK Alumni Association</title>
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00a0b0',
                        secondary: '#f8f9fa'
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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            max-width: 400px;
        }

        .password-toggle {
            cursor: pointer;
        }

        .testimonial {
            transition: opacity 0.5s ease;
        }

        .password-strength {
            height: 5px;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .strength-weak {
            background-color: #ef4444;
            width: 33%;
        }

        .strength-medium {
            background-color: #f59e0b;
            width: 66%;
        }

        .strength-strong {
            background-color: #10b981;
            width: 100%;
        }

        @media (max-width: 768px) {
            .login-container {
                max-width: 100%;
                padding: 1rem;
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
        }
    </style>
    </head>

    <body data-base-url="{{ url('/') }}" class="bg-gray-50 flex flex-col min-h-screen">
        <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
            <div class="container mx-auto px-4 py-3 flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('img/my-logo-3.jpg') }}" alt="BUKAA Logo" class="h-10 w-auto mr-2">
                    <span class="text-4xl font-['Impact'] text-primary">BUKAA</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="nav-link active text-gray-800 font-medium hover:text-primary transition">Home</a>
                    <a href="{{ url('/verification/login') }}"
                        class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Login</a>

                    <a href=""
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">Charges</a>

                    <a href="{{ url('/about') }}"
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">About Us</a>
                    <a href="{{ url('/faqs') }}"
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">FAQs</a>
                    <a href="{{ url('/contact') }}"
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">Contact</a>

                </nav>


                <!-- Mobile Menu Button -->
                <button class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700"
                    id="mobile-menu-button">
                    <i class="ri-menu-line ri-lg"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div class="md:hidden hidden bg-white shadow-lg absolute top-full left-0 right-0 p-4 border-t"
                id="mobile-menu">
                <nav class="flex flex-col space-y-4">
                    <a href="{{ url('/') }}"
                        class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100 active">Home</a>

                    <a href="{{ url('/verification/login') }}"
                        class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Login</a>
                    <a href=""
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">Charges</a>

                    <a href="{{ url('/about') }}"
                        class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">About
                        Us</a>

                    <a href="{{ url('/faqs') }}"
                        class="nav-link text-gray-800 font-medium hover:text-primary transition">FAQs</a>
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
        <script src="{{ asset('assets/js/spinner.js') }}"></script>

        <div class="main-wrapper" id="app">
            <div class="page-wrapper full-page">
                @yield('content')
            </div>
        </div>

        <!-- base js -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
        <!-- end base js -->

        <!-- plugin js -->
        @stack('plugin-scripts')
        <!-- end plugin js -->

        <!-- common js -->
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <!-- end common js -->

        @stack('custom-scripts')
        <footer class="bg-gray-800 text-white pt-16 pb-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Contact Information -->
                    <div>
                        <h3 class="text-xl font-bold mb-6">Contact Us</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 flex items-center justify-center mt-1">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                                <span>NITT Zaria Office<br>NITT Zaria<br>Basawa Road, Zaria, Kaduna State,
                                    Nigeria.</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-phone-line"></i>
                                </div>
                                <span>+234 908 000 000</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <span>info@nitt.gov.ng</span>
                            </li>
                        </ul>

                        <div class="mt-6">
                            <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                            <div class="flex gap-4">
                                <a href="#"
                                    class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                                    <i class="ri-twitter-x-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="{{ url('/') }}" class="hover:text-primary transition">Home</a></li>
                            <li><a href="{{ url('/verification/login') }}"
                                    class="hover:text-primary transition">Login</a>
                            </li>
                            <li><a href="{{ url('/about') }}" class="hover:text-primary transition">About Us</a></li>
                            <li><a href="{{ url('/contact') }}" class="hover:text-primary transition">Contact Us</a>
                            </li>

                        </ul>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h3 class="text-xl font-bold mb-6">Resources</h3>
                        <ul class="space-y-3">
                            <li><a href="https://nitt.gov.ng" class="hover:text-primary transition">NITT Homepage</a>
                            </li>
                            <li><a href="https://cng.nitt.gov.ng" class="hover:text-primary transition">CNG
                                    Website</a></li>
                            {{-- <li><a href="{{ url('/scholarships') }}" class="hover:text-primary transition">Scholarship
                                Opportunities</a></li>
                        <li><a href="#" class="hover:text-primary transition">Transcript Requests</a></li>
                        <li><a href="#" class="hover:text-primary transition">University Library Access</a></li>
                        <li><a href="#" class="hover:text-primary transition">Career Development</a></li>
                        <li><a href="#" class="hover:text-primary transition">Alumni Magazine</a></li>
                        <li><a href="#" class="hover:text-primary transition">Photo Gallery</a></li> --}}
                        </ul>
                    </div>

                    <!-- Latest Tweets -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                        <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and alumni
                            news.
                        </p>
                        <form class="space-y-3">
                            <div>
                                <input type="email" placeholder="Your email address"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded text-gray-200 focus:outline-none focus:border-primary">
                            </div>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white font-medium px-4 py-2 !rounded-button whitespace-nowrap">Subscribe</button>
                        </form>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
                    <p>&copy; 2025 Ubaznet Software Solution. All Rights Reserved.</p>
                    <div class="flex justify-center gap-6 mt-4">
                        <a href="#" class="hover:text-primary transition">Privacy Policy</a>
                        <a href="#" class="hover:text-primary transition">Terms of Service</a>
                        <a href="#" class="hover:text-primary transition">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile Menu Toggle
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');

                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');

                    if (mobileMenu.classList.contains('hidden')) {
                        mobileMenuButton.innerHTML = '<i class="ri-menu-line ri-lg"></i>';
                    } else {
                        mobileMenuButton.innerHTML = '<i class="ri-close-line ri-lg"></i>';
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Password toggle
                const passwordInput = document.getElementById('password');
                const passwordToggle = document.getElementById('password-toggle');
                passwordToggle.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        passwordToggle.classList.remove('ri-eye-line');
                        passwordToggle.classList.add('ri-eye-off-line');
                    } else {
                        passwordInput.type = 'password';
                        passwordToggle.classList.remove('ri-eye-off-line');
                        passwordToggle.classList.add('ri-eye-line');
                    }
                });

                // Password strength indicator
                passwordInput.addEventListener('input', function() {
                    const strengthBar = document.getElementById('password-strength');
                    const value = passwordInput.value;
                    if (value.length < 6) {
                        strengthBar.className = 'password-strength strength-weak';
                    } else if (value.length < 10 || !/[A-Z]/.test(value) || !/[0-9]/.test(value)) {
                        strengthBar.className = 'password-strength strength-medium';
                    } else {
                        strengthBar.className = 'password-strength strength-strong';
                    }
                });

                // Testimonial rotation (simple placeholder)
                const testimonial = document.querySelector('.testimonial');
                setInterval(() => {
                    testimonial.style.opacity = '0';
                    setTimeout(() => {
                        testimonial.innerHTML = `
                            <img src="{{ asset('img/alumni-testimonial-2.jpg') }}" alt="Alumni Testimonial" class="w-24 h-24 rounded-full mx-auto mb-4">
                            <p class="text-gray-600 italic mb-4">"The portal helped me reconnect with classmates and find new career opportunities."</p>
                            <p class="text-gray-800 font-semibold">– Engr. Chinedu Okeke, Class of 2010</p>
                        `;
                        testimonial.style.opacity = '1';
                    }, 500);
                }, 10000); // Rotate every 10 seconds
            });
        </script>
        <!-- Placeholder for reCAPTCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>

    </html>
