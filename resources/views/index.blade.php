<x-header></x-header>

<!-- Hero Section -->
<section class="hero-section w-full h-screen flex items-center justify-center text-white pt-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Authenticity Verified – NITT</h1>
        <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">Authenticity You Can Trust — Instant Certificate
            Verification.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ url('/member/login') }}"
                class="bg-primary text-white px-8 py-3 !rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Login
                Us</a>

        </div>
        <div class="mt-16 animate-bounce">
            <a href="#about" class="inline-block">
                <i class="ri-arrow-down-line ri-2x"></i>
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-2/5">
                <img src="{{ asset('img/dg.jpeg') }}" alt="BUK Alumni Convocation"
                    class="rounded-lg shadow-lg w-full h-auto object-cover">
            </div>
            <div class="md:w-3/5">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">About NITT</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-primary">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Our Mission</h3>

                        <p class="text-gray-700 text-justify">To systematically provide and offer research and
                            consultancy services to private and public transport agencies for the achievement of
                            management excellence in all modes of transport in Nigeria and the West African Sub-region.
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-primary">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Our Vision</h3>
                        <p class="text-gray-700 text-justify">The Nigerian Institute of Transport Technology has a
                            vision to become an internationally recognized center of excellence, providing world-class
                            professional training, research, advice, and solutions to all issues relating to
                            transportation in Nigeria and Africa.
                        </p>
                    </div>
                </div>

                {{-- <h3 class="text-xl font-semibold mb-3 text-gray-800">Our History</h3>
                <ul class="list-disc pl-5 mb-8 text-gray-700 space-y-2">

                    <li>Have over 25 different program to enrol</li>
                    <li>Ver</li>
                </ul>

                <a href="{{ url('/about') }}"
                    class="inline-block bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Read
                    More</a> --}}
            </div>
        </div>
    </div>
</section>
<!-- Events Section -->
<!-- Events Section -->

<!-- Get Involved Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Verify Certificate</h2>
            <p class="text-gray-600 max-w-2xl mx-auto"></p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Donate -->
            <div
                class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition-all duration-300 group">
                <div
                    class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="ri-hand-heart-line ri-xl text-primary group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Register</h3>
                <p class="text-gray-600 mb-6">Sign Up </p>
                {{-- <a href="#" class="inline-block text-primary font-medium hover:underline">Learn More <i
                        class="ri-arrow-right-line align-middle ml-1"></i></a> --}}
            </div>

            <!-- Volunteer -->
            <div
                class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition-all duration-300 group">
                <div
                    class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="ri-team-line ri-xl text-primary group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Update Profile</h3>
                <p class="text-gray-600 mb-6">Profile Update.</p>
                {{-- <a href="#" class="inline-block text-primary font-medium hover:underline">Learn More <i
                        class="ri-arrow-right-line align-middle ml-1"></i></a> --}}
            </div>

            <!-- Mentor -->
            <div
                class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition-all duration-300 group">
                <div
                    class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="ri-user-star-line ri-xl text-primary group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Submit</h3>
                <p class="text-gray-600 mb-6">Provide Certificate Number</p>
                {{-- <a href="#" class="inline-block text-primary font-medium hover:underline">Learn More <i
                        class="ri-arrow-right-line align-middle ml-1"></i></a> --}}
            </div>

            <!-- Partner -->
            <div
                class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition-all duration-300 group">
                <div
                    class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="ri-building-line ri-xl text-primary group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Verification</h3>
                <p class="text-gray-600 mb-6">Get Result</p>
                {{-- <a href="#" class="inline-block text-primary font-medium hover:underline">Learn More <i
                        class="ri-arrow-right-line align-middle ml-1"></i></a> --}}
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ url('/contact') }}"
                class="inline-block bg-primary text-white px-8 py-3 !rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Contact
                Us to Get Started</a>
        </div>
    </div>
