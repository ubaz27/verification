@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Contact Messages</h4>
    </div>
</div>

<!-- Statistics Row -->
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Total Messages</h6>
                            <i data-lucide="message-circle" class="icon-sm text-primary"></i>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $totalMessages }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-primary">
                                        <span class="small">All messages</span>
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
                            <h6 class="card-title mb-0">Unread Messages</h6>
                            <i data-lucide="mail" class="icon-sm text-danger"></i>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2 text-danger">{{ $unreadMessages }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-danger">
                                        <span class="small">Need attention</span>
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
                            <h6 class="card-title mb-0">Read Messages</h6>
                            <i data-lucide="mail-open" class="icon-sm text-info"></i>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2 text-info">{{ $readMessages }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-info">
                                        <span class="small">Read but not replied</span>
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
                            <h6 class="card-title mb-0">Replied Messages</h6>
                            <i data-lucide="check-circle" class="icon-sm text-success"></i>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2 text-success">{{ $repliedMessages }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span class="small">Completed</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Messages Table -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">All Messages</h6>
                    <div>
                        <button type="button" class="btn btn-sm btn-warning" id="bulk-read-btn" disabled>
                            <i data-lucide="check"></i> Mark as Read
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" id="bulk-unread-btn" disabled>
                            <i data-lucide="undo"></i> Mark as Unread
                        </button>
                        <button type="button" class="btn btn-sm btn-success" id="bulk-replied-btn" disabled>
                            <i data-lucide="reply"></i> Mark as Replied
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" id="bulk-delete-btn" disabled>
                            <i data-lucide="trash-2"></i> Delete Selected
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="messages-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Source</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#messages-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.messages.data') }}",
        columns: [
            {
                data: 'id',
                name: 'id',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return '<input type="checkbox" class="message-checkbox" value="' + data + '">';
                }
            },
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            {data: 'subject', name: 'subject'},
            {data: 'source_badge', name: 'source'},
            {data: 'status_badge', name: 'status'},
            {data: 'formatted_date', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[6, 'desc']],
        pageLength: 25
    });

    // Select All functionality
    $('#select-all').change(function() {
        $('.message-checkbox').prop('checked', this.checked);
        toggleBulkButtons();
    });

    // Individual checkbox change
    $(document).on('change', '.message-checkbox', function() {
        toggleBulkButtons();

        var allChecked = $('.message-checkbox:checked').length === $('.message-checkbox').length;
        $('#select-all').prop('checked', allChecked);
    });

    function toggleBulkButtons() {
        var checkedCount = $('.message-checkbox:checked').length;
        $('#bulk-read-btn, #bulk-unread-btn, #bulk-replied-btn, #bulk-delete-btn').prop('disabled', checkedCount === 0);
    }

    // Bulk actions
    $('#bulk-read-btn').click(function() {
        bulkAction('read');
    });

    $('#bulk-unread-btn').click(function() {
        bulkAction('unread');
    });

    $('#bulk-replied-btn').click(function() {
        bulkAction('replied');
    });

    $('#bulk-delete-btn').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                bulkAction('delete');
            }
        });
    });

    function bulkAction(action) {
        var messageIds = [];
        $('.message-checkbox:checked').each(function() {
            messageIds.push($(this).val());
        });

        if (messageIds.length === 0) {
            Swal.fire('Warning', 'Please select at least one message', 'warning');
            return;
        }

        $.ajax({
            url: "{{ route('admin.messages.bulk-action') }}",
            type: 'POST',
            data: {
                action: action,
                message_ids: messageIds,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success');
                    table.ajax.reload();
                    $('#select-all').prop('checked', false);
                    toggleBulkButtons();
                }
            },
            error: function() {
                Swal.fire('Error', 'Something went wrong', 'error');
            }
        });
    }

    // Individual actions
    $(document).on('click', '.mark-as-read', function() {
        var messageId = $(this).data('id');
        updateStatus(messageId, 'read');
    });

    $(document).on('click', '.mark-as-unread', function() {
        var messageId = $(this).data('id');
        updateStatus(messageId, 'unread');
    });

    $(document).on('click', '.mark-as-replied', function() {
        var messageId = $(this).data('id');
        updateStatus(messageId, 'replied');
    });

    $(document).on('click', '.delete-message', function() {
        var messageId = $(this).data('id');

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
                deleteMessage(messageId);
            }
        });
    });

    function updateStatus(messageId, status) {
        $.ajax({
            url: "{{ url('admin/messages') }}/" + messageId + "/status",
            type: 'PATCH',
            data: {
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success');
                    table.ajax.reload();
                }
            },
            error: function() {
                Swal.fire('Error', 'Something went wrong', 'error');
            }
        });
    }

    function deleteMessage(messageId) {
        $.ajax({
            url: "{{ url('admin/messages') }}/" + messageId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success');
                    table.ajax.reload();
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
