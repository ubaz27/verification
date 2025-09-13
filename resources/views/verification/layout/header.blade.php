<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-lucide="menu"></i>
    </a>
    <div class="navbar-content">
        <a href="#" class="noble-ui-logo d-block mb-2" style='margin-top:10px;font-size:150%;'>

            {{ env('APP_NAME') }}
            <span>Verification
            </span>System</a>
        <ul class="navbar-nav">
            @php
                $passport = Auth::guard('verification')->user()->passport;
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ url('img/passport/' . $passport) }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}"
                                alt="">
                        </div>
                        <div class="text-center">
                            @php
                                $phone = Auth::guard('verification')->user()->phone;
                                $fullname = Auth::guard('verification')->user()->fullname;

                                echo "  <p class='tx-16 fw-bolder'>$fullname</p>";

                            @endphp


                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ url('/member/profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ url('/member/profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>

                        <li class="dropdown-item py-2">
                            <a href="{{ route('member.logout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