</section>
<!-- Testimonials Section -->
{{-- To be activated later when data is available --}}
{{-- <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Alumni Voices</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Hear from our distinguished alumni about their experiences
                and the impact of their BUK education.</p>
        </div>

        <div class="relative max-w-4xl mx-auto">
            <div class="overflow-hidden" id="testimonials-container">
                <div class="flex transition-transform duration-500" id="testimonials-slider">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card w-full flex-shrink-0 bg-white rounded-lg p-8 border border-gray-100">
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ url('img/alumni.jpeg') }}" alt="Dr. Ibrahim Musa"
                                    class="w-full h-full object-cover object-top">
                            </div>
                            <div>
                                <div class="mb-4 text-primary">
                                    <i class="ri-double-quotes-l ri-2x opacity-20"></i>
                                </div>
                                <p class="text-gray-700 italic mb-6">My years at BUK laid the foundation for my
                                    career in international finance. The rigorous academic program and supportive
                                    faculty challenged me to think critically and pursue excellence. The alumni
                                    network has been invaluable throughout my professional journey.</p>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800">Dr. Ibrahim Musa</h4>
                                    <p class="text-gray-600">Class of 2005, Economics</p>
                                    <p class="text-primary font-medium">Chief Financial Officer, African
                                        Development Bank</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="testimonial-card w-full flex-shrink-0 bg-white rounded-lg p-8 border border-gray-100">
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ url('img/alumni3.jpeg') }}" alt="Fatima Ahmed"
                                    class="w-full h-full object-cover object-top">
                            </div>
                            <div>
                                <div class="mb-4 text-primary">
                                    <i class="ri-double-quotes-l ri-2x opacity-20"></i>
                                </div>
                                <p class="text-gray-700 italic mb-6">The research opportunities I had at BUK opened
                                    doors to international collaborations. Today, I'm proud to represent African
                                    innovation on the global stage. I regularly return to mentor students and give
                                    back to the institution that shaped my career.</p>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800">Fatima Ahmed</h4>
                                    <p class="text-gray-600">Class of 2012, Computer Science</p>
                                    <p class="text-primary font-medium">Tech Entrepreneur & CEO, InnovateTech
                                        Nigeria</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="testimonial-card w-full flex-shrink-0 bg-white rounded-lg p-8 border border-gray-100">
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ url('img/alumni.jpeg') }}" alt="Prof. Abdullahi Hassan"
                                    class="w-full h-full object-cover object-top">
                            </div>
                            <div>
                                <div class="mb-4 text-primary">
                                    <i class="ri-double-quotes-l ri-2x opacity-20"></i>
                                </div>
                                <p class="text-gray-700 italic mb-6">My BUK education provided me with both
                                    technical expertise and cultural understanding that has been essential in my
                                    diplomatic career. The diverse student body and emphasis on ethical leadership
                                    prepared me to represent Nigeria on the international stage.</p>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800">Prof. Abdullahi Hassan</h4>
                                    <p class="text-gray-600">Class of 1995, International Relations</p>
                                    <p class="text-primary font-medium">Nigerian Ambassador to the United Nations
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial Navigation -->
            <div class="flex justify-center mt-8 gap-2">
                <button class="w-3 h-3 rounded-full bg-gray-300 focus:outline-none testimonial-dot active"
                    data-index="0"></button>
                <button class="w-3 h-3 rounded-full bg-gray-300 focus:outline-none testimonial-dot"
                    data-index="1"></button>
                <button class="w-3 h-3 rounded-full bg-gray-300 focus:outline-none testimonial-dot"
                    data-index="2"></button>
            </div>

            <!-- Navigation Arrows -->
            <button
                class="absolute top-1/2 -left-12 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-3 hover:bg-gray-100 focus:outline-none hidden md:block"
                id="prev-testimonial">
                <i class="ri-arrow-left-s-line ri-lg text-gray-700"></i>
            </button>
            <button
                class="absolute top-1/2 -right-12 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-3 hover:bg-gray-100 focus:outline-none hidden md:block"
                id="next-testimonial">
                <i class="ri-arrow-right-s-line ri-lg text-gray-700"></i>
            </button>
        </div>
    </div>
