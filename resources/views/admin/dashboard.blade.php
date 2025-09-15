@extends('admin.layout.master')
{{-- @extends('admin.asset.scripts') --}}

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            {{-- Welcome {{ Auth::admin()->name }} --}}
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Alumni</h6>

                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">


                                    <h3 class="mb-2">{{ $alumni_no }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            {{-- <span>+3.3%</span> --}}
                                            {{-- <i data-lucide="arrow-up" class="icon-sm mb-1"></i> --}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Chapters</h6>

                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    {{-- @foreach ($conferences as $item)
                                        <h3 class="mb-2">{{ $item->no }}</h3>
                                    @endforeach --}}
                                    <h3 class="mb-2">{{ 0 }}</h3>
                                    {{-- {{ $applicants }} --}}
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">

                                            {{-- <i data-lucide="arrow-down" class="mdi mdi-account"></i> --}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Payment</h6>
                                <div class="dropdown mb-2">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    {{-- @foreach ($workshops as $item)
                                        <h3 class="mb-2">{{ $item->no }}</h3>
                                    @endforeach --}}

                                    <h3 class="mb-2">{{ $payment_no }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">

                                            {{-- <i data-lucide="arrow-up" class="mdi mdi-crop-landscape"></i> --}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Unconfirmed Cases</h6>

                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    {{-- @foreach ($allocated_plot_no as $item) --}}
                                    <h3 class="mb-2">{{ $unconfirmed }}</h3>
                                    {{-- @endforeach --}}
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">

                                            {{-- <i data-lucide="arrow-up" class="icon-sm mb-1"></i> --}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <!-- Scholarship Statistics Row -->
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <!-- Total Scholarships Card Only -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Scholarships</h6>
                                <i data-lucide="graduation-cap" class="icon-sm text-primary"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $total_scholarships ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-primary">
                                            <a href="#" class="text-decoration-none small">Manage Scholarships</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Executives Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Executives</h6>
                                <i data-lucide="users" class="icon-sm text-success"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $total_executives ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <a href="" class="text-decoration-none small">Manage Executives</a>
                                        </p>
                                        <p class="text-muted ms-2">
                                            <small>{{ $active_executives ?? 0 }} active</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total FAQs Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total FAQs</h6>
                                <i data-lucide="help-circle" class="icon-sm text-info"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $total_faqs ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-info">
                                            <a href="{{ route('admin.faqs.index') }}"
                                                class="text-decoration-none small">Manage FAQs</a>
                                        </p>
                                        <p class="text-muted ms-2">
                                            <small>{{ $active_faqs ?? 0 }} active</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Messages Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Messages</h6>
                                <i data-lucide="message-circle" class="icon-sm text-primary"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $total_messages ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-primary">
                                            <a href="{{ route('admin.messages.index') }}"
                                                class="text-decoration-none small">Manage Messages</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unread Messages Card -->
                {{-- <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Unread Messages</h6>
                                <i data-lucide="mail" class="icon-sm text-danger"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 text-danger">{{ $unread_messages ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">
                                            <small>Need attention</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scholarship Inquiries Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Scholarship Inquiries</h6>
                                <i data-lucide="graduation-cap" class="icon-sm text-warning"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 text-warning">{{ $scholarship_messages ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-warning">
                                            <small>Scholarship support</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Messages Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Contact Messages</h6>
                                <i data-lucide="phone" class="icon-sm text-success"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 text-success">{{ $contact_messages ?? 0 }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <small>General inquiries</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div> <!-- row -->





    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">List Of Payment</h6>
                        {{-- <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-lucide="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-lucide="eye"
                                        class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-lucide="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-lucide="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-lucide="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-lucide="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th class="pt-0">S/N</th>
                                    <th class="pt-0">Reg No</th>
                                    <th class="pt-0">Name</th>
                                    <th class="pt-0">Category</th>
                                    <th class="pt-0">year</th>
                                    <th class="pt-0">Assign</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($available_plots as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->land_name }}</td>
                                        <td>{{ $item->plot_no }}</td>
                                        <td>{{ $item->dimension }}</td>
                                        <td>N {{ $item->Number }}</td>
                                        <td><a href="">Assign</a></td>

                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- row -->
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
