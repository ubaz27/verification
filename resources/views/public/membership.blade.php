<x-header></x-header>

<style>
    p {
        text-align: justify;
    }
</style>

<!-- Hero Section -->
<section class="hero-section py-20 md:py-32 w-full"
    style="background-image: linear-gradient(rgba(0, 160, 176, 0.7), rgba(0, 160, 176, 0.7)), url('{{ asset('img/bukaa1.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 w-full flex flex-col items-center justify-center text-center">
        <div class="max-w-3xl w-full">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Join the BUK Alumni Community</h1>
            <p class="text-xl md:text-2xl text-white mb-8">Stay Connected, Empowered, and Involved</p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#registration"
                    class="bg-white text-primary px-6 py-3 font-semibold !rounded-button whitespace-nowrap text-center hover:bg-gray-100 transition">Become
                    a Member</a>
                <a href="{{ url('/member/login') }}"
                    class="bg-transparent border-2 border-white text-white px-6 py-3 font-semibold !rounded-button whitespace-nowrap text-center hover:bg-white/10 transition">Login
                    to Portal</a>
            </div>
        </div>
    </div>
</section>

<!-- Value Proposition -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Join the BUK Alumni Association?</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Becoming a member of the Bayero University Kano Alumni
                Association connects you to a powerful network of professionals, provides exclusive benefits, and
                allows you to give back to your alma mater.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-team-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Networking Opportunities</h3>
                <p class="text-gray-600">Connect with fellow alumni across various industries and build meaningful
                    professional relationships that can advance your career.</p>
            </div>

            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-calendar-event-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Exclusive Events</h3>
                <p class="text-gray-600">Gain access to exclusive alumni gatherings, reunions, workshops, and
                    professional development events throughout the year.</p>
            </div>

            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-briefcase-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Job Board Access</h3>
                <p class="text-gray-600">Browse and apply for job opportunities shared exclusively with BUK alumni,
                    and post openings for fellow graduates.</p>
            </div>

            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-user-star-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Mentorship & Scholarship Programs</h3>
                <p class="text-gray-600">Participate in our mentorship program as either a mentor or mentee,
                    sharing knowledge and growing professionally. Also get the opportunity to apply for wide range of
                    scholarships</p>
            </div>

            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-notification-3-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">University Updates</h3>
                <p class="text-gray-600">Stay informed about the latest developments, achievements, and news from
                    Bayero University Kano.</p>
            </div>

            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="ri-hand-heart-line ri-xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Giving Back Initiatives</h3>
                <p class="text-gray-600">Contribute to scholarships, campus improvements, and other initiatives
                    that support current students and the university.</p>
            </div>
        </div>
    </div>
</section>

