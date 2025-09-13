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
                            <span>NITT Zaria Office<br>NITT Zaria<br>Basawa Road, Zaria, Kaduna State, Nigeria.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span>+234 908 000 000</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span>info@nitt.gov.ng</span>
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
                        <li><a href="{{ url('/') }}" class="hover:text-primary transition">Home</a></li>
                        <li><a href="{{ url('/verification/login') }}" class="hover:text-primary transition">Login</a>
                        </li>
                        <li><a href="{{ url('/about') }}" class="hover:text-primary transition">About Us</a></li>
                        <li><a href="{{ url('/contact') }}" class="hover:text-primary transition">Contact Us</a>
                        </li>

                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Resources</h3>
                    <ul class="space-y-3">
                        <li><a href="https://nitt.gov.ng" class="hover:text-primary transition">NITT Homepage</a></li>
                        <li><a href="https://cng.nitt.gov.ng" class="hover:text-primary transition">CNG Website</a></li>
                        {{-- <li><a href="{{ url('/scholarships') }}" class="hover:text-primary transition">Scholarship
                                Opportunities</a></li>
                        <li><a href="#" class="hover:text-primary transition">Transcript Requests</a></li>
                        <li><a href="#" class="hover:text-primary transition">University Library Access</a></li>
                        <li><a href="#" class="hover:text-primary transition">Career Development</a></li>
                        <li><a href="#" class="hover:text-primary transition">Alumni Magazine</a></li>
                        <li><a href="#" class="hover:text-primary transition">Photo Gallery</a></li> --}}
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
                <p>&copy; 2025 Ubaznet Software Solution. All Rights Reserved.</p>
                <div class="flex justify-center gap-6 mt-4">
                    <a href="#" class="hover:text-primary transition">Privacy Policy</a>
                    <a href="#" class="hover:text-primary transition">Terms of Service</a>
                    <a href="#" class="hover:text-primary transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
