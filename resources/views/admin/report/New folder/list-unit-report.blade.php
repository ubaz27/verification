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
                <h4 class="card-title">Report By Unit and Paper Type</h4>
                <hr>

                <form id="report_form" action = "{{ route('admin.pdfRecordByPaperUnit') }}" Method = "POST" target="_blank">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-md-4">
                            <label for="ageSelect" class="form-label">Units</label> <span
                                class="text-danger">(required)</span>
                            <select class="js-example-basic-single form-select" name="category" id="category">
                                <option selected disabled>Select Unit</option>
                                @foreach ($units as $item)
                                    <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-4">
                            <label for="ageSelect" class="form-label">Paper Type</label> <span
                                class="text-danger">(required)</span>
                            <select class="js-example-basic-single form-select" name="papertype_id" id="papertype_id">
                                <option selected disabled>Select Paper Type</option>
                                @foreach ($papertypes as $item)
                                    <option value="{{ $item->id }}">{{ $item->papertype }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="ageSelect" class="form-label">Category</label> <span
                                class="text-danger">(required)</span>
                            <select class="js-example-basic-single form-select" name="category" id="category">
                                <option selected disabled>Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item }}">{{ $item }} Based</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" name="type" value="excel"
                                class="btn btn-outline-success float-right"><i class="fas fa-print"></i>
                                Generate Excel</button>

                            <button type="submit" name="type" value="pdf"
                                class="btn btn-outline-danger float-right mr-2"><i class="fas fa-print"></i>
                                Generate PDF</button>
                        </div>
                    </div>
                </form>

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

            // //get faculties from universities
            // $("#university_id").change(function() {
            //     $("#faculty_id").empty();
            //     var university_id = $("#university_id").val();
            //     $.ajax({
            //         method: 'POST',
            //         url: "{{ route('admin.fetchFaculties') }}",
            //         data: {
            //             'university_id': university_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             $('#faculty_id').append(
            //                 '<option value="">-- Select Faculty --</option>');
            //             response.faculties.forEach(faculties =>
            //                 $('#faculty_id').append("<option value='" +
            //                     faculties.id + "'" + ">" + faculties.faculty + "</option>")
            //             )
            //         },
            //         error: function(jqXHR, textStatus,
            //             errorThrown) {
            //             console.log(JSON.stringify(jqXHR));
            //             console.log("AJAX error: " + textStatus + ' : ' +
            //                 errorThrown);
            //         }
            //     });
            // });




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
                        url: "{{ route('admin.getUnitList') }}",
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
                            "width": "350px",
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
                            data: 'unit_name'
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
