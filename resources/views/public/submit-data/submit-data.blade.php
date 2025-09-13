<x-header></x-header>
<!-- Hero Section -->



<!-- Registration Process -->
<section id="registration" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">How to Become a Member</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Follow these simple steps to join the BUK Alumni Association
                and start enjoying the benefits.</p>
        </div>


        <!-- Registration Form -->
        <div class="bg-white rounded shadow-lg p-8 max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Data Form</h3>

            <form id="register" name="register" method="POST" action="{{ url('/submit/data') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="firstName" class="block text-gray-700 font-medium mb-2">First Name <span
                                class="text-red">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>
                    <div>
                        <label for="firstName" class="block text-gray-700 font-medium mb-2">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary">
                    </div>
                    <div>
                        <label for="lastName" class="block text-gray-700 font-medium mb-2">Last Name <span
                                class="text-red">*</span></label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>
                    <div>
                        <label for="firstName" class="block text-gray-700 font-medium mb-2">Registration
                            Number (optional)</label>
                        <input type="text" id="regno" name="regno"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address <span
                                class="text-red">*</span></label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Password <span
                                class="text-red">*</span></label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number <span
                                class="text-red">*</span></label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>

                    <div>
                        <label for="graduationYear" class="block text-gray-700 font-medium mb-2">Graduation
                            Year <span>*</span></label>
                        <input type="number" name="graduationYear" id="graduationYear" min="1960" max="2025"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:border-primary" required>
                    </div>

                    <div>
                        <label for="faculty" class="block text-gray-700 font-medium mb-2">Programme <span
                                class="text-red">*</span></label>
                        <div class="relative">
                            <select id="programme_id" name="programme_id"
                                class="w-full appearance-none px-4 py-2 pr-8 border border-gray-300 rounded focus:border-primary bg-white"
                                required>
                                <option value="">Select Programme</option>
                                @foreach ($programmes as $item)
                                    {
                                    <option value="{{ $item->id }}">{{ $item->programme }}</option>

                                    }
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="degree" class="block text-gray-700 font-medium mb-2">Degree Obtained<span
                                class="text-red">*</span></label>
                        <div class="relative">
                            <select id="degree_id" name="degree_id"
                                class="w-full appearance-none px-4 py-2 pr-8 border border-gray-300 rounded focus:border-primary bg-white"
                                required>
                                <option value="">Select Degree</option>
                                @foreach ($programme_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="mb-6">
                    <label for="certificate" class="block text-gray-700 font-medium mb-2">Upload Degree
                        Certificate (PDF or Image)</label>
                    <div class="border border-dashed border-gray-300 rounded p-4 text-center">
                        <i class="ri-upload-2-line ri-2x text-gray-400 mb-2"></i>
                        <p class="text-gray-500 mb-2">Drag and drop your file here, or click to browse</p>
                        <input type="file" id="certificate" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                        <button type="button" class="text-primary hover:text-primary/80"
                            onclick="document.getElementById('certificate').click()">Browse Files</button>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" class="mt-1 mr-2" required>
                        <span class="text-gray-700">I confirm that all information provided is accurate and I agree
                            to the <a href="#" class="text-primary hover:underline">terms and conditions</a>
                            of the BUK Alumni Association.</span>
                    </label>
                </div>

                <button type="submit"
                    class="bg-primary text-white px-6 py-3 !rounded-button whitespace-nowrap font-semibold hover:bg-primary/90 transition">Submit
                    Registration</button>
            </form>
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
<footer class="bg-gray-800 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Contact Information -->
            <div>
                <h3 class="text-xl font-bold mb-6">Contact Us</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-5 h-5 flex items-center justify-center mt-1">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <span>Alumni Relations Office<br>Bayero University Kano<br>PMB 3011, Kano, Nigeria</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-phone-line"></i>
                        </div>
                        <span>+234 8012 345 6789</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-mail-line"></i>
                        </div>
                        <span>alumni@buk.edu.ng</span>
                    </li>
                </ul>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-twitter-x-fill"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-primary transition">Home</a></li>
                    <li><a href="#" class="hover:text-primary transition">About Us</a></li>
                    <li><a href="#" class="hover:text-primary transition">Events Calendar</a></li>
                    <li><a href="#" class="hover:text-primary transition">News & Updates</a></li>
                    <li><a href="#" class="hover:text-primary transition">Alumni Directory</a></li>
                    <li><a href="#" class="hover:text-primary transition">Career Opportunities</a></li>
                    <li><a href="#" class="hover:text-primary transition">Donate</a></li>
                    <li><a href="#" class="hover:text-primary transition">Contact Us</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h3 class="text-xl font-bold mb-6">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-primary transition">Alumni Benefits</a></li>
                    <li><a href="#" class="hover:text-primary transition">Mentorship Program</a></li>
                    <li><a href="#" class="hover:text-primary transition">Scholarship Opportunities</a></li>
                    <li><a href="#" class="hover:text-primary transition">Transcript Requests</a></li>
                    <li><a href="#" class="hover:text-primary transition">University Library Access</a></li>
                    <li><a href="#" class="hover:text-primary transition">Career Development</a></li>
                    <li><a href="#" class="hover:text-primary transition">Alumni Magazine</a></li>
                    <li><a href="#" class="hover:text-primary transition">Photo Gallery</a></li>
                </ul>
            </div>

            <!-- Latest Tweets -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and alumni news.
                </p>
                <form class="space-y-3">
                    <div>
                        <input type="email" placeholder="Your email address"
                            class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded text-gray-200 focus:outline-none focus:border-primary">
                    </div>
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white font-medium px-4 py-2 !rounded-button whitespace-nowrap">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
            <p>&copy; 2025 Bayero University Kano Alumni Association. All Rights Reserved.</p>
            <div class="flex justify-center gap-6 mt-4">
                <a href="#" class="hover:text-primary transition">Privacy Policy</a>
                <a href="#" class="hover:text-primary transition">Terms of Service</a>
                <a href="#" class="hover:text-primary transition">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

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
