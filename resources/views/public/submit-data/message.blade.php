<x-header></x-header>

<!-- Registration Process -->
<section id="registration" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">How to Become a Member</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Follow these simple steps to join the BUK Alumni Association
                and start enjoying the benefits.</p>
        </div>


        <!-- Registration Form -->
        <div class="bg-white rounded text-center shadow-lg p-8 max-w-3xl mx-auto">
            <h3 class="text-2xl text-center font-bold text-gray-800 mb-6">Submission of Data</h3>
            {{ $message }}

            <p>
                Login to your account via <a class="hover:text-primary transition"
                    href="{{ url('/login-submit-data') }}">here</a>
            </p>
            <br>
            <div class="text-center mb-12">
                <a style="width: 30%;margin-left:35%" href="/show/search"
                    class="block items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Go
                    Back
                </a>
                </h4>
            </div>
            {{-- <a href="/membership">Back</a> --}}
        </div>
    </div>
</section>


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