<!-- Membership Categories -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Membership Categories</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Choose the membership type that best suits your connection
                to Bayero University Kano.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Regular Membership -->
            <div class="bg-white rounded shadow-md hover:shadow-lg transition overflow-hidden">
                <div class="bg-primary text-white p-4 text-center">
                    <h3 class="text-xl font-semibold">Regular Membership</h3>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Eligibility</h4>
                        <p class="text-gray-600">All graduates of Bayero University Kano with a recognized degree,
                            diploma, or certificate.</p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Benefits</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Full voting rights in association elections</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Access to all alumni events and programs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Eligibility to run for leadership positions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Complete access to job board and career services</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Registration Fees</h4>
                        {{-- <p class="text-gray-600">₦5,000 per year</p> --}}
                        <p class="text-gray-600">-</p>
                    </div>
                    <a href="#registration"
                        class="block text-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Register
                        Now</a>
                </div>
            </div>

            <!-- Associate Membership -->
            <div class="bg-white rounded shadow-md hover:shadow-lg transition overflow-hidden">
                <div class="bg-primary text-white p-4 text-center">
                    <h3 class="text-xl font-semibold">Associate Membership</h3>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Eligibility</h4>
                        <p class="text-gray-600">Former faculty, staff, and friends of the university who did not
                            graduate from Bayero University.</p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Benefits</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Participation in selected alumni events</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Subscription to alumni newsletter</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Limited access to networking opportunities</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Invitation to public university functions</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Registration Fees</h4>
                        <p class="text-gray-600">-</p>
                    </div>
                    <a href="#registration"
                        class="block text-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Register
                        Now</a>
                </div>
            </div>

            <!-- Honorary Membership -->
            <div class="bg-white rounded shadow-md hover:shadow-lg transition overflow-hidden">
                <div class="bg-primary text-white p-4 text-center">
                    <h3 class="text-xl font-semibold">Honorary Membership</h3>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Eligibility</h4>
                        <p class="text-gray-600">Distinguished individuals who have made significant contributions
                            to BUK or society at large.</p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Benefits</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Recognition at special alumni events</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Invitation to speak at university functions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Access to university facilities</span>
                            </li>
                            <li class="flex items-start">
                                <i class="ri-check-line text-primary mr-2 mt-1"></i>
                                <span>Featured in alumni publications</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-4">

                        <p class="text-gray-600">By invitation only (no registration required)</p>
                        <p class="text-gray-600">-</p>
                    </div>
                    <button
                        class="w-full bg-gray-200 text-gray-600 px-4 py-2 !rounded-button whitespace-nowrap cursor-not-allowed">By
                        Invitation Only</button>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- Registration Process -->
