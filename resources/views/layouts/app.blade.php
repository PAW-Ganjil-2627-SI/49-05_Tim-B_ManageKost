<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — KosManage</title>

    {{-- Google Font: Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5.3 & Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Tema Simple Soft Neo-Brutalism --}}
    <link href="{{ asset('css/brutal-theme.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div class="app-wrapper">
        {{-- Sidebar Responsif: Fixed di Desktop, Offcanvas di Mobile --}}
        <aside class="app-sidebar offcanvas-lg offcanvas-start" tabindex="-1" id="appSidebar" aria-labelledby="appSidebarLabel">
            @include('layouts.partials.sidebar')
        </aside>

        {{-- Area Kanan: Topbar + Konten Utama --}}
        <div class="app-main">
            <header class="app-topbar">
                <div class="d-flex align-items-center gap-3 min-w-0">
                    <button class="btn btn-sm btn-secondary d-lg-none"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#appSidebar"
                            aria-controls="appSidebar"
                            aria-label="Buka menu">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <div class="min-w-0">
                        <h1 class="h5 fw-bold mb-0 text-truncate">@yield('title', 'Dashboard')</h1>
                        @hasSection('subtitle')
                            <p class="text-muted mb-0 text-truncate" style="font-size: 0.8rem;">@yield('subtitle')</p>
                        @endif
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    @yield('page-actions')
                </div>
            </header>

            <main class="app-content">
                <div class="container-fluid px-0" style="max-width: 1280px;">
                    @include('layouts.partials.alerts')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- Bootstrap 5.3 Bundle JS + Helper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app-shell.js') }}"></script>

    @stack('scripts')
</body>
</html>

