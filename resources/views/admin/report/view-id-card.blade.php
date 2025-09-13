@extends('admin.layout.master2')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">


    </div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div style="margin:15px 15px 15px" style="color:green">
                <h4 class="mb-3 mb-md-0">Welcome to Alumni ID Card Page</h4>
            </div>
            <div class="card-body">

                <h4 class="card-title">View ID Card Page</h4>
                <hr>
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}

                @foreach ($data as $item)
                    <p>
                    <div>
                        <img src="{{ asset('img/alumni.jpeg') }}" alt="" style="width:130px;height:130px">
                    </div>
                    <b> <label>Name:</label></b> {{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}
                    <br>
                    <b> <label>Programme:</label></b> {{ $item->programme }}
                    </p>
                @endforeach
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
