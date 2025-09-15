@extends('verification.layout.master')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-12 col-xl-12 mx-auto">


                <main class="flex-grow container mx-auto py-12 flex flex-col items-center">
                    <section class="login-container bg-white rounded-lg shadow-md p-4 mb-12 w-full">

                        <div class="" style="text-align: left;">
                            <h2 class="text-4xl font-bold text-gray-800 mb-2">Duplicated Invoice Detected</h2>
                            <h5 class="text-muted fw-normal mb-4"></h5>
                            <h3>{{ $message }}</h3>
                        </div>

                    </section>
                    <!-- Login Form Container -->


                    <!-- Portal Benefits Section -->

                </main>
            </div>
        </div>

    </div>
@endsection
