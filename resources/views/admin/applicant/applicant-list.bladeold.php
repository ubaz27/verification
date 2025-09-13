@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}
@push('plugin-styles')
{{-- <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Applicants Page</h4>
    </div>

</div>

<h4 class="card-title">List</h4>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Applicants</a></li>
        <li class="breadcrumb-item active" aria-current="page">Information</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-header">

                <h5>Available Applicants</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <div id="buttons" class="d-flex justify-content-center"></div>
                    <table id="member_payments_datatable" class="cell-border stripe" style="width: 100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Name</th>

                                <th>Reg No</th>
                                <th>Programme</th>
                                <th>Year of G.</th>
                                <th>Verified</th>
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

<link href="{{ asset('assets/plugins/easy-autocomplete/easy-autocomplete.themes.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('assets/plugins/easy-autocomplete/easy-autocomplete.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/easy-autocomplete/jquery.easy-autocomplete.min.js') }}"></script>

@include('includes/datatable-scripts')
@endpush

@push('custom-scripts')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
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
                iDisplayLength: 10,
                ajax: {
                    type: 'POST',
                    url: "{{ route('admin.getApplicantsList') }}",
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
                        "width": "440px",
                        "targets": 1
                    },

                    {
                        "width": "440px",
                        "targets": 2
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
                        data: 'fullname'
                    },
                    {
                        data: 'regno'
                    }, {
                        data: 'programme'
                    }, {
                        data: 'year_graduation'
                    },
                    {
                        data: 'migrated_id'
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