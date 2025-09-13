<x-header>
    <style>
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
        .faq-item {
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .faq-answer.active {
            max-height: 500px;
        }
        .category-filter {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .category-filter:hover {
            background-color: #f3f4f6;
        }
        .category-filter.active {
            background-color: #00a0b0;
            color: white;
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
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Frequently Asked Questions</h1>
        <p class="text-xl md:text-2xl text-white/90 font-light">Find answers to common questions about the BUK Alumni Association</p>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="relative">
                <input type="text" id="faqSearch" placeholder="Search FAQs..."
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                    <i class="ri-search-line text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Category Sidebar -->
                <div class="lg:w-1/4">
                    <div class="bg-gray-50 rounded-lg p-6 sticky top-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Categories</h3>
                        <div class="space-y-2">
                            <div class="category-filter px-3 py-2 rounded {{ !isset($selectedCategory) ? 'active' : '' }}"
                                 data-category="all">
                                <i class="ri-list-check-2 mr-2"></i>All Questions
                            </div>
                            @foreach($categories as $category)
                                <div class="category-filter px-3 py-2 rounded {{ isset($selectedCategory) && $selectedCategory === $category ? 'active' : '' }}"
                                     data-category="{{ $category }}">
                                    <i class="ri-question-line mr-2"></i>{{ $category }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- FAQ Items -->
                <div class="lg:w-3/4">
                    <div class="space-y-4" id="faqContainer">
                        @foreach($faqs as $faq)
                            <div class="faq-item bg-white border border-gray-200 rounded-lg overflow-hidden"
                                 data-category="{{ $faq->category }}"
                                 data-question="{{ strtolower($faq->question) }}"
                                 data-answer="{{ strtolower($faq->answer) }}">
                                <div class="faq-question px-6 py-4 cursor-pointer flex justify-between items-center hover:bg-gray-50"
                                     onclick="toggleFaq({{ $faq->id }})">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <span class="text-xs font-medium text-primary bg-primary/10 px-2 py-1 rounded-full">
                                                {{ $faq->category }}
                                            </span>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 pr-4">{{ $faq->question }}</h3>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="ri-add-line text-primary text-xl transition-transform duration-300" id="icon-{{ $faq->id }}"></i>
                                    </div>
                                </div>
                                <div class="faq-answer" id="answer-{{ $faq->id }}">
                                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                        <p class="text-gray-700 leading-relaxed">{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- No Results Message -->
                    <div id="noResults" class="text-center py-12 hidden">
                        <div class="text-gray-400 mb-4">
                            <i class="ri-search-line text-6xl"></i>
                        </div>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">No FAQs Found</h3>
                        <p class="text-gray-500">Try adjusting your search terms or browse different categories.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Still Have Questions?</h2>
            <p class="text-gray-700 mb-8 max-w-2xl mx-auto">
                If you couldn't find the answer you're looking for, our team is here to help.
                Reach out to us through any of the following channels:
            </p>

            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-mail-line text-primary text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Email Us</h3>
                    <p class="text-gray-600">info@bukalumni.org</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-phone-line text-primary text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Call Us</h3>
                    <p class="text-gray-600">+234 803 123 4567</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-map-pin-line text-primary text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Visit Us</h3>
                    <p class="text-gray-600">Alumni Center, BUK Campus</p>
                </div>
            </div>

            <a href="{{ url('/contact') }}" class="inline-block bg-primary hover:bg-primary/90 text-white font-medium px-8 py-3 rounded-lg transition-colors duration-300">
                Contact Us
            </a>
        </div>
    </div>
</section>

<x-footer></x-footer>

<script>
    // FAQ Toggle Function
    function toggleFaq(id) {
        const answer = document.getElementById(`answer-${id}`);
        const icon = document.getElementById(`icon-${id}`);

        if (answer.classList.contains('active')) {
            answer.classList.remove('active');
            icon.classList.remove('ri-subtract-line');
            icon.classList.add('ri-add-line');
        } else {
            // Close all other FAQs
            document.querySelectorAll('.faq-answer.active').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('.ri-subtract-line').forEach(icon => {
                icon.classList.remove('ri-subtract-line');
                icon.classList.add('ri-add-line');
            });

            // Open current FAQ
            answer.classList.add('active');
            icon.classList.remove('ri-add-line');
            icon.classList.add('ri-subtract-line');
        }
    }

    // Search Functionality
    document.getElementById('faqSearch').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        filterFaqs(searchTerm);
    });

    // Category Filter
    document.querySelectorAll('.category-filter').forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.dataset.category;

            // Update active category
            document.querySelectorAll('.category-filter').forEach(f => f.classList.remove('active'));
            this.classList.add('active');

            // Filter FAQs
            filterByCategory(category);

            // Clear search
            document.getElementById('faqSearch').value = '';
        });
    });

    function filterFaqs(searchTerm) {
        const faqItems = document.querySelectorAll('.faq-item');
        let visibleCount = 0;

        faqItems.forEach(item => {
            const question = item.dataset.question;
            const answer = item.dataset.answer;

            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        toggleNoResults(visibleCount === 0);
    }

    function filterByCategory(category) {
        const faqItems = document.querySelectorAll('.faq-item');
        let visibleCount = 0;

        faqItems.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        toggleNoResults(visibleCount === 0);
    }

    function toggleNoResults(show) {
        const noResults = document.getElementById('noResults');
        if (show) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        // Close all FAQs initially
        document.querySelectorAll('.faq-answer').forEach(answer => {
            answer.classList.remove('active');
        });
    });
</script>

</body>
</html>
