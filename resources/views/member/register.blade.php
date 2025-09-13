@extends('member.layout.master2')

@section('content')
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
                <div class="card">
                    <div class="row">
                        {{-- <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper"
                                style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

                            </div>
                        </div> --}}
                        <div class="col-md-4 pe-md-0 sm-hide" style="">
                            <div class="auth-side-wrapper">
                                <center>
                                    <img src="{{ asset('assets/images/logo.png') }}"
                                        style="margin-top:40%; width: 50%;height: 150%;object-fit: contain;" alt="">
                                </center>

                            </div>
                        </div>

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger pb-0 pl-0" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <div class="col-md-8 ps-md-0">
                            @if ($message = Session::get('mssg'))
                                <div class="alert alert-{{ $message['type'] }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-{{ $message['icon'] }}"></i> Alert!</h5>
                                    {{ $message['message'] }}
                                </div>
                            @endif

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
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">
                                    {{ env('APP_NAME') }}
                                    <span>Alumni
                                    </span>System</a>
                                {{-- <a href="#" class="noble-ui-logo d-block mb-2">Land <span>Management
                                    </span>System</a> --}}
                                <h5 class="text-muted fw-normal mb-4">Welcome! Register your account.</h5>
                                <form class="forms-sample" action="{{ route('member.saveRegister') }}" method="POST">
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="userPhone" id="userPhone"
                                            placeholder="Enter your phone" required>

                                    </div>
                                    {{-- {{ $Umar }} --}}
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname"
                                            placeholder="Enter Full Name" required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="userPassword" id="userPassword"
                                            autocomplete="current-password" placeholder="Password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmPassword"
                                            id="confirmPassword" autocomplete="current-password"
                                            placeholder="Confirm Password" required>
                                    </div>

                                    <div>

                                        <input type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0"
                                            name = 'submit' value="Register"> <br>
                                        <p>
                                            If you have an account Login<a href="login"> here</a>
                                        </p>

                                        {{-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            <i class="btn-icon-prepend" data-lucide="twitter"></i>
                                            Login with twitter
                                        </button> --}}
                                    </div>
                                    {{-- <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user? Sign
                                        up</a> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
