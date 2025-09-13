@extends('admin.layout.master')

@push('plugin-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.showDashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">FAQ Management</li>
    </ol>
</nav>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- FAQ Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total FAQs</h6>
                    <i data-lucide="help-circle" class="icon-sm text-primary"></i>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $total_faqs ?? 0 }}</h3>
                        <div class="d-flex align-items-baseline">
                            <p class="text-primary">
                                <small>All time total</small>
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
                    <h6 class="card-title mb-0">Active FAQs</h6>
                    <i data-lucide="check-circle" class="icon-sm text-success"></i>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-success">{{ $active_faqs ?? 0 }}</h3>
                        <div class="d-flex align-items-baseline">
                            <p class="text-success">
                                <small>Currently published</small>
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
                    <h6 class="card-title mb-0">Inactive FAQs</h6>
                    <i data-lucide="x-circle" class="icon-sm text-danger"></i>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-danger">{{ $inactive_faqs ?? 0 }}</h3>
                        <div class="d-flex align-items-baseline">
                            <p class="text-muted">
                                <small>Unpublished</small>
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
                    <h6 class="card-title mb-0">Categories</h6>
                    <i data-lucide="tag" class="icon-sm text-info"></i>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-info">{{ $total_categories ?? 0 }}</h3>
                        <div class="d-flex align-items-baseline">
                            <p class="text-info">
                                <small>Unique categories</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Summary (if categories exist) -->
{{-- @if(!empty($categories) && count($categories) > 0)
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-3">FAQ Categories</h6>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <span class="badge bg-primary">{{ $category }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title">FAQ Management</h6>
                    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New FAQ
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="faqTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $index => $faq)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $faq->category }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($faq->question, 30) }}</td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 20) }}</td>

                                <td>
                                    <span class="badge bg-{{ $faq->is_active ? 'success' : 'danger' }}">
                                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.faqs.show', $faq->id) }}" class="btn btn-info btn-sm me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No FAQs found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$(document).ready(function() {
    console.log('FAQ Management script loaded');

    // Initialize basic DataTable for sorting and searching
    try {
        $('#faqTable').DataTable({
            "order": [[ 0, "asc" ]], // Sort by first column (index)
            "pageLength": 25,
            "responsive": true
        });
        console.log('DataTable initialized successfully');
    } catch (e) {
        console.error('DataTable initialization failed:', e);
    }
});
</script>
@endpush
