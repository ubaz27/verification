<x-header>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .news-card,
        .event-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover,
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .carousel {
            overflow: hidden;
            position: relative;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 100%;
        }

        .tab {
            cursor: pointer;
        }

        .tab.active {
            border-bottom: 3px solid #00a0b0;
            color: #00a0b0;
        }

        @media (max-width: 768px) {
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
</x-header>

<!-- Page Header -->
<section class="relative bg-gray-800 h-96 flex items-center justify-center">
    <img src="{{ asset('img/alumni-event-hero.jpg') }}" alt="Alumni Event"
        class="absolute inset-0 w-full h-full object-cover opacity-50">
    <div class="text-center text-white relative z-10">
        <h1 class="text-5xl font-bold mb-4">News & Events</h1>
        <p class="text-xl">Stay Connected. Stay Informed.</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="container mx-auto px-4 py-16">
    <div class="text-center max-w-3xl mx-auto">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">What's Happening at BUK Alumni</h2>
        <p class="text-lg text-gray-600">
            Catch up on the latest happenings in the BUK Alumni community — from headline-making achievements to
            upcoming gatherings, lectures, reunions, and more.
        </p>
    </div>
</section>

<!-- Featured News/Event Banner -->
<section class="container mx-auto px-4 py-12 bg-primary text-white text-center">
    <h2 class="text-3xl font-semibold mb-4">35TH ANNUAL GENERAL MEETING AGM 2025</h2>
    <p class="text-lg max-w-2xl mx-auto mb-6">
        Join us for a grand celebration of BUK’s ALUMNI AGM on 6th September, 2025. Connect with alumni across Nigeria
        and
        beyond!
    </p>
    <a href="#"
        class="bg-white text-primary px-6 py-3 !rounded-button font-medium hover:bg-gray-100 transition">Register
        Now</a>
</section>

<!-- Tabbed Layout Section -->
<section class="container mx-auto px-4 py-12">
    <!-- News Section -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Latest News</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
        {{-- <div class="news-card bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">New Executive Committee Elected at AGM</h3>
            <p class="text-gray-600 mb-2">May 10, 2025</p>
            <p class="text-gray-600 mb-4">The Annual General Meeting saw the election of a new executive team to lead
                BUKAA for the next term.</p>
            <a href="#" class="text-primary font-medium hover:underline">Read More</a>
        </div> --}}
        @foreach ($new as $item)
            <div class="news-card bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->title }}
                </h3>
                <p class="text-gray-600 mb-2">{{ $item->date }}</p>
                <p class="text-gray-600 mb-4">{{ $item->details }}</p>
                {{-- <a href="#" class="text-primary font-medium hover:underline">Read More</a> --}}
            </div>
        @endforeach


    </div>
    <div class="flex justify-center mb-12">
        <a href="#"
            class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">View More
            News</a>
    </div>

    <!-- Events Section -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Upcoming Events</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
        {{-- <div class="event-card bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Annual General Meeting 2025</h3>
                <p class="text-gray-600 mb-2"><strong>Date:</strong> June 15, 2025, 10:00 AM</p>
                <p class="text-gray-600 mb-2"><strong>Type:</strong> AGM</p>
                <p class="text-gray-600 mb-4">Join us for the annual gathering to discuss the association's progress and future plans.</p>
                <a href="#" class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">Register Now</a>
            </div> --}}
        @foreach ($events as $item)
            <div class="event-card bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->title }}</h3>
                <p class="text-gray-600 mb-2"><strong>Date:</strong> {{ $item->date . ' ' . $item->time }}</p>
                {{-- <p class="text-gray-600 mb-2"><strong>Type:</strong> Public Lecture</p> --}}
                <p class="text-gray-600 mb-4">{{ $item->details }}</p>
                {{-- <a href="#"
                    class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                    Details</a> --}}
            </div>
        @endforeach


    </div>
    <div class="flex justify-center">
        <a href="#"
            class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">View More
            Events</a>
    </div>
</section>



<!-- Photo & Video Highlights -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Event Highlights</h2>
    <div class="carousel mb-12">
        <div class="carousel-inner">
            <div class="carousel-item flex gap-8">
                <div class="w-1/2">
                    <img src="{{ asset('img/event-2.jpg') }}" alt="AGM 2024"
                        class="w-full h-96 object-cover rounded-lg">
                    <p class="text-center text-gray-600 mt-2">Annual General Meeting, June 2024</p>
                </div>
                <div class="w-1/2">
                    <img src="{{ asset('img/event-1.jpg') }}" alt="Public Lecture 2024"
                        class="w-full h-96 object-cover rounded-lg">
                    <p class="text-center text-gray-600 mt-2">Public Lecture, April 2024</p>
                </div>
            </div>
            <div class="carousel-item flex gap-8">
                <div class="w-1/2">
                    <img src="{{ asset('img/event-3.jpg') }}" alt="Reunion 2023"
                        class="w-full h-96 object-cover rounded-lg">
                    <p class="text-center text-gray-600 mt-2">National Alumni Reunion, August 2023</p>
                </div>
                <div class="w-1/2">
                    <img src="{{ asset('img/event-4.jpg') }}" alt="Charity Walk 2023"
                        class="w-full h-96 object-cover rounded-lg">
                    <p class="text-center text-gray-600 mt-2">Charity Walk, December 2023</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <!-- Call to Action -->
    <section class="container mx-auto px-4 py-12 bg-gray-100 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Be Part of Our Story</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6">
            Have news to share or an event to promote? Let’s celebrate your achievements and keep the BUK community connected.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">Share Your News</a>
            <a href="#" class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">Submit an Event</a>
            <a href="#" class="border border-primary text-primary px-6 py-3 !rounded-button font-medium hover:bg-primary hover:text-white transition">Subscribe for Updates</a>
        </div>
    </section> --}}

