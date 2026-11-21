<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') — KosManage</title>

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
<body class="d-flex flex-column min-vh-100 justify-content-center py-4 px-3">
    <main class="container" style="max-width: 920px;">
        @yield('content')
    </main>

    {{-- Bootstrap 5.3 Bundle JS + Helper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app-shell.js') }}"></script>

    @stack('scripts')
</body>
</html>

