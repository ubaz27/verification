<x-header>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .scholarship-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .scholarship-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .scholarship-panel {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .scholarship-panel.hidden {
            display: none;
            opacity: 0;
            transform: translateY(-20px);
        }

        .scholarship-filter-btn {
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .scholarship-filter-btn:hover {
            transform: scale(1.05);
        }

        .scholarship-filter-btn.active {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .scholarship-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-merit {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-gender {
            background-color: #fce7f3;
            color: #be185d;
        }

        .badge-government {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .badge-corporate {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-medical {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-international {
            background-color: #e0e7ff;
            color: #3730a3;
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
<section class="relative bg-gradient-to-r from-blue-800 to-purple-800 h-96 flex items-center justify-center">
    <img src="{{ asset('img/scholarship-bg.jpg') }}" alt="Scholarship Background"
        class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="text-center text-white relative z-10">
        <h1 class="text-5xl font-bold mb-4">Scholarship Opportunities</h1>
        <p class="text-xl">Empowering BUK Alumni Through Educational Excellence</p>
    </div>
</section>

<!-- Introduction Section -->
<section class="container mx-auto px-4 py-16">
    <div class="text-center max-w-3xl mx-auto">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Unlock Your Potential</h2>
        <p class="text-lg text-gray-600">
            The BUK Alumni Association partners with various organizations to provide scholarship opportunities for
            deserving students and alumni.
            Explore our comprehensive database of scholarships across different categories to find the perfect match for
            your educational journey.
        </p>
    </div>
</section>

<!-- Scholarships Grid -->
<section class="container mx-auto px-4 py-12">
    <div class="flex flex-col items-center justify-center mb-8 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Browse Scholarships</h2>

        <!-- Scholarship Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <button id="meritBtn"
                class="scholarship-filter-btn active bg-primary text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-primary/90">
                Merit-Based
            </button>
            <button id="genderBtn"
                class="scholarship-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                Gender-Specific
            </button>
            <button id="governmentBtn"
                class="scholarship-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                Government
            </button>
            <button id="corporateBtn"
                class="scholarship-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                Corporate
            </button>
            <button id="medicalBtn"
                class="scholarship-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                Medical/Health
            </button>
            <button id="internationalBtn"
                class="scholarship-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:bg-gray-300">
                International
            </button>
        </div>

        <!-- Search Input -->
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-4">
            <input type="text" id="searchInput" placeholder="Search scholarships..."
                class="border border-gray-300 rounded px-4 py-2 text-gray-700 focus:outline-none focus:border-primary">
            <select id="amountFilter"
                class="border border-gray-300 rounded px-4 py-2 text-gray-700 focus:outline-none focus:border-primary">
                <option value="">Filter by Amount</option>
                <option value="low">Up to ₦500,000</option>
                <option value="medium">₦500,000 - ₦2,000,000</option>
                <option value="high">Above ₦2,000,000</option>
            </select>
        </div>
    </div>

    <!-- Merit-Based Scholarships -->
    <div id="meritScholarships" class="mb-12 scholarship-panel">
        <div class="bg-yellow-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Merit-Based Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'Merit-Based') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="scholarship-badge badge-merit">{{ $scholarship->scholarship_type }}</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }} per
                            year</p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Gender-Specific Scholarships -->
    <div id="genderScholarships" class="mb-12 scholarship-panel hidden">
        <div class="bg-pink-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Gender-Specific Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'Gender-Specific') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="scholarship-badge badge-gender">{{ $scholarship->scholarship_type }}</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }} per
                            year</p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Government Scholarships -->
    <div id="governmentScholarships" class="mb-12 scholarship-panel hidden">
        <div class="bg-blue-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Government Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'Government') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span
                                class="scholarship-badge badge-government">{{ $scholarship->scholarship_type }}</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }} per
                            year</p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Corporate Scholarships -->
    <div id="corporateScholarships" class="mb-12 scholarship-panel hidden">
        <div class="bg-green-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Corporate Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'Corporate') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="scholarship-badge badge-corporate">{{ $scholarship->organisation }}</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }}
                            per year</p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Medical/Health Scholarships -->
    <div id="medicalScholarships" class="mb-12 scholarship-panel hidden">
        <div class="bg-red-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Medical & Health Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'Medical/Health') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="scholarship-badge badge-medical">Medical/Health</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }}
                            per year</p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- International Scholarships -->
    <div id="internationalScholarships" class="mb-12 scholarship-panel hidden">
        <div class="bg-indigo-50 rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">International Scholarships</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($scholarships->where('scholarship_type', 'International') as $scholarship)
                    <div class="scholarship-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="scholarship-badge badge-international">International</span>
                            <span class="text-sm text-gray-500">Deadline:
                                {{ $scholarship->deadline->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scholarship->title }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $scholarship->formatted_amount }}
                        </p>
                        <p class="text-gray-600 mb-2"><strong>Duration:</strong>
                            {{ $scholarship->duration ?? 'Not specified' }}</p>
                        <p class="text-gray-600 mb-2"><strong>Eligibility:</strong>
                            {{ Str::limit($scholarship->eligibility, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scholarship->description, 100) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition text-sm">Apply
                                Now</a>
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-primary font-medium hover:underline text-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-10">
        <button id="viewAllBtn"
            class="bg-secondary text-white px-8 py-3 rounded-lg font-semibold hover:bg-secondary/90 transition text-lg">View
            All Scholarships</button>
    </div>
</section>

<!-- Scholarship Statistics -->
<section class="container mx-auto px-4 py-12 bg-gray-50">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Scholarship Impact</h2>
    <div class="grid md:grid-cols-4 gap-8 text-center">
        <div class="bg-white rounded-lg p-6 shadow-md">
            <h3 class="text-3xl font-bold text-primary mb-2">{{ $scholarships->count() }}+</h3>
            <p class="text-gray-600">Scholarships Available</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-md">
            <h3 class="text-3xl font-bold text-primary mb-2">
                ₦{{ number_format($scholarships->sum('amount') / 1000000, 1) }}M</h3>
            <p class="text-gray-600">Total Value Available</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-md">
            <h3 class="text-3xl font-bold text-primary mb-2">{{ $scholarships->where('status', 'active')->count() }}
            </h3>
            <p class="text-gray-600">Active Scholarships</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-md">
            <h3 class="text-3xl font-bold text-primary mb-2">{{ $scholarships->groupBy('scholarship_type')->count() }}
            </h3>
            <p class="text-gray-600">Categories Available</p>
        </div>
    </div>
</section>

<!-- How to Apply -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">How to Apply for Scholarships</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
            <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold">1</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Research & Filter</h3>
            <p class="text-gray-600">Browse our comprehensive database and filter scholarships based on your field,
                eligibility, and preferences.</p>
        </div>
        <div class="text-center">
            <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold">2</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Prepare Documents</h3>
            <p class="text-gray-600">Gather required documents including transcripts, recommendation letters, essays,
                and proof of eligibility.</p>
        </div>
        <div class="text-center">
            <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold">3</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">Submit Application</h3>
            <p class="text-gray-600">Submit your complete application before the deadline and track your application
                status online.</p>
        </div>
    </div>
</section>

<!-- Application Tips -->
<section class="container mx-auto px-4 py-12 bg-primary text-white">
    <h2 class="text-3xl font-semibold mb-8 text-center">Scholarship Application Tips</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center">
            <div class="bg-white text-primary rounded-lg p-4 mb-4">
                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="font-semibold mb-2">Start Early</h3>
            <p class="text-sm opacity-90">Begin your scholarship search and application process early to meet all
                deadlines.</p>
        </div>
        <div class="text-center">
            <div class="bg-white text-primary rounded-lg p-4 mb-4">
                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="font-semibold mb-2">Read Requirements</h3>
            <p class="text-sm opacity-90">Carefully read and understand all eligibility criteria and application
                requirements.</p>
        </div>
        <div class="text-center">
            <div class="bg-white text-primary rounded-lg p-4 mb-4">
                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3.055A9.001 9.001 0 1020.945 9H11V3.055z" />
                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
            </div>
            <h3 class="font-semibold mb-2">Personalize Essays</h3>
            <p class="text-sm opacity-90">Write compelling, personalized essays that highlight your unique experiences
                and goals.</p>
        </div>
        <div class="text-center">
            <div class="bg-white text-primary rounded-lg p-4 mb-4">
                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2V6a1 1 0 112 0v1a1 1 0 11-2 0zm2 3a1 1 0 11-2 0 1 1 0 012 0z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="font-semibold mb-2">Follow Up</h3>
            <p class="text-sm opacity-90">Track your applications and follow up appropriately with scholarship
                providers.</p>
        </div>
    </div>
</section>

<!-- Contact & Support -->
<section class="container mx-auto px-4 py-12 bg-gray-100">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Scholarship Support</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6 text-center">
        Need help with your scholarship search or application? Our dedicated scholarship counselors are here to guide
        you through the process.
    </p>
    <form id="scholarship-inquiry-form" class="max-w-lg mx-auto space-y-4">
        <div class="grid md:grid-cols-2 gap-4">
            <input type="text" id="scholar_full_name" name="full_name" placeholder="Your Full Name *" required
                class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
            <input type="email" id="scholar_email" name="email" placeholder="Your Email *" required
                class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
        </div>
        <input type="tel" id="scholar_phone" name="phone" placeholder="Your Phone Number (Optional)"
            class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
        <select id="scholar_inquiry_type" name="inquiry_type" required
            class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary">
            <option value="">Select Inquiry Type *</option>
            <option value="General Scholarship Information">General Scholarship Information</option>
            <option value="Application Assistance">Application Assistance</option>
            <option value="Eligibility Questions">Eligibility Questions</option>
            <option value="Document Requirements">Document Requirements</option>
            <option value="Merit-Based Scholarships">Merit-Based Scholarships</option>
            <option value="Gender-Specific Scholarships">Gender-Specific Scholarships</option>
            <option value="Government Scholarships">Government Scholarships</option>
            <option value="Corporate Scholarships">Corporate Scholarships</option>
            <option value="Medical/Health Scholarships">Medical/Health Scholarships</option>
            <option value="International Scholarships">International Scholarships</option>
            <option value="Other">Other</option>
        </select>
        <textarea id="scholar_message" name="message" placeholder="Your Message *" required
            class="w-full px-4 py-2 border border-gray-300 rounded text-gray-700 focus:outline-none focus:border-primary"
            rows="4"></textarea>
        <button type="submit" id="scholarship-submit-btn"
            class="w-full bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition">
            Send Scholarship Inquiry
        </button>
    </form>

    <!-- Success/Error Messages -->
    <div id="scholarship-form-message" class="max-w-lg mx-auto mt-4 hidden">
        <!-- Dynamic content will be inserted here -->
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

        // Scholarship filtering functionality with buttons
        const meritBtn = document.getElementById('meritBtn');
        const genderBtn = document.getElementById('genderBtn');
        const governmentBtn = document.getElementById('governmentBtn');
        const corporateBtn = document.getElementById('corporateBtn');
        const medicalBtn = document.getElementById('medicalBtn');
        const internationalBtn = document.getElementById('internationalBtn');
        const viewAllBtn = document.getElementById('viewAllBtn');
        const searchInput = document.getElementById('searchInput');

        const meritScholarships = document.getElementById('meritScholarships');
        const genderScholarships = document.getElementById('genderScholarships');
        const governmentScholarships = document.getElementById('governmentScholarships');
        const corporateScholarships = document.getElementById('corporateScholarships');
        const medicalScholarships = document.getElementById('medicalScholarships');
        const internationalScholarships = document.getElementById('internationalScholarships');

        const filterButtons = document.querySelectorAll('.scholarship-filter-btn');

        // Function to show/hide scholarships based on selection
        function showScholarships(type) {
            // Hide all panels first
            meritScholarships.classList.add('hidden');
            genderScholarships.classList.add('hidden');
            governmentScholarships.classList.add('hidden');
            corporateScholarships.classList.add('hidden');
            medicalScholarships.classList.add('hidden');
            internationalScholarships.classList.add('hidden');

            // Show selected panel(s) with animation
            setTimeout(() => {
                switch (type) {
                    case 'merit':
                        meritScholarships.classList.remove('hidden');
                        break;
                    case 'gender':
                        genderScholarships.classList.remove('hidden');
                        break;
                    case 'government':
                        governmentScholarships.classList.remove('hidden');
                        break;
                    case 'corporate':
                        corporateScholarships.classList.remove('hidden');
                        break;
                    case 'medical':
                        medicalScholarships.classList.remove('hidden');
                        break;
                    case 'international':
                        internationalScholarships.classList.remove('hidden');
                        break;
                    case 'all':
                        // Show all scholarship panels
                        meritScholarships.classList.remove('hidden');
                        genderScholarships.classList.remove('hidden');
                        governmentScholarships.classList.remove('hidden');
                        corporateScholarships.classList.remove('hidden');
                        medicalScholarships.classList.remove('hidden');
                        internationalScholarships.classList.remove('hidden');
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

            if (activeButton) {
                activeButton.classList.add('active');
                activeButton.classList.remove('bg-gray-200', 'text-gray-700');
                activeButton.classList.add('bg-primary', 'text-white');
            }
        }

        // Button event listeners
        meritBtn.addEventListener('click', function() {
            showScholarships('merit');
            updateButtonStates(this);
        });

        genderBtn.addEventListener('click', function() {
            showScholarships('gender');
            updateButtonStates(this);
        });

        governmentBtn.addEventListener('click', function() {
            showScholarships('government');
            updateButtonStates(this);
        });

        corporateBtn.addEventListener('click', function() {
            showScholarships('corporate');
            updateButtonStates(this);
        });

        medicalBtn.addEventListener('click', function() {
            showScholarships('medical');
            updateButtonStates(this);
        });

        internationalBtn.addEventListener('click', function() {
            showScholarships('international');
            updateButtonStates(this);
        });

        // View All Scholarships button event listener
        viewAllBtn.addEventListener('click', function() {
            showScholarships('all');
            updateButtonStates(null); // No single button should be active when showing all
        });

        // Initialize with Merit Scholarships visible
        showScholarships('merit');

        // Scholarship inquiry form submission
        const scholarshipForm = document.getElementById('scholarship-inquiry-form');
        const scholarshipSubmitBtn = document.getElementById('scholarship-submit-btn');
        const scholarshipMessage = document.getElementById('scholarship-form-message');
        const originalButtonText = scholarshipSubmitBtn.innerHTML;

        scholarshipForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData();
            formData.append('full_name', document.getElementById('scholar_full_name').value);
            formData.append('email', document.getElementById('scholar_email').value);
            formData.append('phone', document.getElementById('scholar_phone').value);
            formData.append('inquiry_type', document.getElementById('scholar_inquiry_type').value);
            formData.append('message', document.getElementById('scholar_message').value);
            formData.append('_token', '{{ csrf_token() }}');

            // Validation
            const fullName = document.getElementById('scholar_full_name').value;
            const email = document.getElementById('scholar_email').value;
            const inquiryType = document.getElementById('scholar_inquiry_type').value;
            const message = document.getElementById('scholar_message').value;

            if (!fullName || !email || !inquiryType || !message) {
                showScholarshipMessage('Please fill in all required fields.', 'error');
                return;
            }

            // Disable submit button and show loading
            scholarshipSubmitBtn.disabled = true;
            scholarshipSubmitBtn.innerHTML = '<i class="ri-loader-4-line ri-spin mr-2"></i>Sending...';

            // Send AJAX request
            fetch('{{ route('scholarships.inquiry.submit') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showScholarshipMessage(data.message, 'success');
                        scholarshipForm.reset(); // Clear the form
                    } else {
                        showScholarshipMessage(data.message ||
                            'An error occurred while sending your inquiry.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showScholarshipMessage(
                        'An error occurred while sending your inquiry. Please try again.',
                        'error');
                })
                .finally(() => {
                    // Re-enable submit button
                    scholarshipSubmitBtn.disabled = false;
                    scholarshipSubmitBtn.innerHTML = originalButtonText;
                });
        });

        function showScholarshipMessage(message, type) {
            scholarshipMessage.classList.remove('hidden');

            if (type === 'success') {
                scholarshipMessage.innerHTML = `
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            <div class="flex items-center">
                                <i class="ri-check-circle-line text-xl mr-2"></i>
                                <span>${message}</span>
                            </div>
                        </div>
                    `;
            } else {
                scholarshipMessage.innerHTML = `
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <div class="flex items-center">
                                <i class="ri-error-warning-line text-xl mr-2"></i>
                                <span>${message}</span>
                            </div>
                        </div>
                    `;
            }

            // Auto-hide message after 5 seconds
            setTimeout(() => {
                scholarshipMessage.classList.add('hidden');
            }, 5000);
        }

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const scholarshipCards = document.querySelectorAll('.scholarship-card');

            scholarshipCards.forEach(card => {
                const scholarshipText = card.textContent.toLowerCase();
                if (scholarshipText.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Amount filter functionality
        const amountFilter = document.getElementById('amountFilter');
        amountFilter.addEventListener('change', function() {
            const selectedAmount = this.value;
            const scholarshipCards = document.querySelectorAll('.scholarship-card');

            scholarshipCards.forEach(card => {
                const amountText = card.querySelector('p:nth-child(2)').textContent;
                const amount = parseInt(amountText.replace(/[^\d]/g, ''));

                let showCard = true;

                if (selectedAmount === 'low' && amount > 500000) {
                    showCard = false;
                } else if (selectedAmount === 'medium' && (amount < 500000 || amount >
                    2000000)) {
                    showCard = false;
                } else if (selectedAmount === 'high' && amount < 2000000) {
                    showCard = false;
                }

                card.style.display = showCard ? 'block' : 'none';
            });
        });
    });
</script>
