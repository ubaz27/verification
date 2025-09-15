@extends('verification.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
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
                        <form id="signupForm" action="{{ route('verification.searchCertificateNo') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-6">
                                    <label for="ageSelect" class="form-label">Certificate No</label> <span
                                        class = "text-danger">*</span>
                                    <input type="text" name="certificate_no" class="form-control" id="certificate_no"
                                        required>

                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Search" style="width:30%;">
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <h4 class="card-title">Batch List</h4>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Batch</a></li>
            <li class="breadcrumb-item active" aria-current="page">Information</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-header">

                    <h5>Available Batch</h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <div id="buttons" class="d-flex justify-content-center"></div>
                        <table id="member_payments_datatable" class="cell-border stripe" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Certificate</th>
                                    <th>Date</th>
                                    <th>Action</th>
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
                        [10, 25, 50, 100, 200, 500, 1000, -1],
                        [10, 25, 50, 100, 200, 500, 1000, "All"]
                    ],
                    iDisplayLength: -1,
                    ajax: {
                        type: 'POST',
                        url: "{{ route('verification.getInvoiceList') }}",
                        data: {
                            'id': 3,
                        },
                    },
                    columnDefs: [{
                            className: 'text-left',
                            targets: [1, 2]
                        },
                        {
                            className: 'dt-body-right',
                            targets: [0]
                        },
                        {
                            "width": "250px",
                            "targets": 2
                        },

                        {
                            "width": "50px",
                            "targets": 4
                        }, {
                            "width": "20px",
                            "targets": 0
                        },
                    ],
                    columns: [{
                            data: 'DT_RowIndex'
                        },
                        {
                            data: 'fullname'
                        },
                        {
                            data: 'programme'
                        },
                        {
                            data: 'certificate_no'
                        },

                        {
                            data: 'month'
                        },
                        {
                            data: 'action'
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