<section id="registration" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">How to Become a Member</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Follow these simple steps to join the BUK Alumni Association
                and start enjoying the benefits.</p>
        </div>

        <div class="text-center mb-12">
            <h4 class="text-2xl font-bold text-gray-600 max-w-3xl mx-auto">I Have My Registration Number

            </h4>
        </div>
        <div class="flex flex-col md:flex-row justify-between max-w-4xl mx-auto mb-12">

            <div class="step-item active flex flex-col items-center mb-8 md:mb-0">
                <div
                    class="step-number w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center text-xl font-bold mb-4">
                    1</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Create Account</h3>
                <p class="text-gray-600 text-center max-w-xs">Register on our portal with your personal and
                    graduation details</p>
            </div>



            <div class="step-item flex flex-col items-center mb-8 md:mb-0">


                <div
                    class="step-number w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    2</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Get Verified</h3>
                <p class="text-gray-600 text-center max-w-xs">We use the submitted information and verify you using our
                    alumni database</p>

            </div>

            <div class="step-item flex flex-col items-center">
                <div
                    class="step-number w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    3</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Access Benefits</h3>

                <p class="text-gray-600 text-center max-w-xs">Receive your membership ID, Start enjoying
                    all benefits</p>

            </div>

        </div>
        <div class="text-center mb-12">
            <a style="width: 40%;margin-left:30%" href="/show/search"
                class="block items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Register
                Now</a>
            </h4>
        </div>

        <!-- Registration Form -->
        <div class="text-center mb-12">
            <h4 class="text-2xl font-bold text-gray-600 max-w-3xl mx-auto">I Can’t Remember My Registration Number

            </h4>
        </div>
        <div class="flex flex-col md:flex-row justify-between max-w-4xl mx-auto mb-12">


            <div class="step-item flex flex-col items-center mb-8 md:mb-0">
                <div
                    class="step-number bg-primary text-white w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    1</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Submit Your Data</h3>
                <p class="text-gray-600 text-center max-w-xs">Get verified by admin before login</p>
            </div>
            <div class="step-item flex flex-col items-center mb-8 md:mb-0">
                <div
                    class="step-number w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    2</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Get Verified</h3>
                <p class="text-gray-600 text-center max-w-xs">Get verified by admin before login</p>
            </div>

            {{-- <div class="step-item flex flex-col items-center mb-8 md:mb-0">
                <div
                    class="step-number w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    2</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pay Membership Dues</h3>
                <p class="text-gray-600 text-center max-w-xs">Complete payment through our secure payment gateway
                </p>
            </div> --}}


            <div class="step-item flex flex-col items-center">
                <div
                    class="step-number w-16 h-16 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center text-xl font-bold mb-4">
                    3</div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Access Benefits</h3>
                <p class="text-gray-600 text-center max-w-xs">Receive your membership ID and start enjoying all
                    benefits</p>
            </div>

        </div>
        <div class="text-center mb-12">
            <a style="width: 70%;margin-left:15%" href="/submit-data/submit"
                class="block items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Submit
                data for verification
                Now</a>
            <br>
            <a href="login-submit-data"
                class=" items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Login
                Now To Check Validation Status</a>
        </div>

        <!-- Registration Form -->

    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            {{-- <h2 class="text-3xl font-bold text-gray-800 mb-4">What Our Members Say</h2> --}}

            {{-- <p class="text-gray-600 max-w-3xl mx-auto text-justify">Hear from fellow alumni about their experiences as --}}
            {{-- members of the BUK Alumni Association.</p> --}}

        </div>

        {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="testimonial-card bg-white p-6 rounded shadow-md">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold">
                        AM</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">Abubakar Mohammed</h4>
                        <p class="text-gray-500 text-sm">Class of 2010, Engineering</p>
                    </div>
                </div>

                <p class="text-gray-600 mb-4 text-justify">"Joining the BUK Alumni Association has been one of the best
                    professional decisions I've made. The networking opportunities have led to valuable business
                    connections, and I've been able to mentor younger graduates in my field."</p>

                <div class="flex text-primary">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
            </div>

            <div class="testimonial-card bg-white p-6 rounded shadow-md">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold">
                        FI</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">Fatima Ibrahim</h4>
                        <p class="text-gray-500 text-sm">Class of 2015, Medicine</p>
                    </div>
                </div>

                <p class="text-gray-600 mb-4 text-justify">"The alumni events have been incredible for reconnecting
                    with old classmates and making new friends. I've also benefited from the professional development
                    workshops that have helped advance my medical career."</p>

                <div class="flex text-primary">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                </div>
            </div>

            <div class="testimonial-card bg-white p-6 rounded shadow-md">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold">
                        JO</div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-800">Joseph Okonkwo</h4>
                        <p class="text-gray-500 text-sm">Class of 2008, Law</p>
                    </div>
                </div>

                <p class="text-gray-600 mb-4 text-justify">"As someone who moved abroad after graduation, the alumni
                    association has kept me connected to my roots. The online events and regular updates make me feel
                    like I'm still part of the BUK community despite the distance."</p>

                <div class="flex text-primary">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
            </div>
        </div> --}}

        <!-- Alumni Events Gallery -->
        <h3 class="text-2xl font-bold text-gray-800 text-center mb-8">Alumni Events Gallery</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="overflow-hidden rounded">
                <img src="{{ asset('img/alumni-convocation.jpg') }}" alt="Alumni Reunion"
                    class="w-full h-48 object-cover object-top hover:scale-105 transition">
            </div>
            <div class="overflow-hidden rounded">
                <img src="{{ asset('img/alumni-convocation-2.jpg') }}" alt="Alumni Awards"
                    class="w-full h-48 object-cover object-top hover:scale-105 transition">
            </div>
            <div class="overflow-hidden rounded">
                <img src="{{ asset('img/bukaa7.jpeg') }}" alt="Mentorship Program"
                    class="w-full h-48 object-cover object-top hover:scale-105 transition">
            </div>
            <div class="overflow-hidden rounded">
                <img src="{{ asset('img/alumni-convocation-3.jpg') }}" alt="Fundraising Gala"
                    class="w-full h-48 object-cover object-top hover:scale-105 transition">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
{{-- <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Find answers to common questions about the BUK Alumni
                Association membership.</p>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>How do I verify my alumni status?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">Your alumni status will be verified through our database using your
                        graduation details. If there are any issues with verification, we may request additional
                        documentation such as a copy of your degree certificate or transcript. Our verification
                        process typically takes 3-5 business days.</p>
                </div>
            </div>

            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>What are the payment methods for membership dues?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">We accept various payment methods including credit/debit cards, bank
                        transfers, and mobile money services like Paystack and Flutterwave. International members
                        can pay via PayPal or international wire transfer. All payments are processed securely
                        through our portal.</p>
                </div>
            </div>

            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>How do I renew my membership?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">Membership renewal is simple. You'll receive an email notification 30
                        days before your membership expires. You can log in to your account on the alumni portal and
                        follow the renewal process. You can also set up automatic renewals to ensure uninterrupted
                        membership benefits.</p>
                </div>
            </div>

            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>Can I upgrade my membership type?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">Yes, you can upgrade your membership at any time. For example,
                        Associate Members can upgrade to Regular Membership if they meet the eligibility criteria.
                        Simply log in to your account, navigate to the membership section, and follow the upgrade
                        process. Any applicable fee differences will be calculated automatically.</p>
                </div>
            </div>

            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>How can I get involved in alumni leadership?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">Regular members in good standing are eligible to run for leadership
                        positions during our biennial elections. You can also volunteer for various committees or
                        become a chapter representative in your region. Contact the secretariat at
                        leadership@bukalumni.org for more information on upcoming leadership opportunities.</p>
                </div>
            </div>

            <div class="faq-item mb-4 border border-gray-200 rounded overflow-hidden">
                <button
                    class="faq-question w-full bg-white px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none flex justify-between items-center">
                    <span>How do I access the alumni directory?</span>
                    <i class="ri-add-line"></i>
                </button>
                <div class="faq-answer hidden px-6 py-4 bg-gray-50">
                    <p class="text-gray-600">The alumni directory is available exclusively to registered members
                        through the online portal. After logging in, navigate to the "Directory" section where you
                        can search for fellow alumni by name, graduation year, faculty, or location. Privacy
                        settings allow you to control what information is visible to other members.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-gray-600 mb-4">Still have questions? Contact our support team:</p>
            <div class="flex justify-center space-x-4">
                <a href="mailto:support@bukalumni.org" class="flex items-center text-primary hover:underline">
                    <i class="ri-mail-line mr-2"></i>
                    support@bukalumni.org
                </a>
                <a href="tel:+2348012345678" class="flex items-center text-primary hover:underline">
                    <i class="ri-phone-line mr-2"></i>
                    +234 801 234 5678
                </a>
            </div>
        </div>
    </div>
</section> --}}
{{-- <!-- Final CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Take Pride in Being a BUK Alumnus</h2>
            <p class="max-w-3xl mx-auto mb-8 text-white/90">Join the movement that's shaping the future of Bayero University Kano. Your membership strengthens our community and creates opportunities for current and future generations.</p>
            <a href="#registration" class="inline-block bg-white text-primary px-8 py-3 font-semibold !rounded-button whitespace-nowrap hover:bg-gray-100 transition">Join Now</a>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="ri-map-pin-line mt-1 mr-2"></i>
                            <span>Alumni Relations Office, Bayero University Kano, PMB 3011, Kano, Nigeria</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-phone-line mr-2"></i>
                            <span>+234 801 234 5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-mail-line mr-2"></i>
                            <span>info@bukalumni.org</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Alumni Portal Login</a></li>
                        <li><a href="#" class="hover:underline">Upcoming Events</a></li>
                        <li><a href="#" class="hover:underline">Alumni Chapters</a></li>
                        <li><a href="#" class="hover:underline">Donation Programs</a></li>
                        <li><a href="#" class="hover:underline">Career Services</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">Stay Connected</h3>
                    <p class="mb-4">Subscribe to our newsletter for the latest updates and opportunities.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email address" class="px-4 py-2 w-full border-none rounded-l focus:outline-none text-gray-800">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 !rounded-r-button whitespace-nowrap hover:bg-gray-700 transition">Subscribe</button>
                    </form>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition">
                            <i class="ri-twitter-x-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
<!-- Footer -->
<x-footer></x-footer>


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
