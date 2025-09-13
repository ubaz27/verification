<x-header>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .chapter-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .chapter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .chapter-panel {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .chapter-panel.hidden {
            display: none;
            opacity: 0;
            transform: translateY(-20px);
        }

        .chapter-filter-btn {
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .chapter-filter-btn:hover {
            transform: scale(1.05);
        }

        .chapter-filter-btn.active {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .map-placeholder {
            background: #e5e7eb;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
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
    <img src="{{ asset('img/alumni-collage.jpg') }}" alt="Alumni Gatherings Collage"
        class="absolute inset-0 w-full h-full object-cover opacity-50">
    <div class="text-center text-white relative z-10">
        <h1 class="text-5xl font-bold mb-4">Our Global Chapters</h1>
        <p class="text-xl">Connecting BUK Alumni Across the Globe</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="container mx-auto px-4 py-16">
    <div class="text-center max-w-3xl mx-auto">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Vibrant Communities Worldwide</h2>
        <p class="text-lg text-gray-600">
            The BUK Alumni Association is made up of vibrant chapters across Nigeria and abroad. These chapters serve as
            hubs for networking, mentorship, events, and community service, fostering lifelong connections among alumni
            based on location.
        </p>
    </div>
</section>

<!-- Chapters Grid -->
<section class="container mx-auto px-4 py-12">
    <div class="flex flex-col items-center justify-center mb-8 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Explore Our Chapters</h2>

        <!-- Chapter Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <button id="stateBtn"
                class="chapter-filter-btn active bg-primary text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-primary/90">
                State Chapters
            </button>
            <button id="yearBtn"
                class="chapter-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                Year Chapters
            </button>
            <button id="internationalBtn"
                class="chapter-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                International Chapters
            </button>
        </div>

        <!-- Search Input -->
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-4">
            <input type="text" id="searchInput" placeholder="Search chapters..."
                class="border border-gray-300 rounded px-4 py-2 text-gray-700 focus:outline-none focus:border-primary">
        </div>
    </div>

    <!-- Local Chapters -->
    <div id="localChapters" class="mb-12 chapter-panel">
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">State Chapters</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Abuja Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Abuja, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Dr. Amina Yusuf</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> abuja@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Monthly networking events, career workshops, and community outreach
                        programs.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Kaduna Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Kaduna, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Dr. Aliyu Hassan</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> kaduna@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Professional development, mentorship programs, and social gatherings.
                    </p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Kano Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Kano, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Mrs. Zainab Musa</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> kano@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Networking sessions, social impact projects, and alumni dinners.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>

                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Kwara Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Ilorin, Kwara, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Mr. Sulaiman Abdullahi</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> kwara@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Community service, alumni reunions, and educational workshops.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>

                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Lagos Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Lagos, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Engr. Chinedu Okeke</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> lagos@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Annual gala, mentorship programs, and professional development
                        seminars.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/nigeria-flag.png') }}" alt="Nigeria Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Niger Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Minna, Niger, Nigeria</p>
                    <p class="text-gray-600 mb-2"><strong>Chairperson:</strong> Alhaji Musa Ibrahim</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> niger@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Leadership forums, youth empowerment, and alumni outreach programs.
                    </p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- International Chapters -->
    <div id="internationalChapters" class="mb-12 chapter-panel">
        <div class="bg-blue-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">International Chapters</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/uk-flag.png') }}" alt="UK Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">UK Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> London, UK</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Ms. Fatima Bello</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> uk@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Quarterly meetups, cultural events, and scholarship fundraisers.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/usa-flag.png') }}" alt="USA Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">USA Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> New York, USA</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Dr. Ibrahim Suleiman</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> usa@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Annual conventions, professional networking, and student support
                        programs.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/canada-flag.png') }}" alt="Canada Flag" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Canada Chapter</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Location:</strong> Toronto, Canada</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Mrs. Aisha Mohammed</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> canada@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">Bi-annual meetups, career development workshops, and community
                        service.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Year Chapters -->
    <div id="yearChapters" class="mb-12 chapter-panel">
        <div class="bg-green-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Year Chapters</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/class-icon.png') }}" alt="Class Icon" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Class of 2010</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Graduation Year:</strong> 2010</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Dr. Maryam Usman</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> class2010@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">15-year reunion planning, mentorship programs, and class directory
                        updates.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/class-icon.png') }}" alt="Class Icon" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Class of 2015</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Graduation Year:</strong> 2015</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Engr. Yakubu Tanko</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> class2015@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">10-year reunion celebration, career development sessions, and
                        networking events.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
                <div class="chapter-card bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('img/class-icon.png') }}" alt="Class Icon" class="w-8 h-8 mr-2">
                        <h3 class="text-xl font-semibold text-gray-800">Class of 2020</h3>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Graduation Year:</strong> 2020</p>
                    <p class="text-gray-600 mb-2"><strong>Coordinator:</strong> Ms. Hauwa Abdullahi</p>
                    <p class="text-gray-600 mb-2"><strong>Contact:</strong> class2020@bukalumni.org.ng</p>
                    <p class="text-gray-600 mb-4">5-year reunion planning, professional mentorship, and virtual
                        networking sessions.</p>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">View
                        Chapter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <a href="#"
            class="bg-secondary text-white px-8 py-3 !rounded-button font-semibold hover:bg-secondary/90 transition text-lg">Explore
            All Chapters</a>
    </div>
</section>
{{--
    <!-- Interactive Map -->
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Find a Chapter Near You</h2>
        <div class="map-placeholder rounded-lg">
            <p class="text-gray-600 text-lg">Interactive map coming soon! View chapter locations worldwide.</p>
        </div>
    </section> --}}

<!-- Start a Chapter -->
<section class="container mx-auto px-4 py-12 bg-primary text-white text-center">
    <h2 class="text-3xl font-semibold mb-4">Start a Chapter in Your Area</h2>
    <p class="text-lg max-w-2xl mx-auto mb-6">
        Don’t see a chapter in your region? Take the lead and bring BUK alumni together! Learn how to start a chapter
        and connect with our team for support.
    </p>
    <div class="flex justify-center space-x-4">
        <a href="#"
            class="bg-white text-primary px-6 py-3 !rounded-button font-medium hover:bg-gray-100 transition">View
            Guidelines</a>

        {{-- <a href="#" class="border border-white text-white px-6 py-3 !rounded-button font-medium hover:bg-white hover:text-primary transition">View Guidelines</a>
      --}}
    </div>
</section>

<!-- Upcoming Chapter Events -->
{{-- <section class="container mx-auto px-4 py-12">
    <div class="flex flex-col items-center justify-center mb-8 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Upcoming Chapter Events</h2>
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-4">
            <select class="border border-gray-300 rounded px-4 py-2 text-gray-700">
                <option value="">Filter by Chapter</option>
                <option value="abuja">Abuja</option>
                <option value="lagos">Lagos</option>
                <option value="uk">UK</option>
                <option value="kwara">Kwara</option>
                <option value="kano">Kano</option>
                <option value="niger">Niger</option>
            </select>
            <select class="border border-gray-300 rounded px-4 py-2 text-gray-700">
                <option value="">Filter by Month</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
            </select>
        </div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Abuja Networking Night</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> June 10, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> Abuja, Nigeria</p>
            <p class="text-gray-600 mb-4">Join us for an evening of networking and professional growth.</p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Lagos Annual Gala</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> July 15, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> Lagos, Nigeria</p>
            <p class="text-gray-600 mb-4">Celebrate with fellow alumni at our signature event.</p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">UK Summer Meetup</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> August 3, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> London, UK</p>
            <p class="text-gray-600 mb-4">A fun summer gathering for UK-based alumni and their families.</p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Kwara Community Service Day</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> June 22, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> Ilorin, Kwara, Nigeria</p>
            <p class="text-gray-600 mb-4">Join us for a day of giving back to the community and making a difference.
            </p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Kano Alumni Dinner</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> September 5, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> Kano, Nigeria</p>
            <p class="text-gray-600 mb-4">An evening of celebration, networking, and reconnecting with old friends.</p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Niger Youth Empowerment Forum</h3>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> July 28, 2025</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> Minna, Niger, Nigeria</p>
            <p class="text-gray-600 mb-4">Empowering the next generation of leaders through workshops and mentorship.
            </p>
            <a href="#" class="text-primary font-medium hover:underline">Learn More</a>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <a href="#"
            class="bg-secondary text-white px-8 py-3 !rounded-button font-semibold hover:bg-secondary/90 transition text-lg">View
            All Chapter Events</a>
    </div>
</section> --}}

<!-- Photo Highlights / Testimonials -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Chapter Highlights</h2>
    <div class="carousel mb-12">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="{{ asset('img/bukaa7.jpeg') }}" alt="Abuja Chapter Event"
                    class="w-full h-96 object-cover rounded-lg">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/alumni-convocation-2.jpg') }}" alt="Lagos Chapter Gala"
                    class="w-full h-96 object-cover rounded-lg">
            </div>
        </div>
    </div>

    {{-- WHEN DATA IS AVAILABLE --}}
    {{-- <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600 italic mb-4">"The Abuja Chapter has been a game-changer for my career. The
                networking events helped me connect with mentors and peers who share my passion."</p>
            <p class="text-gray-800 font-semibold">– Dr. Amina Yusuf, Abuja Chapter</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600 italic mb-4">"Being part of the UK Chapter feels like home away from home. The
                cultural events bring us together as a family."</p>
            <p class="text-gray-800 font-semibold">– Ms. Fatima Bello, UK Chapter</p>
        </div>
    </div> --}}
</section>

<!-- Contact & Support -->
{{-- <section class="container mx-auto px-4 py-12 bg-gray-100">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Get in Touch</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6 text-center">
        Need help finding a chapter or starting one? Contact our Alumni Relations Office for support.
    </p>
    <form class="max-w-lg mx-auto space-y-4">
        <div>
            <input type="text" placeholder="Your Name"
                class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
        </div>
        <div>
            <input type="email" placeholder="Your Email"
                class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
        </div>
        <div>
            <textarea placeholder="Your Message"
                class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary"
                rows="4"></textarea>
        </div>
        <button type="submit"
            class="w-full bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">Send
            Message</button>
    </form>
</section> --}}

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

        // Chapter filtering functionality with buttons
        const stateBtn = document.getElementById('stateBtn');
        const yearBtn = document.getElementById('yearBtn');
        const internationalBtn = document.getElementById('internationalBtn');
        const searchInput = document.getElementById('searchInput');

        const localChapters = document.getElementById('localChapters');
        const yearChapters = document.getElementById('yearChapters');
        const internationalChapters = document.getElementById('internationalChapters');

        const filterButtons = document.querySelectorAll('.chapter-filter-btn');

        // Function to show/hide chapters based on selection
        function showChapters(type) {
            // Hide all panels first
            localChapters.classList.add('hidden');
            yearChapters.classList.add('hidden');
            internationalChapters.classList.add('hidden');

            // Show selected panel with animation
            setTimeout(() => {
                switch (type) {
                    case 'state':
                        localChapters.classList.remove('hidden');
                        break;
                    case 'year':
                        yearChapters.classList.remove('hidden');
                        break;
                    case 'international':
                        internationalChapters.classList.remove('hidden');
                        break;
                }
            }, 150);
        }

        // Function to update button states
        function updateButtonStates(activeButton) {
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.classList.add('bg-gray-200', 'text-gray-700');
                btn.classList.remove('bg-primary', 'text-white');
            });

            activeButton.classList.add('active');
            activeButton.classList.remove('bg-gray-200', 'text-gray-700');
            activeButton.classList.add('bg-primary', 'text-white');
        }

        // Button event listeners
        stateBtn.addEventListener('click', function() {
            showChapters('state');
            updateButtonStates(this);
        });

        yearBtn.addEventListener('click', function() {
            showChapters('year');
            updateButtonStates(this);
        });

        internationalBtn.addEventListener('click', function() {
            showChapters('international');
            updateButtonStates(this);
        });

        // Initialize with State Chapters visible
        showChapters('state');

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const chapterCards = document.querySelectorAll('.chapter-card');

            chapterCards.forEach(card => {
                const chapterText = card.textContent.toLowerCase();
                if (chapterText.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Carousel functionality
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        if (carouselInner && items.length > 0) {
            function showNextItem() {
                currentIndex = (currentIndex + 1) % items.length;
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            setInterval(showNextItem, 5000); // Auto-slide every 5 seconds
        }
    });
</script>
