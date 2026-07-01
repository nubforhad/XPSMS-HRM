<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    const sidebar = document.getElementById('appSidebar');
    const mainArea = document.getElementById('appMain');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');

    function isMobile() {
        return window.innerWidth <= 991.98;
    }

    toggleBtn?.addEventListener('click', function () {
        if (isMobile()) {
            sidebar.classList.toggle('mobile-show');
            overlay.classList.toggle('active');
        } else {
            sidebar.classList.toggle('collapsed');
            mainArea.classList.toggle('expanded');
        }
    });

    overlay?.addEventListener('click', function () {
        sidebar.classList.remove('mobile-show');
        overlay.classList.remove('active');
    });

    // Screen resize হলে state reset
    window.addEventListener('resize', function () {
        if (!isMobile()) {
            sidebar.classList.remove('mobile-show');
            overlay.classList.remove('active');
        }
    });

    document.getElementById('fullscreenBtn')?.addEventListener('click', function () {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    window.confirmDelete = function (callback) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                callback();
            }
        });
    };
</script>

@stack('scripts')