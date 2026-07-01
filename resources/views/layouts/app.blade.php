<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

    <div id="preloader" style="display:none;">
        Loading...
    </div>

    <div class="app-container">

        {{-- Mobile overlay --}}
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <aside class="app-sidebar" id="appSidebar">
            @include('partials.sidebar')
        </aside>

        <div class="app-main" id="appMain">

            <header class="app-header">
                @include('partials.header')
            </header>

            <main class="app-content">
                <div class="container-fluid py-3">

                    @hasSection('breadcrumb')
                        <div class="breadcrumb-wrapper mb-3">
                            @yield('breadcrumb')
                        </div>
                    @endif

                    <div class="content-wrapper">
                        @yield('content')
                    </div>

                </div>
            </main>

            <footer class="app-footer">
                @include('partials.footer')
            </footer>

        </div>

    </div>

    @include('partials.scripts')

</body>

</html>