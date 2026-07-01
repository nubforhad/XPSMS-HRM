<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>@yield('title', 'XPSMS HRM ERP')</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

@stack('styles')

<style>
    * { box-sizing: border-box; }

    body {
        font-family: 'Inter', sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    .app-container {
        display: flex;
        min-height: 100vh;
    }

    /* ---------- Sidebar ---------- */
    .app-sidebar {
        width: 260px;
        min-width: 260px;
        background: #1e293b;
        color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        overflow-y: auto;
        z-index: 1030;
        transition: transform 0.3s ease;
    }

    .app-sidebar::-webkit-scrollbar { width: 5px; }
    .app-sidebar::-webkit-scrollbar-thumb {
        background: #334155;
        border-radius: 10px;
    }

    /* Collapsed (desktop: hide sidebar, expand content) */
    .app-sidebar.collapsed {
        transform: translateX(-260px);
    }

    /* ---------- Main ---------- */
    .app-main {
        margin-left: 260px;
        width: calc(100% - 260px);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        transition: margin-left 0.3s ease, width 0.3s ease;
    }

    .app-main.expanded {
        margin-left: 0;
        width: 100%;
    }

    .app-header {
        background: #ffffff;
        padding: 10px 20px;
        border-bottom: 1px solid #e5e7eb;
        position: sticky;
        top: 0;
        z-index: 1020;
    }

    .app-content {
        flex: 1;
        padding: 20px;
    }

    .app-footer {
        background: #ffffff;
        padding: 10px 20px;
        border-top: 1px solid #e5e7eb;
        text-align: center;
        font-size: 13px;
        color: #6b7280;
    }

    /* ---------- Mobile overlay ---------- */
    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 1025;
    }

    .sidebar-overlay.active {
        display: block;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 991.98px) {
        .app-sidebar {
            transform: translateX(-260px);
        }

        .app-sidebar.mobile-show {
            transform: translateX(0);
        }

        .app-main {
            margin-left: 0;
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .app-content {
            padding: 12px;
        }

        .app-header {
            padding: 10px 12px;
        }
    }
</style>