@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Signature Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload Signature</h4>
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
                    <div class="col-lg-6 ">
                        <form id="signupForm" action="{{ route('member.uploadSignature') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <center>
                                        <img style="width:30%;height:30%;" src="{{ asset('img/signature/' . $signature) }}"
                                            alt="" id="thumb" class="form-control">
                                    </center>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <label for="ageSelect" class="form-label">Select Signature</label> <span
                                        class = "text-danger">*</span>
                                    <input type="file" name="signature" id="signature" onchange="preview()"
                                        class="control-form" required>
                                    <div class="help-block center-block text-danger"><small>Select file < 40KB. only JPEG or
                                                JPG allowed</small>
                                                <br>

                                    </div>
                                </div>



                            </div>

                            <br>
                            <input class="btn btn-primary" type="submit" value="Upload" style="width:30%;">
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <script>
        function preview() {
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
