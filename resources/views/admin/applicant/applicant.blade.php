@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Alumni Upload Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Alumni Details</h4>
                <hr>
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('admin.uploadAlumni') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <div class="col-md-7 ">
                            <label for="ageSelect" class="form-label">File (Excel)</label> <span
                                class="text-danger">(*)</span>
                            {{-- <div class="input-group" style="width: 100%;"> --}}
                            <div class="custom-file2">
                                <input type="file" class="form-control" name="alumni_file" id="alumni_file">
                                <label class="custom-file-label" for="MembersFile">Choose file</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="confirm_password" class="form-label">Program</label>
                            <select name="programme_id" id="" class="form-control">
                                <option value="Select">---Select Programme---</option>
                                @foreach ($programmes as $item)
                                    <option value="{{ $item->id }}">{{ $item->programme }}</option>
                                @endforeach
                            </select>
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