<!-- Social Media Integration -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Follow Us on Social Media</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="ri-twitter-x-fill text-primary text-2xl mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Twitter/X</h3>
            </div>
            <p class="text-gray-600">Latest tweet placeholder: "Excited for the National Reunion 2025! Join us!
                #BUKAlumni"</p>
            <a href="#" class="text-primary font-medium hover:underline mt-2 inline-block">Follow @BUKAlumni</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="ri-facebook-fill text-primary text-2xl mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Facebook</h3>
            </div>
            <p class="text-gray-600">Latest post placeholder: "Check out photos from our last AGM!"</p>
            <a href="#" class="text-primary font-medium hover:underline mt-2 inline-block">Like Our Page</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="ri-instagram-fill text-primary text-2xl mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Instagram</h3>
            </div>
            <p class="text-gray-600">Latest post placeholder: "Throwback to our 2024 Lecture Series!"</p>
            <a href="#" class="text-primary font-medium hover:underline mt-2 inline-block">Follow @BUKAlumni</a>
        </div>
    </div>
</section>

<!-- Footer -->
<x-footer></x-footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const menuButton = document.querySelector('button.md\\:hidden');
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
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Home</a></li>
                        <li><a href="#" class="block py-2 text-primary font-medium border-l-4 border-primary pl-3">About Us</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Events</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Gallery</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Resources</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-primary font-medium">Contact</a></li>
                    </ul>
                </nav>
                <div class="p-4 mt-4">
                    <a href="#" class="block text-center text-white bg-primary hover:bg-primary/90 px-5 py-3 !rounded-button whitespace-nowrap">Join Now</a>
                </div>
            `;
        document.body.appendChild(mobileMenu);
        // Tabbed layout toggle
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.add('hidden'));
                tab.classList.add('active');
                document.getElementById(tab.textContent.toLowerCase().replace(' & ', '-') +
                    '-content').classList.remove('hidden');
            });
        });

        // Carousel functionality
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showNextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        setInterval(showNextItem, 5000); // Auto-slide every 5 seconds
    });
</script>
