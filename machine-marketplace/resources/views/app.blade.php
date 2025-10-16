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
            padding: 8px 0;
            font-size: 14px;
        }

        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-main {
            padding: 15px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 32px;
        }

        /* Navigation */
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
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
            padding: 4px 8px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .lang-switcher a:hover,
        .lang-switcher a.active {
            background: rgba(255,255,255,0.2);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-dark);
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 200px);
            padding: 40px 0;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 50px 0 20px;
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
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            text-align: center;
            color: rgba(255,255,255,0.6);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--white);
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .nav-menu {
                display: none;
            }

            .header-content {
                gap: 15px;
            }

            .header-top .container {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .footer-content {
                grid-template-columns: 1fr;
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
            <i class="fas fa-phone"></i> +90 555 123 45 67
            <span style="margin: 0 15px;">|</span>
            <i class="fas fa-envelope"></i> info@makinepazari.com
        </div>
        <div class="lang-switcher">
            <span><i class="fas fa-globe"></i></span>
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

                <div style="display: flex; gap: 15px; align-items: center;">
                    <a href="{{ route('listings.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        {{ __('İlan Ver') }}
                    </a>
                </div>

                <button class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="main-content">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>{{ __('Hakkımızda') }}</h3>
                <p style="color: rgba(255,255,255,0.8); line-height: 1.8;">
                    {{ __('İş makinesi ve yedek parça alım satımında Türkiye\'nin en güvenilir platformu.') }}
                </p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>{{ __('Hızlı Linkler') }}</h3>
                <ul>
                    <li><a href="{{ route('listings.index') }}">{{ __('Tüm İlanlar') }}</a></li>
                    <li><a href="{{ route('categories.index') }}">{{ __('Kategoriler') }}</a></li>
                    <li><a href="#">{{ __('Nasıl Çalışır?') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('İletişim') }}</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>{{ __('Kategoriler') }}</h3>
                <ul>
                    <li><a href="#">{{ __('Ekskavatör') }}</a></li>
                    <li><a href="#">{{ __('Yedek Parça') }}</a></li>
                    <li><a href="#">{{ __('Hidrolik Sistemler') }}</a></li>
                    <li><a href="#">{{ __('Motor Parçaları') }}</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>{{ __('İletişim') }}</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> İstanbul, Türkiye</li>
                    <li><i class="fas fa-phone"></i> +90 555 123 45 67</li>
                    <li><i class="fas fa-envelope"></i> info@makinepazari.com</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} MachinePazar. {{ __('Tüm hakları saklıdır.') }}</p>
        </div>
    </div>
</footer>

@if(file_exists(public_path('js/app.js')))
    <script src="{{ asset('js/app.js') }}"></script>
@endif

@stack('scripts')
</body>
</html>
