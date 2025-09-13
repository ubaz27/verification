@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Passport Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload Passport</h4>
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

                <div class="row">
                    <div class="col-lg-12 ">
                        <form id="signupForm" action="{{ route('member.uploadPassport') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <center>
                                        <img style="width:30%;height:30%;" src="{{ asset('img/passport/' . $passport) }}"
                                            alt="" id="thumb" class="form-control">
                                    </center>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <label for="ageSelect" class="form-label">Select Passport</label> <span
                                        class = "text-danger">*</span>
                                    <input type="file" name="passport" id="passport" onchange="preview()"
                                        class="control-form" required>
                                    <div class="help-block center-block text-danger"><small>Select file < 100KB. only JPEG
                                                or JPG allowed</small>
                                    </div>
                                </div>



                            </div>

                            <br>
                            <input class="btn btn-primary" type="submit" value="Upload" style="width:30%;">
                        </form>
                    </div>



                </div>

                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}


            </div>
        </div>
    </div>

    <script>
        function preview() {
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }

        function preview2() {
            thumb2.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
