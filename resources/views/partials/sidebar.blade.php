<div class="sidebar-wrapper">

    <div class="sidebar-logo text-center py-3 border-bottom border-secondary">
        <h4 class="text-white m-0">
            <i class="bi bi-speedometer2"></i> XPSMS
        </h4>
        <small class="text-muted">HRM ERP</small>
    </div>

    <ul class="sidebar-menu list-unstyled mt-3">
        <li>
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="text-secondary">
        <li class="menu-title text-white px-3 mt-2">HR MANAGEMENT</li>

        <li><a href="{{ route('company.index') }}" class="sidebar-link"><i class="bi bi-building"></i><span>Company</span></a></li>
        <li><a href="{{ route('branch.index') }}" class="sidebar-link"><i class="bi bi-diagram-3"></i><span>Branch</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-collection"></i><span>Department</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-person-badge"></i><span>Designation</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-people"></i><span>Employee</span></a></li>

        <hr class="text-secondary">
        <li class="menu-title text-white px-3 mt-2">ATTENDANCE</li>

        <li><a href="#" class="sidebar-link"><i class="bi bi-fingerprint"></i><span>Attendance</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-clock"></i><span>Shift</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-cpu"></i><span>Device</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-calendar-check"></i><span>Leave</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-calendar-event"></i><span>Holiday</span></a></li>

        <hr class="text-secondary">
        <li class="menu-title text-white px-3 mt-2">REPORTS</li>

        <li><a href="#" class="sidebar-link"><i class="bi bi-bar-chart"></i><span>Daily Report</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-calendar2-month"></i><span>Monthly Report</span></a></li>
        <li><a href="#" class="sidebar-link"><i class="bi bi-exclamation-triangle"></i><span>Late Report</span></a></li>

        <hr class="text-secondary">

        <li><a href="#" class="sidebar-link"><i class="bi bi-gear"></i><span>Settings</span></a></li>
        <li>
            <a href="#" class="sidebar-link text-danger logout-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>