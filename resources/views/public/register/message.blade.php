<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join the BUK Alumni Community | Bayero University Kano Alumni Association</title>
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
            background-image: linear-gradient(rgba(0, 160, 176, 0.7), rgba(0, 160, 176, 0.7)), url('https://readdy.ai/api/search-image?query=Bayero%20University%20Kano%20campus%20aerial%20view%20with%20beautiful%20architecture%2C%20green%20lawns%2C%20students%20walking%2C%20sunny%20day%2C%20academic%20atmosphere%2C%20university%20buildings%20with%20distinctive%20Nigerian%20architectural%20elements%2C%20peaceful%20environment&width=1920&height=1080&seq=1&orientation=landscape');
            background-size: cover;
            background-position: center;
        }

        input:focus {
            outline: none;
        }

        .testimonial-card {
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .faq-item {
            transition: all 0.3s ease;
        }

        .step-item {
            position: relative;
        }

        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 40px;
            right: -50%;
            width: 100%;
            height: 2px;
            background-color: #e5e7eb;
            z-index: 0;
        }

        .step-item.active:not(:last-child)::after {
            background-color: #00a0b0;
        }

        .step-number {
            z-index: 1;
            position: relative;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
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

                <a href="{{ url('/membership') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Members</a>
                <a href="{{ url('/chapters') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Chapters</a>
                <a href="{{ url('/news-events') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">News & Events</a>
                <a href="{{ url('/job-adverts') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Job Board</a>
                <a href="{{ url('/about') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">About Us</a>
                <a href="{{ url('/contact') }}"
                    class="nav-link text-gray-800 font-medium hover:text-primary transition">Contact</a>
                <div class="flex items-center space-x-4">

                    <a href="{{ url('/portal') }}"
                        class="bg-primary text-white px-5 py-2 !rounded-button font-medium hover:bg-opacity-90 transition text-center mt-2 whitespace-nowrap">
                        <i class="ri-user-line ri-lg"></i>Portal</a>
                </div>
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
                <a href="{{ url('/membership') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Members</a>
                <a href="{{ url('/news-events') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">News &
                    Events</a>
                <a href="{{ url('/chapters') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Chapters</a>
                <a href="{{ url('/job-adverts') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">Job
                    Board</a>
                <a href="href="{{ url('/about') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2 border-b border-gray-100">About
                    Us</a>
                <a href="{{ url('/contact') }}"
                    class="text-gray-800 font-medium hover:text-primary transition py-2">Contact</a>
                <div class="flex items-center space-x-4">

                    <a href="{{ url('/portal') }}"
                        class="bg-primary text-white px-5 py-2 !rounded-button font-medium hover:bg-opacity-90 transition text-center mt-2 whitespace-nowrap">
                        <i class="ri-user-line ri-lg"></i>Portal</a>
                </div>
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

    <!-- Hero Section -->



    <!-- Registration Process -->
    <section id="registration" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">How to Become a Member</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Follow these simple steps to join the BUK Alumni Association
                    and start enjoying the benefits.</p>
            </div>


            <!-- Registration Form -->
            <div class="bg-white rounded text-center shadow-lg p-8 max-w-3xl mx-auto">
                <h3 class="text-2xl text-center font-bold text-gray-800 mb-6">Registration Form</h3>
                {{ $message }}

                <p>
                    Login to your account via <a class="hover:text-primary transition"
                        href="{{ url('/member/login') }}">here</a>
                </p>
                <br>
                <div class="text-center mb-12">
                    <a style="width: 30%;margin-left:35%" href="/show/search"
                        class="block items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Go
                        Back
                    </a>
                    </h4>
                </div>
                {{-- <a href="/membership">Back</a> --}}
            </div>
        </div>
    </section>



    <!-- Footer -->
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
                            <span>Alumni Relations Office<br>Bayero University Kano<br>PMB 3011, Kano, Nigeria</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span>+234 8012 345 6789</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span>alumni@buk.edu.ng</span>
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
                        <li><a href="#" class="hover:text-primary transition">Home</a></li>
                        <li><a href="#" class="hover:text-primary transition">About Us</a></li>
                        <li><a href="#" class="hover:text-primary transition">Events Calendar</a></li>
                        <li><a href="#" class="hover:text-primary transition">News & Updates</a></li>
                        <li><a href="#" class="hover:text-primary transition">Alumni Directory</a></li>
                        <li><a href="#" class="hover:text-primary transition">Career Opportunities</a></li>
                        <li><a href="#" class="hover:text-primary transition">Donate</a></li>
                        <li><a href="#" class="hover:text-primary transition">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Resources</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-primary transition">Alumni Benefits</a></li>
                        <li><a href="#" class="hover:text-primary transition">Mentorship Program</a></li>
                        <li><a href="#" class="hover:text-primary transition">Scholarship Opportunities</a></li>
                        <li><a href="#" class="hover:text-primary transition">Transcript Requests</a></li>
                        <li><a href="#" class="hover:text-primary transition">University Library Access</a></li>
                        <li><a href="#" class="hover:text-primary transition">Career Development</a></li>
                        <li><a href="#" class="hover:text-primary transition">Alumni Magazine</a></li>
                        <li><a href="#" class="hover:text-primary transition">Photo Gallery</a></li>
                    </ul>
                </div>

                <!-- Latest Tweets -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and alumni news.
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
                <p>&copy; 2025 Bayero University Kano Alumni Association. All Rights Reserved.</p>
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
            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    if (answer.classList.contains('hidden')) {
                        answer.classList.remove('hidden');
                        icon.classList.replace('ri-add-line', 'ri-subtract-line');
                    } else {
                        answer.classList.add('hidden');
                        icon.classList.replace('ri-subtract-line', 'ri-add-line');
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Registration Steps Interaction
            const stepItems = document.querySelectorAll('.step-item');
            const stepNumbers = document.querySelectorAll('.step-number');

            stepNumbers.forEach((number, index) => {
                number.addEventListener('click', function() {
                    // Reset all steps
                    stepItems.forEach(item => {
                        item.classList.remove('active');
                        item.querySelector('.step-number').classList.remove('bg-primary',
                            'text-white');
                        item.querySelector('.step-number').classList.add('bg-gray-200',
                            'text-gray-700');
                    });

                    // Activate clicked step and all previous steps
                    for (let i = 0; i <= index; i++) {
                        stepItems[i].classList.add('active');
                        stepItems[i].querySelector('.step-number').classList.remove('bg-gray-200',
                            'text-gray-700');
                        stepItems[i].querySelector('.step-number').classList.add('bg-primary',
                            'text-white');
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // File Upload Preview
            const fileInput = document.getElementById('certificate');
            const uploadLabel = fileInput.parentElement;

            fileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const fileName = this.files[0].name;
                    const filePreview = document.createElement('p');
                    filePreview.classList.add('text-primary', 'mt-2');
                    filePreview.textContent = `Selected file: ${fileName}`;

                    // Remove any existing preview
                    const existingPreview = uploadLabel.querySelector('p:not(:first-of-type)');
                    if (existingPreview) {
                        uploadLabel.removeChild(existingPreview);
                    }

                    uploadLabel.appendChild(filePreview);
                }
            });
        });
    </script>
</body>

</html>
