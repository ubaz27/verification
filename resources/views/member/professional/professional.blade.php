@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Professional Form</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Professional Details</h4>
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
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('member.saveProfessional') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="margin-top:5px;">


                                    <table class="table table-stripe" id="table_field" style="width: 99%;">
                                        <thead>
                                            <tr>
                                                <td>S/N</td>
                                                <td>Organization</td>
                                                <td>Position</td>
                                                <td>Start Date</td>
                                                <td>End Date</td>
                                                <td>Current</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" class="form-control" value=""
                                                        name="organization[]" id=""></td>
                                                <td><input type="text" class="form-control" value=""
                                                        name="position[]" id=""></td>
                                                <td><input type="date" class="form-control" value="" name="sdate[]"
                                                        id=""></td>
                                                <td><input type="date" class="form-control" value="" name="edate[]"
                                                        id=""></td>
                                                <td><input type="radio" name="current[]" value="Yes" id="current">
                                                </td>
                                                <td><a href="#" title="Edit" id = "add"
                                                        class="btn btn-primary btn-sm"><i class='link-icon'
                                                            data-lucide='plus-circle'></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Update" style="width:20%;">
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Completed Applicants</h6>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="member_payments_datatable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Organization</th>
                                    <th>Position</th>
                                    <th>Start</th>
                                    <th>End Date</th>
                                    <th>Current</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($available_plots as $item) --}}
                                {{-- <tr>
                                    <td>af</td>
                                    <td>dfsf</td>
                                    <td>afds</td>
                                    <td>asdf</td>
                                    <td>N fasdf</td>
                                    <td>N fasdf</td>
                                    <td><a href="">Assign</a></td>

                                </tr> --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>

                        {{-- {{ $account_names }} --}}
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- row -->
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {



            var x = 1;
            var i = 2;

            // var max = 15;

            //add button
            $("#add").click(function() {
                // alert("OK");
                javascript = "onch"
                var html = '<tr><td><label for="">' + i +
                    '</label></td><td><input type="text" class="form-control" name="organization[]" id="organization' +
                    i +
                    '"></td><td><input type="text" class="form-control" name="position[]" id="position' +
                    i +
                    '"></td><td><input type="date" class="form-control" name="sdate[]" id="sdate' +
                    i +
                    '"></td><td><input type="date" class="form-control" name="edate[]" id="edate' +
                    i +
                    '"></td><td><input type="radio" name="current[]" id="current' +
                    i +
                    '" ></td><td><input class="btn btn-danger btn-sm" type="button" name="remove" id="remove" value="Remove" ></td></tr>';

                $("#table_field").append(html);
                ++x;
                ++i;


            });

            //remove button
            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                --x;
                --i;
            });

            //







            //submitting data to database


        });

        //get unit price for each dropdown box from serial no 2



        //get subtotal from quantities or discount
        // i= x;
    </script>
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/chartsjs.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/chartsjs.js') }}"></script> --}}
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // loadMemberPayments();

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
                        url: "{{ route('member.getProfessionals') }}",
                        data: {
                            // 'filter': filter,
                        },
                    },
                    columnDefs: [{
                            className: 'text-center',
                            targets: [2, 4, 4, 5]
                        },
                        {
                            className: 'dt-body-right',
                            targets: [0]
                        },
                        {
                            "width": "80px",
                            "targets": 5
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
                            data: 'organization'
                        },
                        {
                            data: 'position'
                        },
                        {
                            data: 'sdate'
                        },

                        {
                            data: 'edate',

                        },
                        {
                            data: 'current',

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
