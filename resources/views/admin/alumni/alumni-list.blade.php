@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Alumni List Form</h4>
        </div>

    </div>



    <h4 class="card-title">User Information</h4>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Information</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div></div>
                    <h6 class="card-title">Available Users</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>certificate_no</th>
                                    <th>Fullname</th>
                                    <th>Programme</th>
                                    <th>Year of Graduating</th>
                                    <th>Organization</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 1;
                                @endphp

                                @foreach ($students as $item)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $item->certificate_no }}</td>
                                        <td> {{ $item->fullname }}</td>
                                        <td> {{ $item->programme }}</td>
                                        <td> {{ $item->year }}</td>
                                        <td> {{ $item->organization }}</td>
                                        {{-- <td> {{ $item->is_active == 1 ? 'Active' : 'Not Active' }}</td> --}}

                                        <td>
                                            <form action="{{ route('admin.editAdmin') }}" method="POST">
                                                @csrf
                                                <input type="text" hidden readonly value="{{ $item->id }}"
                                                    class="form-control" name="user_id">
                                                <input type="submit" value = 'Edit' class = 'btn btn-primary'>
                                            </form>
                                        </td>

                                    </tr>
                                    {{-- {{  }} --}}
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
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
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
