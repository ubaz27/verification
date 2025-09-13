<x-header>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .scholarship-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-merit { background-color: #fef3c7; color: #92400e; }
        .badge-gender { background-color: #fce7f3; color: #be185d; }
        .badge-government { background-color: #dbeafe; color: #1e40af; }
        .badge-corporate { background-color: #d1fae5; color: #065f46; }
        .badge-medical { background-color: #fee2e2; color: #991b1b; }
        .badge-international { background-color: #e0e7ff; color: #3730a3; }
    </style>
</x-header>

    <!-- Page Header -->
    <section class="relative bg-gradient-to-r from-blue-800 to-purple-800 py-20">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">{{ $scholarship->title }}</h1>
            <p class="text-xl">{{ $scholarship->organisation }}</p>
        </div>
    </section>

    <!-- Scholarship Details -->
    <section class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <span class="scholarship-badge
                            @if($scholarship->scholarship_type == 'Merit-Based') badge-merit
                            @elseif($scholarship->scholarship_type == 'Gender-Specific') badge-gender
                            @elseif($scholarship->scholarship_type == 'Government') badge-government
                            @elseif($scholarship->scholarship_type == 'Corporate') badge-corporate
                            @elseif($scholarship->scholarship_type == 'Medical/Health') badge-medical
                            @elseif($scholarship->scholarship_type == 'International') badge-international
                            @endif">
                            {{ $scholarship->scholarship_type }}
                        </span>
                        <span class="text-lg font-semibold
                            @if($scholarship->status == 'active') text-green-600
                            @else text-red-600
                            @endif">
                            {{ ucfirst($scholarship->status) }}
                        </span>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $scholarship->title }}</h2>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Scholarship Details</h3>
                            <div class="space-y-3">
                                <p><strong class="text-gray-700">Organisation:</strong> {{ $scholarship->organisation }}</p>
                                <p><strong class="text-gray-700">Amount:</strong> {{ $scholarship->formatted_amount }}</p>
                                @if($scholarship->duration)
                                <p><strong class="text-gray-700">Duration:</strong> {{ $scholarship->duration }}</p>
                                @endif
                                <p><strong class="text-gray-700">Application Deadline:</strong>
                                    <span class="@if($scholarship->status == 'expired') text-red-600 @else text-green-600 @endif">
                                        {{ $scholarship->deadline->format('F j, Y') }}
                                    </span>
                                </p>
                                <p><strong class="text-gray-700">Posted:</strong> {{ $scholarship->date_posted->format('F j, Y') }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                @if($scholarship->application_link && $scholarship->status == 'active')
                                <a href="{{ $scholarship->application_link }}" target="_blank"
                                   class="block w-full bg-primary text-white text-center px-6 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition">
                                    Apply Now
                                </a>
                                @endif
                                <a href="{{ route('scholarships.index') }}"
                                   class="block w-full bg-gray-200 text-gray-800 text-center px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                                    Back to All Scholarships
                                </a>
                                @if($scholarship->status == 'active')
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <p class="text-sm text-blue-800">
                                        <strong>Days Remaining:</strong> {{ $scholarship->days_remaining }} days
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($scholarship->description)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Description</h3>
                        <div class="prose max-w-none">
                            <p class="text-gray-600 leading-relaxed">{{ $scholarship->description }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Eligibility Criteria</h3>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <p class="text-gray-600 leading-relaxed">{{ $scholarship->eligibility }}</p>
                        </div>
                    </div>

                    @if($scholarship->application_link)
                    <div class="border-t pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">How to Apply</h3>
                        <p class="text-gray-600 mb-4">
                            Ready to apply for this scholarship? Click the button below to be redirected to the official application portal.
                        </p>
                        @if($scholarship->status == 'active')
                        <a href="{{ $scholarship->application_link }}" target="_blank"
                           class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition">
                            Apply Now
                        </a>
                        @else
                        <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
                            <p class="text-red-800">This scholarship application deadline has passed.</p>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Related Scholarships -->
    <section class="container mx-auto px-4 py-12 bg-gray-50">
        <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Related Scholarships</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedScholarships as $related)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <span class="scholarship-badge
                        @if($related->scholarship_type == 'Merit-Based') badge-merit
                        @elseif($related->scholarship_type == 'Gender-Specific') badge-gender
                        @elseif($related->scholarship_type == 'Government') badge-government
                        @elseif($related->scholarship_type == 'Corporate') badge-corporate
                        @elseif($related->scholarship_type == 'Medical/Health') badge-medical
                        @elseif($related->scholarship_type == 'International') badge-international
                        @endif">
                        {{ $related->scholarship_type }}
                    </span>
                    <span class="text-sm text-gray-500">{{ $related->deadline->format('M j, Y') }}</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $related->title }}</h3>
                <p class="text-gray-600 mb-2"><strong>Amount:</strong> {{ $related->formatted_amount }}</p>
                <p class="text-gray-600 mb-4">{{ Str::limit($related->description, 100) }}</p>
                <a href="{{ route('scholarships.show', $related->id) }}"
                   class="text-primary font-medium hover:underline">Learn More</a>
            </div>
            @endforeach
        </div>
    </section>

    <x-footer></x-footer>
