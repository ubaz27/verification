@extends('admin.layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.showDashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">FAQ Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">View FAQ</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title">FAQ Details</h6>
                    <div>
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning btn-sm me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h6><strong>Category:</strong></h6>
                                        <p class="text-muted">{{ $faq->category }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><strong>Sort Order:</strong></h6>
                                        <p class="text-muted">{{ $faq->sort_order }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><strong>Status:</strong></h6>
                                        <span class="badge bg-{{ $faq->is_active ? 'success' : 'danger' }}">
                                            {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6><strong>Question:</strong></h6>
                                    <p class="text-muted">{{ $faq->question }}</p>
                                </div>

                                <div class="mb-4">
                                    <h6><strong>Answer:</strong></h6>
                                    <div class="text-muted">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <small class="text-muted">
                                            <strong>Created:</strong> {{ $faq->created_at->format('M d, Y h:i A') }}
                                        </small>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <small class="text-muted">
                                            <strong>Last Updated:</strong> {{ $faq->updated_at->format('M d, Y h:i A') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete FAQ
                            </button>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit FAQ
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i> Back to FAQ List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
