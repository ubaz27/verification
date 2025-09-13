<x-header>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Poppins', sans-serif;
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
    </style>
</x-header>

<!-- Hero Banner -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/bukaa6.jpg') }}" alt="BUK Campus" class="w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-primary/60"></div>
    </div>
    <div class="container mx-auto px-4 z-10 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Executive Profile</h1>
        <p class="text-lg md:text-xl text-white/90 font-light">{{ $executive->name }}</p>
    </div>
</section>

<!-- Executive Profile Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Navigation -->
            <div class="mb-8">
                <a href="{{ route('executives.index') }}"
                    class="inline-flex items-center text-primary hover:text-primary/80 font-medium">
                    <i class="ri-arrow-left-line mr-2"></i>
                    Back to All Executives
                </a>
            </div>

            <!-- Profile Header -->
            <div class="bg-gray-50 rounded-lg p-8 mb-8">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <div class="flex-shrink-0">
                        <img src="{{ asset($executive->avatar) }}" alt="{{ $executive->name }}"
                            class="w-48 h-48 rounded-lg object-cover shadow-md">

                    </div>
                    <div class="flex-grow text-center md:text-left">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $executive->name }}</h1>
                        <p class="text-xl text-primary font-semibold mb-4">{{ $executive->designation }}</p>
                        <p class="text-gray-700 leading-relaxed mb-4 justify-start" style="text-align: justify">
                            {{ $executive->bio }}</p>

                        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                            <div class="flex items-center text-gray-600">
                                <i class="ri-graduation-cap-line mr-2"></i>
                                <span class="font-medium">Education:</span>
                            </div>
                            <span class="text-gray-700">{{ $executive->education }}</span>
                        </div>

                        <div class="flex flex-wrap gap-4 justify-center md:justify-start mt-2">
                            <div class="flex items-center text-gray-600">
                                <i class="ri-briefcase-line mr-2"></i>
                                <span class="font-medium">Profession:</span>
                            </div>
                            <span class="text-gray-700">{{ $executive->profession }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievements Section -->
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="ri-trophy-line text-primary mr-3"></i>
                    Key Achievements
                </h2>

                <div class="grid gap-4">
                    @foreach ($executive->achievements as $achievement)
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex items-center justify-center text-primary mr-3 flex-shrink-0 mt-1">
                                <i class="ri-check-line"></i>
                            </div>
                            <p class="text-gray-700">{{ $achievement }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Contact/Connect Section -->
            <div class="mt-8 bg-primary/5 rounded-lg p-8 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Connect with Our Leadership</h3>
                <p class="text-gray-700 mb-6">Our executives are committed to serving the alumni community and advancing
                    the goals of BUK Alumni Association.</p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('executives.index') }}"
                        class="bg-primary hover:bg-primary/90 text-white font-medium px-6 py-3 rounded-lg">
                        View All Executives
                    </a>
                    <a href="{{ url('/about') }}"
                        class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium px-6 py-3 rounded-lg">
                        About the Association
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<x-footer></x-footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const menuButton = document.querySelector('button.md\\:hidden');
        if (menuButton) {
            const mobileMenu = document.createElement('div');
            mobileMenu.className =
                'fixed inset-0 bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out';
            mobileMenu.innerHTML = `
                    <div class="flex justify-between items-center p-4 border-b">
                        <h1 class="text-2xl font-['Pacifico'] text-primary">BUK Alumni</h1>
                        <button class="w-10 h-10 flex items-center justify-center text-gray-700">
                            <i class="ri-close-line ri-lg"></i>
                        </button>
                    </div>
                    <nav class="p-4">
                        <ul class="space-y-4">
                            <li><a href="/" class="block py-2 text-gray-800 hover:text-primary font-medium">Home</a></li>
                            <li><a href="/about" class="block py-2 text-gray-800 hover:text-primary font-medium">About Us</a></li>
                            <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Events</a></li>
                            <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Gallery</a></li>
                            <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Resources</a></li>
                            <li><a href="/contact" class="block py-2 text-gray-800 hover:text-primary font-medium">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="p-4 mt-4">
                        <a href="#" class="block text-center text-white bg-primary hover:bg-primary/90 px-5 py-3 rounded-lg">Join Now</a>
                    </div>
                `;
            document.body.appendChild(mobileMenu);

            menuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-full');
            });

            const closeButton = mobileMenu.querySelector('button');
            closeButton.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });
        }
    });
</script>
</body>

</html>
