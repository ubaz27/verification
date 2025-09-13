@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Message Details</h4>
    </div>
    <div>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
            <i data-lucide="arrow-left"></i> Back to Messages
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">Message Content</h6>
                    <div>
                        @if($message->status === 'unread')
                            <span class="badge bg-danger">Unread</span>
                        @elseif($message->status === 'read')
                            <span class="badge bg-info">Read</span>
                        @else
                            <span class="badge bg-success">Replied</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="mb-2">{{ $message->subject }}</h5>
                    <div class="text-muted small mb-3">
                        Received on {{ $message->formatted_created_at }}
                    </div>
                </div>

                <div class="message-content">
                    <div class="border rounded p-3 bg-light">
                        {!! nl2br(e($message->message)) !!}
                    </div>
                </div>

                <div class="mt-4">
                    <div class="d-flex gap-2">
                        @if($message->status !== 'replied')
                            <button type="button" class="btn btn-success" id="mark-replied">
                                <i data-lucide="reply"></i> Mark as Replied
                            </button>
                        @endif

                        @if($message->status === 'unread')
                            <button type="button" class="btn btn-warning" id="mark-read">
                                <i data-lucide="check"></i> Mark as Read
                            </button>
                        @endif

                        @if($message->status === 'read' || $message->status === 'replied')
                            <button type="button" class="btn btn-secondary" id="mark-unread">
                                <i data-lucide="undo"></i> Mark as Unread
                            </button>
                        @endif

                        <button type="button" class="btn btn-danger" id="delete-message">
                            <i data-lucide="trash-2"></i> Delete Message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Sender Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name:</label>
                    <p class="mb-0">{{ $message->full_name }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address:</label>
                    <p class="mb-0">
                        <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                            {{ $message->email }}
                        </a>
                    </p>
                </div>

                @if($message->phone)
                <div class="mb-3">
                    <label class="form-label fw-bold">Phone Number:</label>
                    <p class="mb-0">
                        <a href="tel:{{ $message->phone }}" class="text-decoration-none">
                            {{ $message->phone }}
                        </a>
                    </p>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Subject Category:</label>
                    <p class="mb-0">{{ ucfirst($message->subject) }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Inquiry Type:</label>
                    <p class="mb-0">{{ ucfirst($message->inquiry_type ?? $message->subject) }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Message Source:</label>
                    <p class="mb-0">
                        @if($message->source === 'scholarship')
                            <span class="badge bg-warning">Scholarship Inquiry</span>
                        @else
                            <span class="badge bg-primary">Contact Form</span>
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Communications Agreement:</label>
                    <p class="mb-0">
                        @if($message->agree_communications)
                            <span class="text-success">
                                <i data-lucide="check-circle"></i> Agreed to receive communications
                            </span>
                        @else
                            <span class="text-muted">
                                <i data-lucide="x-circle"></i> Did not agree to communications
                            </span>
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Message Status:</label>
                    <p class="mb-0">
                        @if($message->status === 'unread')
                            <span class="badge bg-danger">Unread</span>
                        @elseif($message->status === 'read')
                            <span class="badge bg-info">Read</span>
                        @else
                            <span class="badge bg-success">Replied</span>
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Received:</label>
                    <p class="mb-0 small text-muted">{{ $message->formatted_created_at }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    @php
                        $emailBody = $message->source === 'scholarship'
                            ? "Dear " . $message->full_name . ",%0D%0A%0D%0AThank you for your scholarship inquiry with BUK Alumni Association. Our scholarship counselors have reviewed your request regarding: " . $message->inquiry_type . ".%0D%0A%0D%0AWe will get back to you with relevant information and guidance.%0D%0A%0D%0ABest regards,%0D%0ABUK Alumni Association Scholarship Team"
                            : "Dear " . $message->full_name . ",%0D%0A%0D%0AThank you for contacting BUK Alumni Association. We have received your message and will respond shortly.%0D%0A%0D%0ABest regards,%0D%0ABUK Alumni Association";
                    @endphp

                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}&body={{ $emailBody }}"
                       class="btn btn-primary btn-sm">
                        <i data-lucide="mail"></i> Reply via Email
                    </a>

                    @if($message->phone)
                    <a href="tel:{{ $message->phone }}" class="btn btn-success btn-sm">
                        <i data-lucide="phone"></i> Call {{ $message->full_name }}
                    </a>
                    @endif

                    @if($message->phone)
                    @php
                        $whatsappMessage = $message->source === 'scholarship'
                            ? "Hello " . $message->full_name . ", thank you for your scholarship inquiry with BUK Alumni Association. Our scholarship counselors will assist you with: " . $message->inquiry_type
                            : "Hello " . $message->full_name . ", thank you for contacting BUK Alumni Association.";
                    @endphp
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}?text={{ urlencode($whatsappMessage) }}"
                       class="btn btn-success btn-sm" target="_blank">
                        <i data-lucide="message-circle"></i> WhatsApp
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$(document).ready(function() {
    $('#mark-read').click(function() {
        updateStatus('read');
    });

    $('#mark-unread').click(function() {
        updateStatus('unread');
    });

    $('#mark-replied').click(function() {
        updateStatus('replied');
    });

    $('#delete-message').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteMessage();
            }
        });
    });

    function updateStatus(status) {
        $.ajax({
            url: "{{ route('admin.messages.update-status', $message->id) }}",
            type: 'PATCH',
            data: {
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success').then(() => {
                        location.reload();
                    });
                }
            },
            error: function() {
                Swal.fire('Error', 'Something went wrong', 'error');
            }
        });
    }

    function deleteMessage() {
        $.ajax({
            url: "{{ route('admin.messages.destroy', $message->id) }}",
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success').then(() => {
                        window.location.href = "{{ route('admin.messages.index') }}";
                    });
                }
            },
            error: function() {
                Swal.fire('Error', 'Something went wrong', 'error');
            }
        });
    }
});
</script>
@endpush
