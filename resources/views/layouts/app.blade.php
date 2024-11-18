<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Luxurymoda Project')</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        @stack('styles')
    </head>
    <body>
        <header class="bg-white border-bottom shadow-sm">
            <div class="container py-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('main.page') }}" class="text-decoration-none">
                    <h1 class="h5 fw-bold mb-0">Luxurymoda</h1>
                </a>
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{ route('main.page') }}" class="nav-link text-dark">Главная</a>
                        </li>
                        <!-- Other links -->
                    </ul>
                </nav>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-light py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">© 2024 Luxurymoda. Все права защищены.</p>
            </div>
        </footer>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom Scripts -->
        <script src="{{ asset('js/main.js') }}"></script>

        @stack('scripts')
    </body>
</html>
