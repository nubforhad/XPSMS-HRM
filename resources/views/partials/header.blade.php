<div class="d-flex justify-content-between align-items-center w-100">

    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light btn-sm" id="sidebarToggle">
            <i class="bi bi-list fs-5"></i>
        </button>

        <div class="position-relative d-none d-md-block">
            <input type="text" class="form-control form-control-sm ps-4" placeholder="Search...">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light btn-sm d-none d-md-inline-block" id="fullscreenBtn">
            <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <div class="dropdown">
            <button class="btn btn-light btn-sm position-relative" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item" href="#">New Employee Added</a></li>
                <li><a class="dropdown-item" href="#">Attendance Sync Done</a></li>
                <li><a class="dropdown-item" href="#">System Update</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-light btn-sm d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/images/user.png') }}" alt="user" width="30" height="30" class="rounded-circle">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>