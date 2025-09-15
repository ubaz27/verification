@extends('verification.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Information Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vefirication Data</h4>
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
                        <form id="signupForm" action="{{ route('verification.generateInvoice') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-6">
                                    <label for="ageSelect" class="form-label">Certificate No</label> <span
                                        class = "text-danger">*</span>
                                    <input type="text" name="certificate_no" value="{{ $data->certificate_no }}"
                                        class="form-control" id="certificate_no" required readonly>

                                </div>

                                <div class="col-md-6">
                                    <label for="ageSelect" class="form-label">Full Name</label> <span
                                        class = "text-danger">*</span>
                                    <input type="text" name="fullname" value="{{ $data->fullname }}" class="form-control"
                                        id="certificate_no" readonly required>

                                </div>

                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Generate Invoice" style="width:30%;">
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