</section> --}}
{{--
    <!-- Newsletter Section -->
    <section class="newsletter-section py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Stay Updated with BUK Alumni News</h2>
                <p class="text-gray-600 mb-8">Subscribe to our newsletter for the latest events, opportunities, and alumni stories.</p>

                <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                    <div class="flex-grow">
                        <input type="email" placeholder="Your email address" class="w-full px-4 py-3 border border-gray-300 !rounded-button focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <button type="submit" class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Subscribe</button>
                </form>

                <div class="mt-4 text-sm text-gray-500">
                    <label class="custom-checkbox">
                        <input type="checkbox" id="privacy-consent">
                        <span class="checkbox-indicator"></span>
                        <span>I agree to receive emails and accept the <a href="#" class="text-primary hover:underline">Privacy Policy</a></span>
                    </label>
                </div>
            </div>
        </div>
    </section> --}}


<x-footer></x-footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Events Carousel
        const eventsContainer = document.getElementById('events-container');
        const prevEventBtn = document.getElementById('prev-event');
        const nextEventBtn = document.getElementById('next-event');
        const eventCards = eventsContainer.querySelectorAll('.event-card');
        const cardWidth = eventCards[0].offsetWidth + 24; // Width + gap

        let currentEventIndex = 0;

        function scrollEvents(direction) {
            if (direction === 'next') {
                currentEventIndex = Math.min(currentEventIndex + 1, eventCards.length - 1);
            } else {
                currentEventIndex = Math.max(currentEventIndex - 1, 0);
            }

            eventsContainer.scrollTo({
                left: cardWidth * currentEventIndex,
                behavior: 'smooth'
            });
        }

        prevEventBtn.addEventListener('click', () => scrollEvents('prev'));
        nextEventBtn.addEventListener('click', () => scrollEvents('next'));
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Testimonials Slider
        const testimonialsSlider = document.getElementById('testimonials-slider');
        const testimonialDots = document.querySelectorAll('.testimonial-dot');
        const prevTestimonialBtn = document.getElementById('prev-testimonial');
        const nextTestimonialBtn = document.getElementById('next-testimonial');

        let currentTestimonialIndex = 0;
        const testimonialCount = testimonialDots.length;

        function showTestimonial(index) {
            currentTestimonialIndex = index;
            testimonialsSlider.style.transform = `translateX(-${index * 100}%)`;

            // Update active dot
            testimonialDots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('bg-primary');
                    dot.classList.remove('bg-gray-300');
                } else {
                    dot.classList.remove('bg-primary');
                    dot.classList.add('bg-gray-300');
                }
            });
        }

        // Dot navigation
        testimonialDots.forEach((dot, index) => {
            dot.addEventListener('click', () => showTestimonial(index));
        });

        // Arrow navigation
        prevTestimonialBtn.addEventListener('click', () => {
            let newIndex = currentTestimonialIndex - 1;
            if (newIndex < 0) newIndex = testimonialCount - 1;
            showTestimonial(newIndex);
        });

        nextTestimonialBtn.addEventListener('click', () => {
            let newIndex = currentTestimonialIndex + 1;
            if (newIndex >= testimonialCount) newIndex = 0;
            showTestimonial(newIndex);
        });

        // Auto-play testimonials
        let testimonialInterval = setInterval(() => {
            let newIndex = currentTestimonialIndex + 1;
            if (newIndex >= testimonialCount) newIndex = 0;
            showTestimonial(newIndex);
        }, 5000);

        // Pause auto-play on hover
        const testimonialsContainer = document.getElementById('testimonials-container');
        testimonialsContainer.addEventListener('mouseenter', () => {
            clearInterval(testimonialInterval);
        });

        testimonialsContainer.addEventListener('mouseleave', () => {
            testimonialInterval = setInterval(() => {
                let newIndex = currentTestimonialIndex + 1;
                if (newIndex >= testimonialCount) newIndex = 0;
                showTestimonial(newIndex);
            }, 5000);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Custom checkbox functionality
        const checkbox = document.getElementById('privacy-consent');
        const checkboxIndicator = document.querySelector('.checkbox-indicator');

        checkboxIndicator.addEventListener('click', function() {
            checkbox.checked = !checkbox.checked;
        });
    });
</script>
</body>

</html>
