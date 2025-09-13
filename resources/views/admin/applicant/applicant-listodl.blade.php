@extends('admin.layout.master')
@php
    use Illuminate\Support\Facades\URL;
@endphp
{{-- @extends('admin.asset.scripts') --}}
@push('plugin-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                        <table id="dataTableExample" class="table">
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

                            @php
                                $i = 1;
                            @endphp

                            @foreach ($data as $item)
                                <tr>

                                    <td> {{ $i }} </td>

                                    <td> {{ $item->fullname }}</td>
                                    <td> {{ $item->regno }}</td>
                                    <td> {{ $item->programme }}</td>
                                    <td> {{ $item->year_graduation }}</td>
                                    <td> {{ $item->migrated_id == 1 ? 'Yes' : 'No' }}</td>
                                    {{-- <td> {{ $item->is_active == 1 ? 'Active' : 'Not Active' }}</td> --}}
                                    <td> <a href="{{ Url::signedRoute('admin.showApplicantEdit', ['id' => $item->id]) }}"
                                            class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>
                                    </td>

                                    @php
                                        $i++;
                                    @endphp
                            @endforeach

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
    <link href="{{ asset('assets/plugins/easy-autocomplete/easy-autocomplete.min.css') }}" rel="stylesheet"
        type="text/css">
    <script src="{{ asset('assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/easy-autocomplete/jquery.easy-autocomplete.min.js') }}"></script>

    @include('includes/datatable-scripts')
@endpush

@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script type="text/javascript"></script>
@endpush

@section('scripts')
@endsection

@section('scripts_after')
@endsection
