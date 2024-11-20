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
                            <a href="#about-us" class="nav-link text-dark">О нас</a>
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
                        <a href="tel:+375290000000" class="fw-bold text-dark text-decoration-none phone-link">+375 29
                            000-00-00</a>
                        <small class="d-block text-dark phone-link" onclick="window.location.href='tel:+375290000000'">Позвонить</small>
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


        <main class="pt-4">
            @yield('content')
        </main>

        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-logo mb-5">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                        </div>
                        <div class="footer-contact mb-3">
                            <i class="bi bi-telephone text-accent"></i>
                            <span class="text-dark ms-2">+375290000000</span>
                        </div>
                        <a href="#" class="footer-link text-accent d-block mb-3 text-decoration-underline">Заказать
                            звонок</a>
                        <div class="footer-contact mb-3">
                            <i class="bi bi-envelope-fill text-accent"></i>
                            <span class="text-dark ms-2">support@luxurymoda.ru</span>
                        </div>
                        <div class="footer-contact">
                            <i class="bi bi-geo-alt-fill text-accent"></i>
                            <span class="text-dark ms-2">Минск, проспект Победителей</span>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="footer-title">Услуги</h4>
                        <ul class="footer-list mt-4">
                            <li><a href="#" class="footer-link text-dark">Услуги логистики для e-commerce</a></li>
                            <li><a href="#" class="footer-link text-dark">Складской аутсорсинг</a></li>
                            <li><a href="#" class="footer-link text-dark">Логистический аутсорсинг</a></li>
                            <li><a href="#" class="footer-link text-dark">Логистический сервис для
                                    интернет-магазинов</a></li>
                            <li><a href="#" class="footer-link text-dark">Контрактная логистика</a></li>
                        </ul>
                        <a href="#" class="footer-link text-accent mt-4 d-flex align-items-center">
                            Посмотреть все <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>

                    <!-- Column 3 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <ul class="footer-list">
                            <li><a href="#" class="footer-link text-bold text-dark">О нас</a></li>
                            <li><a href="#" class="footer-link text-bold text-dark">Цены</a></li>
                            <li><a href="#" class="footer-link text-bold text-dark">Вопросы и ответы</a></li>
                            <li><a href="#" class="footer-link text-bold text-dark">Контакты</a></li>
                            <li><a href="#" class="footer-link text-bold text-dark">Блог</a></li>
                        </ul>
                    </div>

                    <!-- Column 4 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <p class="footer-text text-muted opacity-25 fw-semibold">
                            Я вас любил: любовь еще, быть может,<br>
                            В душе моей угасла не совсем.<br>
                            ИП Пушкин А.С.<br>
                            УНП 000000000
                        </p>
                    </div>
                </div>

                <!-- Bottom block -->
                <div class="footer-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="footer-link text-dark">Политика
                            конфиденциальности</a>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/grizzly-logo.svg') }}" alt="Logo" class="me-2" style="width: 28.98px; height: 30px;">
                            <a href="/" class="footer-link text-dark text-decoration-none">luxurymoda.ru</a>
                        </div>
                    </div>
                </div>
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
