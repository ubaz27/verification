@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Alumni ID Card Page</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ID Card Page</h4>
                <hr>
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('admin.generateIDList') }}" method="POST">
                    @csrf
                    <div class="row">



                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Starting Date</label>

                            <select name="sdate" class="form-control" id="">
                                <option>--Select Date--</option>
                                @foreach ($dates as $item)
                                    <option>{{ $item->date_processed }}</option>
                                @endforeach
                            </select>



                        </div>
                        <div class="col-md-3 ">
                            <label for="name" class="form-label">Ending Date</label>
                            <select name="edate" class="form-control" id="">
                                <option>--Select Date--</option>
                                @foreach ($dates as $item)
                                    <option>{{ $item->date_processed }}</option>
                                @endforeach
                            </select>

                        </div>

                        {{-- <div class="col-md-12">
                            <label for="confirm_password" class="form-label">Program</label>
                            <select name="programme_id" id="" class="form-control">
                                <option value="Select">---Select Programme---</option>
                                @foreach ($programmes as $item)
                                    <option value="{{ $item->id }}">{{ $item->programme }}</option>
                                @endforeach
                            </select>
                        </div> --}}


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
