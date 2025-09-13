<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/verification/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-lucide="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/verification/profile') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user"></i>
                    <span class="link-title">Profile</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/verification/verify') }}" class="nav-link">
                    <i class="link-icon" data-lucide="user"></i>
                    <span class="link-title">Verify</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/member/professional') }}" class="nav-link">
                    <i class="link-icon" data-lucide="shield"></i>
                    <span class="link-title">Professional</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/member/skill') }}" class="nav-link">
                    <i class="link-icon" data-lucide="box"></i>
                    <span class="link-title">Skills</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/member/social') }}" class="nav-link">
                    <i class="link-icon" data-lucide="hand-heart"></i>
                    <span class="link-title">Social</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/member/idcard') }}" class="nav-link">
                    <i class="link-icon" data-lucide="graduation-cap"></i>
                    <span class="link-title">ID Card</span>
                </a>

            </li> --}}
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/member/change-password') }}" class="nav-link">
                    <i class="link-icon" data-lucide="key"></i>
                    <span class="link-title">Change Password</span>
                </a>

            </li>

            {{-- <li class="nav-item nav-category">Payment</li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/member/payment') }}" class="nav-link">
                    <i class="link-icon" data-lucide="wallet"></i>
                    <span class="link-title">Payment</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/member/make/payment') }}" class="nav-link">
                    <i class="link-icon" data-lucide="wallet"></i>
                    <span class="link-title">Make Payment</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/member/payment/history') }}" class="nav-link">
                    <i class="link-icon" data-lucide="calendar"></i>
                    <span class="link-title">Payment History</span>
                </a>
            </li> --}}

            <li class="nav-item nav-category">Events/News</li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/member/events') }}" class="nav-link">
                    <i class="link-icon" data-lucide="calendar"></i>
                    <span class="link-title">Events</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/member/news') }}" class="nav-link">
                    <i class="link-icon" data-lucide="megaphone"></i>
                    <span class="link-title">News</span>
                </a>
            </li>



            <li class="nav-item nav-category">Logout</li>
            <li class="nav-item">
                <a href="{{ route('member.logout') }}" class="nav-link">
                    <i class="link-icon" data-lucide="log-out"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>





        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-lucide="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                        value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                        value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>

    </div>
</nav>
