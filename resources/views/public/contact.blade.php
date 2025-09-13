<x-header>

    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .map-container {
            background-image: url('https://public.readdy.ai/gen_page/map_placeholder_1280x720.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #006400;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-checkbox {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .custom-checkbox input:checked~.checkmark {
            background-color: #006400;
            border-color: #006400;
        }

        .checkmark:after {
            content: "";
            display: none;
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox input:checked~.checkmark:after {
            display: block;
        }
    </style>
</x-header>

<!-- Hero Section -->
<section class="relative bg-primary text-white py-16">
    <div class="absolute inset-0 opacity-10"
        style="background-image: url('https://readdy.ai/api/search-image?query=University%20campus%20aerial%20view%20with%20green%20lawns%2C%20academic%20buildings%2C%20and%20students%20walking%2C%20bright%20sunny%20day%2C%20vibrant%20university%20life%2C%20Bayero%20University%20Kano%20campus%2C%20Nigeria%2C%20educational%20institution%2C%20academic%20environment%2C%20university%20architecture&width=1280&height=400&seq=1&orientation=landscape'); background-size: cover; background-position: center;">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-4xl font-bold mb-4" style="margin-top:15px;">Get in Touch with NITT Verification
                Team</h1>
            <p class="text-lg md:text-xl opacity-90">Quickly check certificates—simple, fast, and hassle-free!</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Contact Form -->
            <div class="lg:w-7/12 bg-white rounded-lg shadow-md p-6 md:p-8">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Send Us a Message</h2>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full
                                Name*</label>
                            <input type="text" id="fullName"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                Address*</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20"
                                required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                Number</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject*</label>
                            <div class="relative">
                                <select id="subject"
                                    class="w-full appearance-none px-4 py-2 pr-8 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20"
                                    required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="membership">Membership</option>
                                    <option value="events">Events & Programs</option>
                                    <option value="donations">Donations & Support</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message*</label>
                        <textarea id="message" rows="5"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20" required></textarea>
                    </div>
                    <div class="mb-6">
                        <label class="custom-checkbox flex items-center">
                            <input type="checkbox" class="hidden">
                            <span class="checkmark mr-2"></span>
                            <span class="text-sm text-gray-600">I agree to receive communications from BUK Alumni
                                Association</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="!rounded-button bg-primary hover:bg-primary/90 text-white px-6 py-3 font-medium transition-colors whitespace-nowrap">Send
                        Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="lg:w-5/12">
                <div class="bg-white rounded-lg shadow-md p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-primary/10 text-primary rounded-full mr-4">
                                <i class="ri-mail-line ri-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Email</h3>
                                <a href="mailto:info@bukalumni.org.ng"
                                    class="text-gray-800 hover:text-primary">info@nitt.gov.ng</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-primary/10 text-primary rounded-full mr-4">
                                <i class="ri-phone-line ri-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Phone</h3>
                                <a href="tel:+2348012345678" class="text-gray-800 hover:text-primary">+234 801 000
                                    000</a><br>
                                <a href="tel:+2349087654321" class="text-gray-800 hover:text-primary">+234 908 000
                                    000</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-primary/10 text-primary rounded-full mr-4">
                                <i class="ri-map-pin-line ri-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Address</h3>
                                <p class="text-gray-800">NITT Zaria<br>
                                    Basawa Road, Zaria, Kaduna State, Nigeria.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-primary/10 text-primary rounded-full mr-4">
                                <i class="ri-time-line ri-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Office Hours</h3>
                                <p class="text-gray-800">Monday - Friday: 8:00 AM - 4:00 PM<br>
                                    Saturday and Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
                    <h2 class="text-lg font-semibold mb-4 text-gray-800">Connect With Us</h2>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-primary/10 text-gray-600 hover:text-primary rounded-full transition-colors">
                            <i class="ri-facebook-fill ri-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-primary/10 text-gray-600 hover:text-primary rounded-full transition-colors">
                            <i class="ri-twitter-x-fill ri-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-primary/10 text-gray-600 hover:text-primary rounded-full transition-colors">
                            <i class="ri-instagram-line ri-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-primary/10 text-gray-600 hover:text-primary rounded-full transition-colors">
                            <i class="ri-linkedin-fill ri-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-primary/10 text-gray-600 hover:text-primary rounded-full transition-colors">
                            <i class="ri-whatsapp-line ri-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Visit Our Office</h2>
            <p class="text-gray-600 mt-2">Find us on the Bayero University Kano campus</p>
        </div>
        <div class="map-container h-80 md:h-96 rounded-lg shadow-md overflow-hidden"></div>
    </div>
</section>

<!-- Key Contacts Section -->


<!-- Quick Links Section -->
<section class="py-12 bg-primary/5">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Quick Links</h2>
                <p class="text-gray-600 mt-2">Explore more resources and ways to connect</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                    class="!rounded-button flex items-center px-6 py-3 bg-white border border-gray-200 hover:border-primary hover:bg-primary/5 text-gray-700 hover:text-primary transition-colors shadow-sm whitespace-nowrap">
                    <i class="ri-user-star-line mr-2"></i> Verification Portal
                </a>
                <a href="#"
                    class="!rounded-button flex items-center px-6 py-3 bg-white border border-gray-200 hover:border-primary hover:bg-primary/5 text-gray-700 hover:text-primary transition-colors shadow-sm whitespace-nowrap">
                    <i class="ri-question-line mr-2"></i> FAQs
                </a>
                <a href="#"
                    class="!rounded-button flex items-center px-6 py-3 bg-white border border-gray-200 hover:border-primary hover:bg-primary/5 text-gray-700 hover:text-primary transition-colors shadow-sm whitespace-nowrap">
                    <i class="ri-calendar-line mr-2"></i> NITT Website
                </a>
                {{-- <a href="#"
                    class="!rounded-button flex items-center px-6 py-3 bg-white border border-gray-200 hover:border-primary hover:bg-primary/5 text-gray-700 hover:text-primary transition-colors shadow-sm whitespace-nowrap">
                    <i class="ri-hand-heart-line mr-2"></i> Donate
                </a> --}}
            </div>
        </div>
    </div>
</section>

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
        const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkmark = this.nextElementSibling;
                if (this.checked) {
                    checkmark.classList.add('bg-primary', 'border-primary');
                } else {
                    checkmark.classList.remove('bg-primary', 'border-primary');
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.innerHTML;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData();
            formData.append('full_name', document.getElementById('fullName').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('subject', document.getElementById('subject').value);
            formData.append('message', document.getElementById('message').value);
            formData.append('agree_communications', document.querySelector(
                '.custom-checkbox input[type="checkbox"]').checked ? '1' : '0');
            formData.append('_token', '{{ csrf_token() }}');

            // Simple validation
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            if (!fullName || !email || !subject || !message) {
                alert('Please fill in all required fields.');
                return;
            }

            // Disable submit button and show loading
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="ri-loader-4-line ri-spin"></i> Sending...';

            // Send AJAX request
            fetch('{{ route('contact.submit') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        form.innerHTML = `
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full mx-auto mb-4 d-flex align-items-center justify-content-center">
                                    <i class="ri-check-line" style="font-size: 2rem;"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Message Sent Successfully!</h3>
                                <p class="text-gray-600">${data.message}</p>
                            </div>
                        `;
                    } else {
                        // Show error message
                        alert(data.message ||
                            'An error occurred while sending your message. Please try again.');

                        // Re-enable submit button
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalButtonText;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while sending your message. Please try again.');

                    // Re-enable submit button
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                });
        });
    });
</script>
</body>

</html>
