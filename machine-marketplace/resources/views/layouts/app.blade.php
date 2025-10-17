<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Makine Pazarı - İş Makinesi ve Yedek Parça İlanları')</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'İş makinesi, ekskavatör, yedek parça alım satımı için en güvenilir platform')">
    <meta name="keywords" content="@yield('meta_keywords', 'iş makinesi, ekskavatör, yedek parça, makine ilanları')">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    @if(file_exists(public_path('css/app.css')))
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #FF6B35;
            --primary-dark: #E85A2A;
            --secondary: #004E89;
            --text-dark: #1a1a1a;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --bg-light: #f9fafb;
            --white: #ffffff;
            --success: #10b981;
            --warning: #f59e0b;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-light);
            line-height: 1.6;
        }

        /* Header Styles */
        .header {
            background: var(--white);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            background: var(--secondary);
            color: var(--white);
            padding: 10px 0;
            font-size: 14px;
        }

        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .header-main {
            padding: 15px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        .logo i {
            font-size: 32px;
        }

        /* Navigation */
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 25px;
            align-items: center;
            margin: 0;
        }

        .nav-menu a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
            white-space: nowrap;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Language Switcher */
        .lang-switcher {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .lang-switcher a {
            color: var(--white);
            text-decoration: none;
            padding: 4px 10px;
            border-radius: 4px;
            transition: background 0.3s;
            font-size: 13px;
            font-weight: 600;
        }

        .lang-switcher a:hover,
        .lang-switcher a.active {
            background: rgba(255,255,255,0.2);
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-dark);
            padding: 8px;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .mobile-menu-toggle:hover {
            background: var(--bg-light);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 320px;
            height: 100vh;
            background: var(--white);
            box-shadow: -2px 0 20px rgba(0,0,0,0.15);
            transition: right 0.3s ease-in-out;
            z-index: 2000;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 2px solid var(--border);
            background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%);
        }

        .mobile-menu-header .logo {
            color: white;
            font-size: 24px;
        }

        .mobile-menu-header .logo i {
            font-size: 28px;
        }

        .mobile-menu-close {
            background: rgba(255,255,255,0.2);
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .mobile-menu-close:hover {
            background: rgba(255,255,255,0.3);
            transform: rotate(90deg);
        }

        .mobile-menu-items {
            padding: 10px 0;
        }

        .mobile-menu-items a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .mobile-menu-items a:hover,
        .mobile-menu-items a:active {
            background: var(--bg-light);
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .mobile-menu-items a i {
            width: 24px;
            text-align: center;
            font-size: 18px;
        }

        .mobile-menu-items .btn-mobile {
            margin: 15px 20px;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            padding: 16px 20px;
            border-left: 3px solid var(--primary);
            font-weight: 700;
        }

        .mobile-menu-items .btn-mobile:hover {
            background: var(--primary-dark);
            border-left-color: var(--primary-dark);
        }

        .mobile-menu-footer {
            padding: 20px;
            border-top: 1px solid var(--border);
            margin-top: 20px;
        }

        .mobile-menu-footer .lang-switcher {
            justify-content: center;
            gap: 15px;
        }

        .mobile-menu-footer .lang-switcher a {
            color: var(--text-dark);
            background: var(--bg-light);
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

        .mobile-menu-footer .lang-switcher a.active {
            background: var(--primary);
            color: white;
        }

        .mobile-menu-footer .social-links {
            justify-content: center;
            margin-top: 20px;
        }

        .mobile-menu-footer .social-links a {
            background: var(--bg-light);
            color: var(--text-dark);
            width: 40px;
            height: 40px;
        }

        .mobile-menu-footer .social-links a:hover {
            background: var(--primary);
            color: white;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 1999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 200px);
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 60px 0 20px;
            margin-top: 80px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: var(--primary);
            font-weight: 700;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            text-align: center;
            color: rgba(255,255,255,0.6);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--white);
            transition: all 0.3s;
            font-size: 18px;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-info {
            line-height: 1.8;
            color: rgba(255,255,255,0.8);
        }

        /* Contact Info */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: rgba(255,255,255,0.8);
        }

        .contact-info-item i {
            margin-top: 3px;
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .nav-menu {
                display: none;
            }

            .header-content .btn {
                padding: 10px 16px;
                font-size: 14px;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .logo {
                font-size: 24px;
            }

            .logo span {
                display: none;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .header-top {
                font-size: 12px;
                padding: 8px 0;
            }

            .header-top .container {
                justify-content: center;
                text-align: center;
            }

            .header-top .container > div:first-child {
                width: 100%;
            }

            .logo {
                font-size: 20px;
            }

            .logo i {
                font-size: 24px;
            }

            .header-content .btn span {
                display: none;
            }

            .header-content .btn {
                padding: 10px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer {
                padding: 40px 0 20px;
                margin-top: 50px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }

            .header-main {
                padding: 10px 0;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
<!-- Header Top -->
<div class="header-top">
    <div class="container">
        <div>
            <i class="fas fa-phone"></i> <span>+90 555 123 45 67</span>
            <span style="margin: 0 10px; opacity: 0.5;">|</span>
            <i class="fas fa-envelope"></i> <span>info@makinepazari.com</span>
        </div>
        <div class="lang-switcher">
            <i class="fas fa-globe"></i>
            <a href="{{ route('lang.switch', 'tr') }}" class="{{ app()->getLocale() == 'tr' ? 'active' : '' }}">TR</a>
            <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
        </div>
    </div>
</div>

<!-- Header Main -->
<header class="header">
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    <i class="fas fa-cogs"></i>
                    <span>MachinePazar</span>
                </a>

                <nav>
                    <ul class="nav-menu">
                        <li><a href="{{ route('home') }}">{{ __('Anasayfa') }}</a></li>
                        <li><a href="{{ route('listings.index') }}">{{ __('İlanlar') }}</a></li>
                        <li><a href="{{ route('categories.index') }}">{{ __('Kategoriler') }}</a></li>
                        <li><a href="{{ route('about') }}">{{ __('Hakkımızda') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('İletişim') }}</a></li>
                    </ul>
                </nav>

                <div style="display: flex; gap: 10px; align-items: center;">
                    <a href="{{ route('listings.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>{{ __('İlan Ver') }}</span>
                    </a>

                    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileMenu()"></div>
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="{{ route('home') }}" class="logo">
            <i class="fas fa-cogs"></i>
            <span>MachinePazar</span>
        </a>
        <button class="mobile-menu-close" onclick="toggleMobileMenu()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="mobile-menu-items">
        <a href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            {{ __('Anasayfa') }}
        </a>
        <a href="{{ route('listings.index') }}">
            <i class="fas fa-list"></i>
            {{ __('Tüm İlanlar') }}
        </a>
        <a href="{{ route('categories.index') }}">
            <i class="fas fa-th-large"></i>
            {{ __('Kategoriler') }}
        </a>
        <a href="{{ route('listings.create') }}" style="background: var(--primary); color: white; margin: 10px 20px; border-radius: 8px;">
            <i class="fas fa-plus-circle"></i>
            {{ __('İlan Ver') }}
        </a>
        <a href="{{ route('about') }}">
            <i class="fas fa-info-circle"></i>
            {{ __('Hakkımızda') }}
        </a>
        <a href="{{ route('contact') }}">
            <i class="fas fa-envelope"></i>
            {{ __('İletişim') }}
        </a>
    </div>
</div>

<!-- Main Content -->
<main class="main-content">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Company Info -->
            <div class="footer-section">
                <h3>{{ __('MachinePazar') }}</h3>
                <p class="footer-info">
                    {{ __('İş makinesi ve yedek parça alım satımında Türkiye\'nin en güvenilir platformu. Binlerce ilan, güvenli alışveriş.') }}
                </p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3>{{ __('Hızlı Linkler') }}</h3>
                <ul>
                    <li><a href="{{ route('listings.index') }}"><i class="fas fa-chevron-right"></i> {{ __('Tüm İlanlar') }}</a></li>
                    <li><a href="{{ route('categories.index') }}"><i class="fas fa-chevron-right"></i> {{ __('Kategoriler') }}</a></li>
                    <li><a href="{{ route('listings.create') }}"><i class="fas fa-chevron-right"></i> {{ __('İlan Ver') }}</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> {{ __('Hakkımızda') }}</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> {{ __('İletişim') }}</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="footer-section">
                <h3>{{ __('Popüler Kategoriler') }}</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> {{ __('Ekskavatör') }}</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> {{ __('Yedek Parça') }}</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> {{ __('Hidrolik Sistemler') }}</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> {{ __('Motor Parçaları') }}</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> {{ __('İnşaat Ekipmanları') }}</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h3>{{ __('İletişim') }}</h3>
                <div class="contact-info">
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>İstanbul, Türkiye<br>Pendik / İstanbul</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+90 555 123 45 67</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@makinepazari.com</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fab fa-whatsapp"></i>
                        <span>+90 555 123 45 67</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} MachinePazar. {{ __('Tüm hakları saklıdır.') }}</p>
            <p style="margin-top: 10px; font-size: 13px;">
                <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; margin: 0 10px;">{{ __('Gizlilik Politikası') }}</a> |
                <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; margin: 0 10px;">{{ __('Kullanım Koşulları') }}</a> |
                <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; margin: 0 10px;">{{ __('Çerez Politikası') }}</a>
            </p>
        </div>
    </div>
</footer>

@if(file_exists(public_path('js/app.js')))
    <script src="{{ asset('js/app.js') }}"></script>
@endif

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const overlay = document.getElementById('mobileOverlay');
        menu.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.style.overflow = menu.classList.contains('active') ? 'hidden' : '';
    }
</script>

@stack('scripts')
</body>
</html>
