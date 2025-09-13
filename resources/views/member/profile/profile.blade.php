@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Profile Form</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Details</h4>
                <hr>
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            {{ Session('error') }}
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                        <ul>
                            {{ Session('message') }}
                        </ul>
                    </div>
                @endif
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('member.saveProfile') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Registration Numbers</label> <span
                                class="text-danger">(*)</span>
                            <input id="regno" class="form-control" value="{{ $regno }}" name="regno"
                                type="text" required readonly>
                        </div>

                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Full Name</label> <span class = "text-danger">*</span>
                            <input id="fullname" class="form-control" name="fullname" value="{{ $fullname }}"
                                type="text" readonly>
                        </div>






                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label> <span class = "text-danger">*</span>
                            <input id="email" class="form-control" name="email" type="email"
                                value="{{ $email }}" required placeholder="Valid Email">
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Gender</label> <span
                                class = "asterisk">*</span>
                            <select name="gender" class="form-control" id="">
                                <option value="">---Select Gender----</option>
                                <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Date of Birth</label> <span
                                class = "asterisk">*</span>
                            <input type="date" name="dob" class="form-control" value="{{ $dob }}">
                        </div>

                        <div class="col-md-3">

                            <label for="confirm_password" class="form-label">Year of Graduation</label> <span
                                class = "asterisk">*</span>
                            <input type="Month" name="yog" value="{{ $year_graduation }}" class="form-control">
                        </div>
                        {{-- <div class="col-md-3">
                            <label for="confirm_password" class="form-label">State</label> <span class = "asterisk">*</span>
                            <select name="state" class="form-control" id="">
                                <option value="">---Select State----</option>
                                @foreach ($states as $item)
                                    <option {{ $state == $item->state ? 'selected' : '' }}>{{ $item->state }}
                                    </option>
                                @endforeach



                            </select>
                        </div> --}}
                        <div class="col-md-3">
                            <label for="ageSelect" class="form-label">Nationality</label> <span
                                class = "text-danger">*</span>
                            <select class="js-example-basic-single form-select" name="nationality" id="nationality"
                                required>

                                @if (!blank($country))
                                    <option selected>
                                        {{ $country }}</option>
                                @else
                                    <option selected>Select Country</option>
                                @endif
                                @php

                                @endphp
                                @foreach ($countries as $country)
                                    <option>{{ $country->nationality }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ageSelect" class="form-label">State</label> <span class = "text-danger">*</span>
                            <select class="js-example-basic-single form-select" name="state" id="state" required>

                                @if (!blank($state))
                                    <option selected>
                                        {{ $state }}</option>
                                @else
                                    <option selected>Select State</option>
                                @endif

                                @foreach ($states as $state)
                                    <option>{{ $state->state }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Residential Address</label> <span
                                class = "text-danger">*</span>
                            <textarea name="address" id="address" class="form-control" cols="30" rows="2">{{ $address }}</textarea>

                        </div>

                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Office Address</label> <span
                                class = "text-danger">*</span>
                            <textarea name="officeaddress" id="address" class="form-control" cols="30" rows="2">{{ $officeaddress }}</textarea>

                        </div>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Update" style="width:20%;">
                </form>

            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {


            $("#nationality").change(function() {
                $("#lga").empty();
                $("#state").empty();
                var nationality = $("#nationality").val();
                // alert(nationality);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('member.fetchState') }}",
                    data: {
                        'nationality': nationality,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        $('#state').append(
                            '<option value="">-- Select State--</option>');
                        response.state.forEach(state =>
                            $('#state').append("<option>" + state.state + "</option>")
                        )
                    },
                    error: function(jqXHR, textStatus,
                        errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' +
                            errorThrown);
                    }
                });
            });



        });
    </script>
@endpush
