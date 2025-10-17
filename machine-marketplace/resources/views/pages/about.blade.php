@extends('layouts.app')

@section('title', __('Hakkımızda') . ' - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h1 style="font-size: 48px; font-weight: 800; margin-bottom: 20px;">
                    {{ __('Hakkımızda') }}
                </h1>
                <p style="font-size: 20px; opacity: 0.95;">
                    {{ __('İş makinesi ve yedek parça sektöründe güvenilir çözüm ortağınız') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Company Info Section -->
    <section style="padding: 80px 0; background: white;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                <div>
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                        <i class="fas fa-cogs" style="font-size: 40px; color: white;"></i>
                    </div>
                    <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 20px; color: var(--text-dark);">
                        @if(app()->getLocale() == 'tr')
                            MachinePazar'a Hoş Geldiniz
                        @else
                            Welcome to MachinePazar
                        @endif
                    </h2>
                    <p style="color: var(--text-light); line-height: 1.8; font-size: 17px; margin-bottom: 20px;">
                        @if(app()->getLocale() == 'tr')
                            MachinePazar, iş makinesi ve yedek parça alım satımında Türkiye'nin önde gelen online platformudur.
                            2020 yılında kurulan şirketimiz, sektördeki deneyimimiz ve müşteri odaklı yaklaşımımızla kısa sürede
                            güvenilir bir marka haline gelmiştir.
                        @else
                            MachinePazar is Turkey's leading online platform for machinery and spare parts trading.
                            Founded in 2020, our company has quickly become a trusted brand with our industry experience
                            and customer-oriented approach.
                        @endif
                    </p>
                    <p style="color: var(--text-light); line-height: 1.8; font-size: 17px;">
                        @if(app()->getLocale() == 'tr')
                            Platformumuz, alıcılar ve satıcıları bir araya getirerek iş makinesi sektöründe güvenli ve hızlı
                            ticaret imkanı sunmaktadır. Binlerce ilan, geniş marka yelpazesi ve profesyonel destek ekibimizle
                            sektörün lider platformuyuz.
                        @else
                            Our platform brings buyers and sellers together, offering safe and fast trading opportunities in
                            the machinery sector. We are the leading platform in the industry with thousands of listings,
                            a wide range of brands, and our professional support team.
                        @endif
                    </p>
                </div>
                <div style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); border-radius: 20px; padding: 60px; color: white; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
                    <div style="display: flex; flex-direction: column; gap: 30px;">
                        <div>
                            <div style="font-size: 48px; font-weight: 800; margin-bottom: 10px;">5,000+</div>
                            <p style="font-size: 18px; opacity: 0.9;">{{ __('Aktif Kullanıcı') }}</p>
                        </div>
                        <div>
                            <div style="font-size: 48px; font-weight: 800; margin-bottom: 10px;">10,000+</div>
                            <p style="font-size: 18px; opacity: 0.9;">{{ __('Tamamlanan İşlem') }}</p>
                        </div>
                        <div>
                            <div style="font-size: 48px; font-weight: 800; margin-bottom: 10px;">150+</div>
                            <p style="font-size: 18px; opacity: 0.9;">{{ __('Marka') }}</p>
                        </div>
                        <div>
                            <div style="font-size: 48px; font-weight: 800; margin-bottom: 10px;">24/7</div>
                            <p style="font-size: 18px; opacity: 0.9;">{{ __('Müşteri Desteği') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section style="padding: 80px 0; background: var(--bg-light);">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    {{ __('Misyon & Vizyon') }}
                </h2>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                <div style="background: white; border-radius: 16px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-bullseye" style="font-size: 28px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">
                        {{ __('Misyonumuz') }}
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        @if(app()->getLocale() == 'tr')
                            İş makinesi ve yedek parça sektöründe alıcı ve satıcıları en güvenli, hızlı ve verimli şekilde
                            bir araya getirmek. Müşterilerimize şeffaf, adil ve kaliteli hizmet sunarak sektörün dijital dönüşümüne
                            öncülük etmek.
                        @else
                            To bring buyers and sellers together in the machinery and spare parts sector in the safest,
                            fastest and most efficient way. To lead the digital transformation of the sector by providing
                            transparent, fair and quality service to our customers.
                        @endif
                    </p>
                </div>

                <div style="background: white; border-radius: 16px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #004E89 0%, #1E6BA8 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-eye" style="font-size: 28px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">
                        {{ __('Vizyonumuz') }}
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        @if(app()->getLocale() == 'tr')
                            Türkiye'nin ve bölgenin en güvenilir iş makinesi ticaret platformu olmak. Teknoloji ve inovasyonla
                            sektöre değer katarak, müşterilerimizin ilk tercihi olmayı sürdürmek ve uluslararası arenada
                            güçlü bir marka olmak.
                        @else
                            To be Turkey's and the region's most reliable machinery trading platform. To continue to be our
                            customers' first choice by adding value to the sector with technology and innovation, and to be
                            a strong brand in the international arena.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section style="padding: 80px 0; background: white;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    {{ __('Değerlerimiz') }}
                </h2>
                <p style="color: var(--text-light); font-size: 18px;">
                    @if(app()->getLocale() == 'tr')
                        Başarımızın temelini oluşturan değerlerimiz
                    @else
                        Our values that form the foundation of our success
                    @endif
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);">
                        <i class="fas fa-shield-alt" style="font-size: 36px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('Güvenilirlik') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.6;">
                        @if(app()->getLocale() == 'tr')
                            Müşterilerimize güvenli alışveriş ortamı sunuyoruz
                        @else
                            We provide a safe shopping environment for our customers
                        @endif
                    </p>
                </div>

                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #004E89 0%, #1E6BA8 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 10px 30px rgba(0, 78, 137, 0.3);">
                        <i class="fas fa-handshake" style="font-size: 36px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('Şeffaflık') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.6;">
                        @if(app()->getLocale() == 'tr')
                            Açık ve net iletişimle her adımda yanınızdayız
                        @else
                            We are with you at every step with open and clear communication
                        @endif
                    </p>
                </div>

                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #10b981 0%, #34d399 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);">
                        <i class="fas fa-rocket" style="font-size: 36px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('İnovasyon') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.6;">
                        @if(app()->getLocale() == 'tr')
                            Teknoloji ile sektöre yenilik getiriyoruz
                        @else
                            We bring innovation to the sector with technology
                        @endif
                    </p>
                </div>

                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);">
                        <i class="fas fa-users" style="font-size: 36px; color: white;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('Müşteri Odaklılık') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.6;">
                        @if(app()->getLocale() == 'tr')
                            Müşteri memnuniyeti her zaman önceliğimiz
                        @else
                            Customer satisfaction is always our priority
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container" style="text-align: center;">
            <h2 style="font-size: 42px; font-weight: 800; margin-bottom: 20px;">
                @if(app()->getLocale() == 'tr')
                    Hemen Aramıza Katılın!
                @else
                    Join Us Now!
                @endif
            </h2>
            <p style="font-size: 20px; opacity: 0.95; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                @if(app()->getLocale() == 'tr')
                    Binlerce alıcı ve satıcının tercih ettiği platformumuzda yerinizi alın
                @else
                    Take your place on our platform preferred by thousands of buyers and sellers
                @endif
            </p>
            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('listings.create') }}" class="btn" style="background: white; color: var(--primary); padding: 18px 50px; font-size: 18px;">
                    <i class="fas fa-plus-circle"></i>
                    {{ __('Ücretsiz İlan Ver') }}
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline" style="border-color: white; color: white; padding: 18px 50px; font-size: 18px;">
                    <i class="fas fa-phone"></i>
                    {{ __('Bize Ulaşın') }}
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        @media (max-width: 768px) {
            section div[style*="grid-template-columns: 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }

            section h1 {
                font-size: 36px !important;
            }

            section h2 {
                font-size: 28px !important;
            }
        }
    </style>
@endpush
