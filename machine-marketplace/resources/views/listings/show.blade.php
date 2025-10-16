@extends('layouts.app')

@section('title', 'Caterpillar 320D Ekskavatör - MachinePazar')

@section('content')
    <!-- Breadcrumb -->
    <section style="padding: 20px 0; background: var(--bg-light);">
        <div class="container">
            <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-light);">
                <a href="{{ route('home') }}" style="color: var(--text-light); text-decoration: none;">{{ __('Anasayfa') }}</a>
                <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                <a href="{{ route('listings.index') }}" style="color: var(--text-light); text-decoration: none;">{{ __('İlanlar') }}</a>
                <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                <span style="color: var(--text-dark); font-weight: 600;">Caterpillar 320D Ekskavatör</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section style="padding: 40px 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
                <!-- Left Column -->
                <div>
                    <!-- Image Gallery -->
                    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <!-- Main Image -->
                        <div style="position: relative;">
                            <img id="mainImage" src="https://via.placeholder.com/800x500/FF6B35/FFFFFF?text=Ana+Görsel"
                                 alt="Main" style="width: 100%; height: 500px; object-fit: cover;">

                            <div style="position: absolute; top: 20px; left: 20px; display: flex; gap: 10px;">
                            <span style="background: var(--success); color: white; padding: 8px 16px; border-radius: 8px; font-weight: 600;">
                                {{ __('YENİ') }}
                            </span>
                                <span style="background: var(--warning); color: white; padding: 8px 16px; border-radius: 8px; font-weight: 600;">
                                <i class="fas fa-star"></i> {{ __('ÖNE ÇIKAN') }}
                            </span>
                            </div>

                            <button style="position: absolute; top: 20px; right: 20px; background: white; border: none; padding: 12px 16px; border-radius: 8px; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                <i class="far fa-heart" style="color: var(--primary); font-size: 20px;"></i>
                            </button>

                            <!-- Navigation Arrows -->
                            <button style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-chevron-left" style="font-size: 20px; color: var(--text-dark);"></i>
                            </button>
                            <button style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-chevron-right" style="font-size: 20px; color: var(--text-dark);"></i>
                            </button>
                        </div>

                        <!-- Thumbnail Gallery -->
                        <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; padding: 20px;">
                            @for($i = 1; $i <= 5; $i++)
                                <img src="https://via.placeholder.com/150x100/{{ $i % 2 == 0 ? '004E89' : 'FF6B35' }}/FFFFFF?text=Görsel+{{ $i }}"
                                     alt="Thumbnail"
                                     style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid {{ $i == 1 ? 'var(--primary)' : 'transparent' }};">
                            @endfor
                        </div>
                    </div>

                    <!-- Title & Info -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h1 style="font-size: 32px; font-weight: 800; margin-bottom: 20px; color: var(--text-dark);">
                            Caterpillar 320D Hidrolik Ekskavatör - 2018 Model
                        </h1>

                        <div style="display: flex; gap: 30px; margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid var(--border);">
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-eye"></i>
                                <span>{{ __('1,245 görüntülenme') }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-clock"></i>
                                <span>{{ __('2 gün önce yayınlandı') }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>İstanbul, Türkiye</span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg-light); padding: 20px; border-radius: 8px;">
                            <div>
                                <p style="color: var(--text-light); font-size: 14px; margin-bottom: 5px;">{{ __('Fiyat') }}</p>
                                <span style="font-size: 36px; font-weight: 800; color: var(--primary);">
                                €125,000
                            </span>
                            </div>
                            <div style="display: flex; gap: 15px;">
                                <button style="background: var(--primary); color: white; border: none; padding: 15px 30px; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-phone"></i>
                                    {{ __('Ara') }}
                                </button>
                                <button style="background: var(--success); color: white; border: none; padding: 15px 30px; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px;">
                                    <i class="fab fa-whatsapp"></i>
                                    {{ __('WhatsApp') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Specifications -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('Teknik Özellikler') }}
                        </h2>

                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Marka') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">Caterpillar</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Model') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">320D</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Yıl') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">2018</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Durum') }}</span>
                                <span style="background: var(--warning); color: white; padding: 4px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">2. El</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Çalışma Saati') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">3,500 saat</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Motor Gücü') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">121 HP</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Ağırlık') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">20,500 kg</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 15px; background: var(--bg-light); border-radius: 8px;">
                                <span style="color: var(--text-light); font-weight: 600;">{{ __('Kova Kapasitesi') }}</span>
                                <span style="color: var(--text-dark); font-weight: 700;">1.2 m³</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('Açıklama') }}
                        </h2>
                        <div style="color: var(--text-light); line-height: 1.8; font-size: 16px;">
                            <p style="margin-bottom: 15px;">
                                2018 model Caterpillar 320D hidrolik ekskavatör satılıktır. Makine son derece bakımlı ve çalışır durumdadır.
                                Tüm periyodik bakımları zamanında yapılmıştır.
                            </p>
                            <p style="margin-bottom: 15px;">
                                <strong>Özellikler:</strong>
                            </p>
                            <ul style="margin-left: 20px; margin-bottom: 15px;">
                                <li>Orijinal hidrolik pompa ve motorlar</li>
                                <li>Klima sistemi mevcut ve çalışır durumda</li>
                                <li>Yeni lastikler</li>
                                <li>Bakımlı kabin</li>
                                <li>Tüm belgeler tam</li>
                                <li>Ağır hizmet paletleri</li>
                                <li>Quick coupler sistemi</li>
                            </ul>
                            <p style="margin-bottom: 15px;">
                                Makine İstanbul'da görülebilir. Ciddi alıcılar için test sürüşü yapılabilir.
                            </p>
                            <p style="margin-bottom: 0;">
                                <strong>Not:</strong> Takas ve kredi kartına taksit imkanı mevcuttur.
                            </p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('Konum') }}
                        </h2>
                        <div style="background: var(--bg-light); height: 300px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                            <div style="text-align: center;">
                                <i class="fas fa-map-marker-alt" style="font-size: 48px; margin-bottom: 15px;"></i>
                                <p style="font-size: 18px; font-weight: 600;">İstanbul, Türkiye</p>
                                <p style="font-size: 14px;">Pendik / İstanbul</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div>
                    <!-- Seller Card -->
                    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 25px; position: sticky; top: 20px;">
                        <div style="text-align: center; margin-bottom: 20px;">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #004E89 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: white; font-size: 32px; font-weight: 800;">
                                AŞ
                            </div>
                            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 5px;">{{ __('Ahmet Şahin') }}</h3>
                            <p style="color: var(--text-light); font-size: 14px;">{{ __('Yetkili Satıcı') }}</p>
                            <div style="display: flex; align-items: center; justify-content: center; gap: 5px; margin-top: 10px;">
                                <i class="fas fa-star" style="color: #fbbf24;"></i>
                                <i class="fas fa-star" style="color: #fbbf24;"></i>
                                <i class="fas fa-star" style="color: #fbbf24;"></i>
                                <i class="fas fa-star" style="color: #fbbf24;"></i>
                                <i class="fas fa-star-half-alt" style="color: #fbbf24;"></i>
                                <span style="color: var(--text-light); font-size: 14px; margin-left: 5px;">(4.8)</span>
                            </div>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">
                                <span style="color: var(--text-light);">{{ __('Üyelik') }}</span>
                                <span style="font-weight: 600;">{{ __('3 yıl') }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">
                                <span style="color: var(--text-light);">{{ __('Aktif İlan') }}</span>
                                <span style="font-weight: 600;">24</span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span style="color: var(--text-light);">{{ __('Yanıt Süresi') }}</span>
                                <span style="font-weight: 600; color: var(--success);">{{ __('~2 saat') }}</span>
                            </div>
                        </div>

                        <button class="btn btn-primary" style="width: 100%; justify-content: center; margin-bottom: 12px;">
                            <i class="fas fa-phone"></i>
                            {{ __('Telefonu Göster') }}
                        </button>

                        <button class="btn btn-outline" style="width: 100%; justify-content: center; margin-bottom: 12px;">
                            <i class="fas fa-envelope"></i>
                            {{ __('Mesaj Gönder') }}
                        </button>

                        <button style="width: 100%; background: #25D366; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;">
                            <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                            {{ __('WhatsApp') }}
                        </button>
                    </div>

                    <!-- Share -->
                    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 25px;">
                        <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">{{ __('Paylaş') }}</h3>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                            <button style="background: #1877f2; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                                <i class="fab fa-facebook-f"></i>
                                Facebook
                            </button>
                            <button style="background: #1da1f2; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </button>
                            <button style="background: #25D366; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                                <i class="fab fa-whatsapp"></i>
                                WhatsApp
                            </button>
                            <button style="background: var(--text-dark); color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                                <i class="fas fa-link"></i>
                                {{ __('Kopyala') }}
                            </button>
                        </div>
                    </div>

                    <!-- Report -->
                    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <button style="width: 100%; background: transparent; border: 2px solid var(--border); color: var(--text-light); padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                            <i class="fas fa-flag"></i>
                            {{ __('Bu ilanı bildir') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Listings -->
    <section style="padding: 60px 0; background: var(--bg-light);">
        <div class="container">
            <h2 style="font-size: 32px; font-weight: 800; margin-bottom: 30px;">
                {{ __('Benzer İlanlar') }}
            </h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                @for($i = 1; $i <= 4; $i++)
                    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <img src="https://via.placeholder.com/300x200/FF6B35/FFFFFF?text=Benzer+{{ $i }}"
                             alt="Similar" style="width: 100%; height: 180px; object-fit: cover;">
                        <div style="padding: 20px;">
                            <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 10px;">
                                Caterpillar 320 Model Ekskavatör
                            </h3>
                            <p style="font-size: 20px; font-weight: 800; color: var(--primary); margin-bottom: 15px;">
                                €{{ number_format(120000 + ($i * 10000), 0, ',', '.') }}
                            </p>
                            <a href="#" class="btn btn-outline" style="width: 100%; justify-content: center; font-size: 14px; padding: 10px;">
                                {{ __('Detay') }}
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Thumbnail hover effect */
        img[style*="cursor: pointer"]:hover {
            opacity: 0.8;
            border-color: var(--primary) !important;
        }

        /* Button hover effects */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Responsive */
        @media (max-width: 968px) {
            div[style*="grid-template-columns: 2fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
@endpush
