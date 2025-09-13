@extends('verification.layout.master')

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

                <form id="signupForm" action="{{ route('member.saveProfile') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Full Name</label> <span class = "text-danger">*</span>
                            <input id="fullname" class="form-control" name="fullname" value="{{ $application->fullname }}"
                                type="text" readonly>
                        </div>


                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label> <span class = "text-danger">*</span>
                            <input id="email" class="form-control" name="email" type="email"
                                value="{{ $application->email }}" required placeholder="Valid Email" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Phone</label> <span class = "text-danger">*</span>
                            <input id="email" class="form-control" name="phone" type="text"
                                value="{{ $application->phone }}" required placeholder="Valid Phone">
                        </div>
                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Gender</label> <span
                                class = "asterisk">*</span>
                            <select name="gender" class="form-control" id="">
                                <option value="">---Select Gender----</option>
                                <option value="Male" {{ $application->gender == 'Male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="Female" {{ $application->gender == 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>

                            </select>
                        </div>


                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Address</label> <span
                                class = "text-danger">*</span>
                            <textarea name="address" id="address" class="form-control" cols="30" rows="2">{{ $application->address }}</textarea>

                        </div>


                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Update" style="width:30%;">
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
