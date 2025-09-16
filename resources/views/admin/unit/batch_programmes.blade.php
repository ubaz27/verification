@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}
@push('plugin-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Programmes Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Programmes Page</h4>
                <hr>

                <form id="faculty_form" action="{{ route('admin.saveBatchProgramme') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 ">
                            <label for="name" class="form-label">Programme Name</label> (<span
                                class="text-danger">required</span>)

                            <textarea class="form-control" name="programmes" id="" cols="30" rows="10" required></textarea>

                        </div>
                        <div class="col-md-6 ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label for="name" class="form-label">Department Name</label> (<span
                                        class="text-danger">required</span>)

                                    <select name="department_id" id="department_id" class="form-control">
                                        <option value="Select">--Select Department--</option>
                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->department }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>


                    </div>

                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" style="width:30%;">
                </form>

            </div>
        </div>
    </div>



    <h4 class="card-title">Programmes List</h4>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Programmes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Information</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-header">

                    <h5>Available Programmes</h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <div id="buttons" class="d-flex justify-content-center"></div>
                        <table id="member_payments_datatable" class="data-table cell-border stripe" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Programmes</th>
                                    <th>Departments</th>

                                    <th>Edit</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <link href="{{ asset('assets/plugins/easy-autocomplete/easy-autocomplete.themes.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/easy-autocomplete/easy-autocomplete.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/easy-autocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    @include('includes/datatable-scripts')
@endpush

@push('custom-scripts')
    <script>
        $(document).ready(function() {

            ///get list of land for a member

            $(function() {
                gb_DataTable = $(".data-table").DataTable({
                    autoWidth: false,
                    order: [0, "ASC"],
                    processing: true,
                    serverSide: true,
                    searchDelay: 2000,
                    paging: true,
                    ajax: "{{ route('admin.getProgrammeList') }}",
                    iDisplayLength: "10",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'programme',
                            name: 'programme'
                        },
                        {
                            data: 'department',
                            name: 'department'
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    lengthMenu: [10, 25, 50, 100]
                });
            });
        });
    </script>
@endpush

@section('scripts')
@endsection

@section('scripts_after')
@endsection
