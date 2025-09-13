@extends('verification.layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-12 col-xl-12 mx-auto">
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


                <main class="flex-grow container mx-auto py-12 flex flex-col items-center">
                    <div class="container mx-auto px-4 text-center pt-24 md:pt-24">
                        <h1 class="text-4xl font-bold text-gray-800 mb-2">Verification System</h1>
                        <h5 class="text-muted fw-normal mb-4">Welcome! Registration Success Message.</h5>
                        <div class="w-16 h-1 bg-gold mx-auto mt-4"></div>
                    </div>
                    <!-- Login Form Container -->
                    <section class="login-container bg-white rounded-lg shadow-md p-8 mb-12 w-full">

                        <div class="" style="text-align: center;">
                            <h3>{{ $message }}</h3>
                        </div>

                    </section>

                    <!-- Portal Benefits Section -->

                </main>
            </div>
        </div>

    </div>
@endsection
