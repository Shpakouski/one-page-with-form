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
        <header class="bg-white">
            <div class="container py-3 d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <a href="{{ route('main.page') }}" class="text-decoration-none">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo" style="max-height: 50px;">
                </a>

                <!-- Desktop Navigation -->
                <nav class="d-none d-lg-flex align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#about" class="nav-link text-dark">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link text-dark">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pricing" class="nav-link text-dark">Цены</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link text-dark">Контакты</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link text-dark">Отзывы</a>
                        </li>
                    </ul>
                </nav>

                <!-- Phone number and language selector -->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!-- Phone number -->
                    <div class="text-center pe-2 pe-md-5">
                        <a href="tel:+375291234567" class="fw-bold text-dark text-decoration-none phone-link">+375 29
                            123-45-67</a>
                        <small class="d-block text-dark phone-link" onclick="window.location.href='tel:+375291234567'">Позвонить</small>
                    </div>

                    <!-- Language selector -->
                    <div class="dropdown">
                        <a class="text-dark text-decoration-none d-flex align-items-center" href="#" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span id="selectedLanguage">RU</span>
                            <i class="bi bi-chevron-down ms-2 language-icon"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#" onclick="changeLanguage('RU')">Русский</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeLanguage('EN')">English</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="btn btn-outline-secondary d-lg-none ms-2" id="mobileMenuToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="d-lg-none bg-light p-3" id="mobileMenu" style="display: none;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#about" class="nav-link text-dark">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link text-dark">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link text-dark">Цены</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link text-dark">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a href="#reviews" class="nav-link text-dark">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a href="tel:+375291234567" class="nav-link text-dark fw-bold">+375 29 123-45-67</a>
                    </li>
                </ul>
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

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Custom Scripts -->
        <script src="{{ asset('js/main.js') }}"></script>

        @stack('scripts')
    </body>
</html>
