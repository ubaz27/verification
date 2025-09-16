<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.png') }}" style="width:60px;height:50px;" alt="">
        </a>

        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body" style="max-height: calc(100vh - 80px); overflow-y: auto; overflow-x: hidden;">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-lucide="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/change-password') }}" class="nav-link">
                    <i class="link-icon" data-lucide="key"></i>
                    <span class="link-title">Change Password</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/admins') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">Admins</span>
                </a>
            </li>

            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admin.executives.index') }}" class="nav-link">
                    <i class="link-icon" data-lucide="users"></i>
                    <span class="link-title">Executives</span>
                </a>
            </li> --}}
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                    <i class="link-icon" data-lucide="help-circle"></i>
                    <span class="link-title">FAQs</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admin.messages.index') }}" class="nav-link">
                    <i class="link-icon" data-lucide="message-circle"></i>
                    <span class="link-title">Messages</span>
                    @if (isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                        <span class="badge bg-danger ms-2">{{ $unreadMessagesCount }}</span>
                    @endif
                </a>
            </li>

            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admin.scholarships.index') }}" class="nav-link">
                    <i class="link-icon" data-lucide="graduation-cap"></i>
                    <span class="link-title">Scholarships</span>
                </a>
            </li> --}}



            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link">
                    <i class="link-icon" data-lucide="log-out"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>

            <li class="nav-item nav-category">Certificate</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/show-upload') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">Batch Upload</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/show-upload-single') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">Single Upload</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/show-list') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">Certificate List</span>
                </a>
            </li>

            {{-- <li class="nav-item nav-category">Applicants Data</li> --}}
            {{-- <li class="nav-item {{ active_class(['apps/chat']) }}">
                <a href="{{ url('/admin/show-applicants') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">List of Applicants</span>
                </a>
            </li> --}}
            <li class="nav-item nav-category">Report</li>
            <li class="nav-item {{ active_class(['apps/chat']) }}">
                <a href="{{ url('/admin/show-IDCard') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user-plus"></i>
                    <span class="link-title">Payment Report</span>
                </a>
            </li>



            {{-- staff record --}}
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/show-programme') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Programme Entry</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/show-batch-programmes') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Batch Programme Entry</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/charges') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Fees</span>
                </a>
            </li>

            {{-- <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/paper-list') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Category</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item nav-category">Alumni</li>


            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/paper-entry') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Alumni Profile Edit</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('admin/paper-list') }}" class="nav-link">
                    <i class="link-icon" data-lucide="file-plus"></i>
                    <span class="link-title">Papers</span>
                </a>
            </li> --}}



        </ul>
    </div>
</nav>
