<x-header></x-header>
<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    <ul>
                        {{ Session('error') }}
                        {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                    </ul>
                </div>
            @endif
            <main class="flex-grow container mx-auto px-4 py-12 flex flex-col items-center">
                <div class="container mx-auto px-4 text-center pt-16 md:pt-24">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Data Submission Login</h1>
                    <p class="text-lg text-gray-600">Access Your Profile for Confirmation of Your Data</p>
                    <div class="w-16 h-1 bg-gold mx-auto mt-4"></div>
                </div>
                <!-- Login Form Container -->
                <section class="login-container bg-white rounded-lg shadow-md p-8 mb-8 w-full">
                    <form id="login-form" class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="text" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                placeholder="Enter your email">
                        </div>
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                placeholder="Enter your password">
                            <i class="ri-eye-line password-toggle absolute right-3 top-10 text-gray-500"
                                id="password-toggle"></i>
                        </div>
                        <div class="password-strength bg-gray-200 rounded" id="password-strength"></div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                            </label>
                            <a href="#" class="text-sm text-primary hover:underline">Forgot Password?</a>
                        </div>
                        <div id="recaptcha-container" class="my-4"></div>
                        <button type="submit"
                            class="w-full bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">Login</button>
                        <p class="text-center text-sm text-gray-600">
                            Not a Member Yet and Have Your Registration Number? <a href="/show/search"
                                class="text-primary hover:underline">Register Here</a>
                        </p>
                        <p class="text-center text-sm text-gray-600">
                            Not a Member Yet and Cant't Remember Your Registration Number? <a href="/submit-data/submit"
                                class="text-primary hover:underline">Register Here</a>
                        </p>
                    </form>
                    <div class="flex items-center justify-center mt-4">
                        <i class="ri-lock-2-line text-green-600 mr-2"></i>
                        <span class="text-sm text-gray-600">Secured with SSL</span>
                    </div>
                </section>

                <!-- Portal Benefits Section -->
                <section class="container mx-auto px-4 mb-12 text-center">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Why Use the Alumni Portal?</h2>
                    <ul class="max-w-2xl mx-auto text-left text-gray-600 space-y-4">
                        <li class="flex items-start">
                            <i class="ri-check-line text-primary text-xl mr-2 mt-1"></i>
                            <span>Manage your alumni profile with ease</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ri-check-line text-primary text-xl mr-2 mt-1"></i>
                            <span>Pay membership dues securely</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ri-check-line text-primary text-xl mr-2 mt-1"></i>
                            <span>Register for exclusive events and reunions</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ri-check-line text-primary text-xl mr-2 mt-1"></i>
                            <span>Explore career opportunities and job postings</span>
                        </li>
                        <li class="flex items-start">
                            <i class="ri-check-line text-primary text-xl mr-2 mt-1"></i>
                            <span>Connect with alumni for networking and mentorship</span>
                        </li>
                    </ul>
                </section>


                <!-- Help & Support Section -->
                <section class="container mx-auto px-4 mb-12 text-center bg-gray-100 py-12">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Need Help?</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6">
                        Our support team is here to assist you with accessing the portal or any other inquiries.
                    </p>
                    <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                        <a href="mailto:support@bukalumni.org.ng"
                            class="bg-primary text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">Email
                            Support</a>
                        <a href="#"
                            class="border border-primary text-primary px-6 py-3 !rounded-button font-medium hover:bg-primary hover:text-white transition">View
                            FAQs</a>
                        <a href="#"
                            class="bg-gold text-white px-6 py-3 !rounded-button font-medium hover:bg-opacity-90 transition">Live
                            Chat</a>
                    </div>
                    <p class="text-gray-600 mt-4">Contact: +234 812 345 6789 | support@bukalumni.org.ng</p>
                </section>
            </main>
        </div>
    </div>

</div>
<x-footer></x-footer>
