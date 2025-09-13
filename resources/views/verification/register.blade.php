@extends('verification.layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                {{-- @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            {{ Session('error') }}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}


                <main class="flex-grow container mx-auto px-4 py-12 flex flex-col items-center">
                    <div class="container mx-auto px-4 text-center pt-16 md:pt-24">
                        <h1 class="text-4xl font-bold text-gray-800 mb-2">Verification System</h1>
                        <h5 class="text-muted fw-normal mb-4">Welcome! Register your account.</h5>
                        <div class="w-16 h-1 bg-gold mx-auto mt-4"></div>
                    </div>
                    <!-- Login Form Container -->
                    <section class="login-container bg-white rounded-lg shadow-md p-8 mb-12 w-full">
                        <div class="col-md-8 ps-md-0">
                            @if ($message = Session::get('mssg'))
                                <div class="alert alert-{{ $message['type'] }} alert-dismissible" style="color:green;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-{{ $message['icon'] }}"></i> Alert!</h5>
                                    {{ $message['message'] }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div style="color:red;" class="alert alert-danger pb-0 pl-0" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="login-form" class="space-y-6" action="{{ route('verification.saveRegister') }}"
                                method="POST">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label ">Full Name</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                        name="fullname" id="fullname" placeholder="Enter Full Name" required>

                                </div>
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Phone Number</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                        name="userPhone" id="userPhone" placeholder="Enter your phone" required>

                                </div>

                                <div class="mb-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email
                                        Address</label>
                                    <input type="text" id="email" name="email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                        placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                        placeholder="Enter your password">
                                    <i class="ri-eye-line password-toggle absolute right-3 top-10 text-gray-500"
                                        id="password-toggle"></i>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Confirm
                                        Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-primary"
                                        placeholder="Enter your password">
                                    <i class="ri-eye-line password-toggle absolute right-3 top-10 text-gray-500"
                                        id="password-toggle"></i>
                                </div>
                                <div class="password-strength bg-gray-200 rounded" id="password-strength"></div>

                                <div id="recaptcha-container" class="my-4"></div>
                                <button type="submit"
                                    class="w-full bg-primary text-white px-4 py-2 !rounded-button font-medium hover:bg-opacity-90 transition">Login</button>
                                <p class="text-center text-sm text-gray-600">
                                    You have account, <a href="/verification/login"
                                        class="text-primary hover:underline">Login
                                        Here</a>
                                </p>
                                {{-- <p class="text-center text-sm text-gray-600">
                                Not a Member Yet and Cant't Remember Your Registration Number? <a href="/submit-data/submit"
                                    class="text-primary hover:underline">Register Here</a>
                            </p> --}}
                            </form>
                            <div class="flex items-center justify-center mt-4">
                                <i class="ri-lock-2-line text-green-600 mr-2"></i>
                                <span class="text-sm text-gray-600">Secured with SSL</span>
                            </div>
                    </section>

                    <!-- Portal Benefits Section -->

                </main>
            </div>
        </div>

    </div>
@endsection
