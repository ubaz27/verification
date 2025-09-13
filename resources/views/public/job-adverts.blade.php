<x-header>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-section {
            background-image: url('img/event-1.jpg');
            background-size: cover;
            background-position: center;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-checkbox input:checked~.checkmark {
            background-color: #006400;
            border-color: #006400;
        }

        .checkmark:after {
            content: "";
            display: none;
        }

        .custom-checkbox input:checked~.checkmark:after {
            display: block;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }

        .custom-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #006400;
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }

        .custom-range {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }

        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #006400;
            cursor: pointer;
        }

        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #006400;
            cursor: pointer;
            border: none;
        }

        .custom-radio {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .radio-mark {
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-radio input:checked~.radio-mark {
            border-color: #006400;
        }

        .radio-mark:after {
            content: "";
            display: none;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #006400;
        }

        .custom-radio input:checked~.radio-mark:after {
            display: block;
        }
    </style>
</x-header>


<!-- Hero Section -->
<section class="hero-section relative flex items-center justify-center">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto px-4 py-16 md:py-24 relative z-10 flex flex-col items-center justify-center">
        <div class="max-w-3xl text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">BUK Alumni Job Board</h1>
            <p class="text-xl md:text-2xl text-white italic mb-8">Empowering Our Alumni with Opportunities</p>
            <p class="text-white text-lg mb-8">Connect with exclusive job opportunities curated specifically for Bayero
                University Kano graduates. Our job board bridges the gap between talented alumni and top employers.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 !rounded-button font-medium whitespace-nowrap">Browse
                    Jobs</button>
                <button
                    class="bg-white hover:bg-gray-100 text-primary px-6 py-3 !rounded-button font-medium whitespace-nowrap">Post
                    a Job</button>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">
    <!-- Welcome & Search Section -->
    <section class="mb-12">
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to the BUK Alumni Job Board</h2>
            <p class="text-gray-600 mb-6">The BUK Alumni Job Board is dedicated to connecting our talented graduates
                with quality employment opportunities. Whether you're a recent graduate or an experienced professional
                looking for your next career move, we're here to help you find the perfect position. Employers can also
                post job openings to reach our network of skilled BUK alumni.</p>

            <div class="relative mb-6">
                <input type="text" placeholder="Search for jobs, companies, or keywords..."
                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-gray-700">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-4">
                <div class="w-full md:w-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-between gap-2 px-4 py-2 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-50 whitespace-nowrap">
                        <span>Job Type</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                </div>
                <div class="w-full md:w-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-between gap-2 px-4 py-2 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-50 whitespace-nowrap">
                        <span>Industry</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                </div>
                <div class="w-full md:w-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-between gap-2 px-4 py-2 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-50 whitespace-nowrap">
                        <span>Location</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                </div>
                <div class="w-full md:w-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-between gap-2 px-4 py-2 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-50 whitespace-nowrap">
                        <span>Date Posted</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                </div>
                <div class="w-full md:w-auto ml-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-between gap-2 px-4 py-2 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-50 whitespace-nowrap">
                        <span>Sort by: Latest</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 mt-4">
                <div class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700 flex items-center gap-1">
                    Full-time
                    <button class="text-gray-500 hover:text-gray-700">
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-close-line"></i>
                        </div>
                    </button>
                </div>
                <div class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700 flex items-center gap-1">
                    Kano
                    <button class="text-gray-500 hover:text-gray-700">
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-close-line"></i>
                        </div>
                    </button>
                </div>
                <div class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700 flex items-center gap-1">
                    Last 7 days
                    <button class="text-gray-500 hover:text-gray-700">
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-close-line"></i>
                        </div>
                    </button>
                </div>
                <button class="text-primary text-sm hover:underline">Clear all</button>
            </div>
        </div>
    </section>

    <!-- Job Listings Section -->
    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Latest Job Opportunities</h2>
            <p class="text-gray-600">No of active jobs: {{ $no_jobs }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Job Card 1 -->
            {{-- <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-building-4-line ri-lg text-primary"></i>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Full-time</span>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Remote</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Software Engineer</h3>
                        <p class="text-gray-600 mb-2">TechNova Solutions</p>
                        <p class="text-gray-500 text-sm mb-4">Posted on May 12, 2025</p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">We are looking for a skilled Software Engineer to join our dynamic team. The ideal candidate will have experience in full-stack development and a passion for creating innovative solutions.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">₦350,000 - ₦450,000</span>
                            <button class="text-primary hover:text-primary/80 font-medium whitespace-nowrap">View Details</button>
                        </div>
                    </div>
                </div> --}}

            <!-- Job Card 2 -->
            @foreach ($jobs as $item)
                @php
                    if (blank($item->posted_on)) {
                        $posted_on = '';
                    } else {
                        $posted_on = 'Posted On ' . $item->posted_on ?? '';
                    }

                @endphp
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-hospital-line ri-lg text-primary"></i>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <span
                                    class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $item->job_type }}</span>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">{{ $item->category }}</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-2">{{ $item->company }}</p>
                        <p class="text-gray-500 text-sm mb-4">{{ $posted_on }}</p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $item->desc }}.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">{{ $item->salary_range }}</span>
                            <button class="text-primary hover:text-primary/80 font-medium whitespace-nowrap">View
                                Details</button>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

        <div class="flex justify-center mt-8">
            <button
                class="bg-white border border-gray-300 text-gray-700 px-6 py-3 !rounded-button font-medium hover:bg-gray-50 whitespace-nowrap">Load
                More Jobs</button>
        </div>
    </section>

    <!-- Post a Job Section -->
    <section class="mb-12 bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="bg-primary/10 p-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Post a Job</h2>
                    <p class="text-gray-600 max-w-xl">Reach our network of talented BUK alumni by posting your job
                        openings. Connect with qualified candidates who have the skills and education you're looking
                        for.</p>
                </div>
                <button
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 !rounded-button font-medium whitespace-nowrap">Post
                    a Job</button>
            </div>
        </div>
        <div class="p-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Job Posting Form</h3>
            @if ($message = Session::get('mssg'))
                <div class="alert alert-{{ $message['type'] }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-{{ $message['icon'] }}"></i> Alert!</h5>
                    {{ $message['message'] }}ssss
                </div>
            @endif
            <form method="POST" id="register" name="register" action="{{ url('/submit/job') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="company_name" class="block text-gray-700 font-medium mb-2">Company Name</label>
                        <input type="text" id="company_name" name="company"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    </div>
                    <div>
                        <label for="company_website" class="block text-gray-700 font-medium mb-2">Company
                            Website</label>
                        <input type="text" id="company_website" name="website"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="job_title" class="block text-gray-700 font-medium mb-2">Job Title</label>
                        <input type="text" id="job_title" name="title"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    </div>
                    <div>
                        <label for="job_location" class="block text-gray-700 font-medium mb-2">Job Location</label>
                        <input type="text" id="job_location" name="location"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="job_type" class="block text-gray-700 font-medium mb-2">Job Type</label>
                        <div class="relative">
                            <select id="job_type" name="job_type"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none pr-8">
                                <option value="">Select Job Type</option>
                                <option value="Full Time">Full-time</option>
                                <option value="Part Time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                            <div
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-500">
                                <div class="w-4 h-4 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="salary_min" class="block text-gray-700 font-medium mb-2">Salary Range
                            (Min)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">₦</span>
                            <input type="text" id="salary_min" name="start_salary"
                                class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>
                    </div>
                    <div>
                        <label for="salary_max" class="block text-gray-700 font-medium mb-2">Salary Range
                            (Max)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">₦</span>
                            <input type="text" id="salary_max" name="end_salary"
                                class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="job_description" class="block text-gray-700 font-medium mb-2">Job Description</label>
                    <textarea id="job_description" rows="6" name="details"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
                </div>

                <div class="mb-6">
                    <label for="requirements" class="block text-gray-700 font-medium mb-2">Requirements</label>
                    <textarea id="requirements" rows="4" name="requirement"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Work Type</label>
                    <select id="job_type" name="category"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none pr-8">
                        <option value="">Select Work Type</option>
                        <option value="Full Time">On Site</option>
                        <option value="Part Time">Remote</option>
                        <option value="Contract">Hybrid</option>

                    </select>

                </div>



                <div class="flex justify-end gap-4">
                    {{-- <button type="button"
                        class="border border-gray-300 text-gray-700 px-6 py-3 !rounded-button font-medium hover:bg-gray-50 whitespace-nowrap">Preview</button> --}}
                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-3 !rounded-button font-medium whitespace-nowrap">Submit
                        Job Posting</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Featured Employers Section -->
    {{-- <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Featured Employers</h2>
        <div class="bg-white rounded-lg shadow-sm p-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center text-center p-4 rounded-lg hover:bg-gray-50">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <i class="ri-bank-fill ri-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1">First Bank Nigeria</h3>
                    <p class="text-gray-600 text-sm mb-2">Banking & Finance</p>
                    <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">4 open positions</span>
                </div>

                <div class="flex flex-col items-center text-center p-4 rounded-lg hover:bg-gray-50">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <i class="ri-hospital-fill ri-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1">Aminu Kano Teaching Hospital</h3>
                    <p class="text-gray-600 text-sm mb-2">Healthcare</p>
                    <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">6 open positions</span>
                </div>

                <div class="flex flex-col items-center text-center p-4 rounded-lg hover:bg-gray-50">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <i class="ri-building-4-fill ri-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1">TechNova Solutions</h3>
                    <p class="text-gray-600 text-sm mb-2">Technology</p>
                    <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">3 open positions</span>
                </div>

                <div class="flex flex-col items-center text-center p-4 rounded-lg hover:bg-gray-50">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <i class="ri-oil-fill ri-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1">NNPC Limited</h3>
                    <p class="text-gray-600 text-sm mb-2">Oil & Gas</p>
                    <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">5 open positions</span>
                </div>
            </div>

            <div class="mt-8 text-center">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">BUK Alumni-Owned Businesses</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-store-2-fill text-primary"></i>
                            </div>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Kano Tech Hub</h4>
                        <p class="text-gray-600 text-sm mb-2">Founded by Ibrahim Abdullahi, Class of 2010</p>
                        <p class="text-gray-600 text-sm mb-3">Technology incubator and co-working space for startups in
                            Northern Nigeria.</p>
                        <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">2 open positions</span>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-book-fill text-primary"></i>
                            </div>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Hausa Educational Resources</h4>
                        <p class="text-gray-600 text-sm mb-2">Founded by Fatima Mohammed, Class of 2015</p>
                        <p class="text-gray-600 text-sm mb-3">Educational publishing company specializing in Hausa
                            language resources and cultural materials.</p>
                        <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">3 open positions</span>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-plant-fill text-primary"></i>
                            </div>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Green Farms Nigeria</h4>
                        <p class="text-gray-600 text-sm mb-2">Founded by Ahmed Yusuf, Class of 2008</p>
                        <p class="text-gray-600 text-sm mb-3">Sustainable agriculture company focused on organic
                            farming and agricultural technology solutions.</p>
                        <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">4 open positions</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <button
                    class="text-primary hover:text-primary/80 font-medium flex items-center justify-center mx-auto whitespace-nowrap">
                    View All Employers
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </section>

    <!-- Career Events Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Upcoming Career Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-calendar-event-fill text-primary"></i>
                                </div>
                            </div>
                            <span class="text-sm font-medium text-primary">May 25, 2025</span>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">In-person</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">BUK Annual Career Fair</h3>
                    <p class="text-gray-600 text-sm mb-4">Connect with over 50 employers from various industries at our
                        annual career fair. Bring your resume and be ready to network!</p>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <span>Bayero University Kano, Sports Complex</span>
                    </div>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-time-line"></i>
                        </div>
                        <span>10:00 AM - 4:00 PM</span>
                    </div>
                    <button
                        class="w-full bg-primary hover:bg-primary/90 text-white px-4 py-2 !rounded-button font-medium whitespace-nowrap">Register
                        Now</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-calendar-event-fill text-primary"></i>
                                </div>
                            </div>
                            <span class="text-sm font-medium text-primary">June 10, 2025</span>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Virtual</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tech Career Webinar</h3>
                    <p class="text-gray-600 text-sm mb-4">Join industry experts for a discussion on emerging tech
                        careers and how to position yourself for success in the digital economy.</p>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-global-line"></i>
                        </div>
                        <span>Zoom Webinar</span>
                    </div>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-time-line"></i>
                        </div>
                        <span>2:00 PM - 4:00 PM</span>
                    </div>
                    <button
                        class="w-full bg-primary hover:bg-primary/90 text-white px-4 py-2 !rounded-button font-medium whitespace-nowrap">Register
                        Now</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-calendar-event-fill text-primary"></i>
                                </div>
                            </div>
                            <span class="text-sm font-medium text-primary">June 18, 2025</span>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">In-person</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Resume & Interview Workshop</h3>
                    <p class="text-gray-600 text-sm mb-4">Get hands-on help with your resume and practice your
                        interview skills with HR professionals from top companies.</p>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <span>BUK Alumni Center, Main Campus</span>
                    </div>
                    <div class="flex items-center text-gray-600 text-sm mb-4">
                        <div class="w-4 h-4 flex items-center justify-center mr-2">
                            <i class="ri-time-line"></i>
                        </div>
                        <span>1:00 PM - 5:00 PM</span>
                    </div>
                    <button
                        class="w-full bg-primary hover:bg-primary/90 text-white px-4 py-2 !rounded-button font-medium whitespace-nowrap">Register
                        Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Career Resources Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Career Resources</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-file-text-line text-primary"></i>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Resume Templates</h3>
                <p class="text-gray-600 text-sm mb-4">Download professionally designed resume templates tailored for
                    different industries and career levels.</p>
                <ul class="text-gray-600 text-sm mb-4 space-y-2">
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Entry-level templates</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Mid-career templates</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Executive-level templates</span>
                    </li>
                </ul>
                <button class="flex items-center text-primary hover:text-primary/80 font-medium whitespace-nowrap">
                    Download Templates
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-download-line"></i>
                    </div>
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-user-voice-line text-primary"></i>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Interview Tips</h3>
                <p class="text-gray-600 text-sm mb-4">Prepare for your next interview with our comprehensive guides and
                    expert advice.</p>
                <ul class="text-gray-600 text-sm mb-4 space-y-2">
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Common interview questions</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Behavioral interview techniques</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Virtual interview best practices</span>
                    </li>
                </ul>
                <button class="flex items-center text-primary hover:text-primary/80 font-medium whitespace-nowrap">
                    View Interview Guides
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-team-line text-primary"></i>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Mentorship Program</h3>
                <p class="text-gray-600 text-sm mb-4">Connect with experienced BUK alumni who can provide career
                    guidance and professional development support.</p>
                <ul class="text-gray-600 text-sm mb-4 space-y-2">
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>One-on-one mentorship</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Industry-specific guidance</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-4 h-4 flex items-center justify-center mr-2 text-primary">
                            <i class="ri-check-line"></i>
                        </div>
                        <span>Career transition support</span>
                    </li>
                </ul>
                <button class="flex items-center text-primary hover:text-primary/80 font-medium whitespace-nowrap">
                    Join Mentorship Program
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </button>
            </div>
        </div>
    </section> --}}

    {{-- <!-- Subscribe Section -->
        <section class="mb-12 bg-primary/10 rounded-lg p-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Subscribe for Job Alerts</h2>
                    <p class="text-gray-600 max-w-xl">Stay updated with the latest job opportunities matching your skills and interests. Receive personalized job alerts directly in your inbox.</p>
                </div>
                <div class="w-full md:w-auto">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="Enter your email address" class="w-full sm:w-64 px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 !rounded-button font-medium whitespace-nowrap">Subscribe</button>
                    </div>
                </div>
            </div>
        </section> --}}

    <!-- Need Help Section -->
    {{-- <section class="mb-12">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Need Help?</h2>
                    <p class="text-gray-600 mb-6">Have questions about our job board or need assistance with your job
                        search? Our team is here to help you navigate your career journey.</p>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-4 mt-1">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-mail-line text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800 mb-1">Email Us</h3>
                                <p class="text-gray-600 text-sm">careers@bukalumni.edu.ng</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-4 mt-1">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-phone-line text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800 mb-1">Call Us</h3>
                                <p class="text-gray-600 text-sm">+234 812 345 6789</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-4 mt-1">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-map-pin-line text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800 mb-1">Visit Us</h3>
                                <p class="text-gray-600 text-sm">BUK Alumni Center, Bayero University Kano, PMB 3011,
                                    Kano, Nigeria</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-colors">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-facebook-fill"></i>
                            </div>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-colors">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-twitter-x-fill"></i>
                            </div>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-colors">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-linkedin-fill"></i>
                            </div>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-colors">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-instagram-fill"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="p-8 bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Send Us a Message</h3>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                            <input type="text" id="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                            <input type="text" id="subject"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
                        </div>

                        <button type="submit"
                            class="bg-primary hover:bg-primary/90 text-white px-6 py-3 !rounded-button font-medium whitespace-nowrap">Send
                            Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
</main>
<!-- Footer -->
<x-footer></x-footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
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
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Custom checkbox functionality
        const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Custom checkbox logic if needed
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Custom radio functionality
        const radios = document.querySelectorAll('.custom-radio input[type="radio"]');
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Custom radio logic if needed
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Custom switch functionality
        const switches = document.querySelectorAll('.custom-switch input[type="checkbox"]');
        switches.forEach(switchEl => {
            switchEl.addEventListener('change', function() {
                // Custom switch logic if needed
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Filter tags functionality
        const filterTags = document.querySelectorAll('.bg-gray-100.px-3.py-1.rounded-full');
        filterTags.forEach(tag => {
            const closeBtn = tag.querySelector('button');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    tag.remove();
                });
            }
        });

        // Clear all filters
        const clearAllBtn = document.querySelector('button.text-primary.text-sm.hover\\:underline');
        if (clearAllBtn) {
            clearAllBtn.addEventListener('click', function() {
                filterTags.forEach(tag => {
                    tag.remove();
                });
            });
        }
    });
</script>
</body>

</html>
