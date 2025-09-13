@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Admin Form</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Admin Details</h4>
                <hr>
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('admin.saveEditApplicant') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Registration Number</label>
                            @foreach ($records as $item)
                                <input id="regno" class="form-control" name="regno"
                                    value="{{ old('regno', $item->regno) }}" type="text" required>
                                <input id="id" class="form-control" name="id" hidden
                                    value="{{ old('id') }} {{ $item->id }}" type="text" required>
                            @endforeach

                        </div>
                        <div class="col-md-3 ">
                            <label for="name" class="form-label">First Name</label>

                            <input id="fullname" class="form-control" name="first_name"
                                value="{{ old('first_name', $item->first_name) }}" type="text" required>

                        </div>

                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Middle Name</label>

                            <input id="fullname" class="form-control" name="middle_name"
                                value="{{ old('middle_name', $item->middle_name) }}" type="text">

                        </div>

                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Last Name</label>

                            <input id="fullname" class="form-control" name="last_name"
                                value="{{ old('last_name', $item->last_name) }}" type="text" required>

                        </div>

                        <div class="col-md-6 ">
                            <label for="name" class="form-label">Programme Name</label> (<span
                                class="text-danger">required</span>)

                            <select name="programme_id" id="programme_id" class="form-control">
                                <option value="Select">--Select Programme--</option>
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->id }}"
                                        {{ old('programme_id', $item->programme_id ?? '') == $programme->id ? 'selected' : '' }}>
                                        {{ $item->programme }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Year of Graduation</label>
                            <input id="email" class="form-control" name="yog" value="{{ $item->year_graduation }}"
                                type="text" required>
                        </div>
                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Status</label>
                            <select name="status_id" id="status_id" class="form-control" name="status">
                                <option value="Select">Status</option>
                                <option value="1">Active</option>
                                <option value="2">Validate</option>
                                <option value="3">Reject</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Degree Class</label>
                            <select name="degree_class_id" id="degree_class_id" class="form-control">
                                <option value="Select">--Select--</option>
                                <option value="1">First Class Honours</option>
                                <option value="2">Second Class Upper Honours</option>
                                <option value="3">Second Class lower Honours</option>
                                <option value="4">Third Class Honours</option>
                                <option value="5">Pass</option>
                                <option value="6">unclassified</option>
                                <option value="7">No Information</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Password (Optional)</label>
                            <input id="password" class="form-control" name="password" value="" type="password">
                        </div>
                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Email</label>
                            <input id="email" class="form-control" name="email" value="{{ $item->email }}"
                                type="email" required>
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Phone</label>
                            <input id="phone" class="form-control" name="phone" value="{{ $item->phone }}"
                                type="text" required>
                        </div>




                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" style="width:30%;">
                </form>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
