@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Unit Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Faculty Page</h4>
                <hr>

                <form id="faculty_form" action="{{ route('admin.saveFaculty') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 ">
                            <label for="name" class="form-label">Faculty Name</label> (<span
                                class="text-danger">required</span>)

                            <input type="text" class="form-control" id="faculty" name="faculty"
                                value="{{ old('faculty') }}" placeholder="Provide Faculty Name" required>
                        </div>

                    </div>

                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" style="width:30%;">
                </form>

            </div>
        </div>
    </div>



    <h4 class="card-title">Unit List</h4>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Information</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-header">

                    <h5>Available Units</h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <div id="buttons" class="d-flex justify-content-center"></div>
                        <table id="member_payments_datatable" class="cell-border stripe" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th style="witdth:90%;">Faculty</th>


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
    {{-- <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script> --}}

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

            loadMemberPayments();

            function loadMemberPayments() {
                var table = $('#member_payments_datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    "bDestroy": true,
                    "autoWidth": false,
                    aLengthMenu: [
                        [10, 25, 50, -1],
                        [10, 15, 25, "All"]
                    ],
                    iDisplayLength: -1,
                    ajax: {
                        type: 'POST',
                        url: "{{ route('admin.getFacultyList') }}",
                        data: {
                            // 'filter': filter,
                        },
                    },
                    columnDefs: [{
                            className: 'text-center',
                            targets: [0]
                        },
                        {
                            className: 'dt-body-right',
                            targets: [0]
                        },
                        {
                            "width": "880px",
                            "targets": 1
                        },
                        {
                            "width": "20px",
                            "targets": 0
                        },
                    ],
                    columns: [{
                            data: 'DT_RowIndex'
                        },
                        {
                            data: 'faculty'
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    "drawCallback": function(settings) {
                        lucide.createIcons();
                    }
                });

                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                }).container().appendTo($('#buttons'));
            }
        });
    </script>
@endpush

@section('scripts')
@endsection

@section('scripts_after')
@endsection
