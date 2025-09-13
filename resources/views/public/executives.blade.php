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
<section class="relative h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/bukaa6.jpg') }}" alt="BUK Campus" class="w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-primary/60"></div>
    </div>
    <div class="container mx-auto px-4 z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Executives</h1>
        <p class="text-xl md:text-2xl text-white/90 font-light">Meet the Leadership Team</p>
    </div>
</section>

<!-- Executives Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">BUKAA Elected Executives</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">Meet the dedicated leaders who drive the vision and mission
                    of the Bayero University Kano Alumni Association.</p>
            </div>

            <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
                @foreach ($executives as $executive)
                    <div
                        class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset($executive->avatar) }}" alt="{{ $executive->name }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $executive->name }}</h3>
                            <p class="text-primary font-medium mb-3">{{ $executive->designation }}</p>
                            <p class="text-gray-700 text-sm mb-4">{{ Str::limit($executive->bio, 100) }}</p>
                            <a href="{{ route('executives.show', $executive->id) }}"
                                class="inline-flex items-center text-primary hover:text-primary/80 font-medium">
                                View Profile
                                <i class="ri-arrow-right-line ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ url('/about') }}"
                    class="inline-flex items-center bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium px-6 py-3 rounded-lg">
                    <i class="ri-arrow-left-line mr-2"></i>
                    Back to About Us
                </a>
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
