@extends('layouts.app')

@section('title', __('Anasayfa') . ' - MachinePazar')

@section('meta_description', 'İş makinesi, ekskavatör ve yedek parça alım satımı için Türkiye\'nin en güvenilir platformu')

@section('content')
    <!-- Hero Section -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h1 style="font-size: 48px; font-weight: 800; margin-bottom: 20px; line-height: 1.2;">
                    {{ __('İş Makinesi ve Yedek Parça') }}<br>
                    {{ __('Alım Satım Platformu') }}
                </h1>
                <p style="font-size: 20px; opacity: 0.95; margin-bottom: 40px;">
                    {{ __('Binlerce ilan arasından ihtiyacınıza uygun makineyi bulun') }}
                </p>

                <!-- Search Box -->
                <div style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
                    <form action="{{ route('listings.index') }}" method="GET">
                        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                            <input type="text" name="search" placeholder="{{ __('Ne arıyorsunuz?') }}"
                                   style="flex: 2; min-width: 200px; padding: 15px 20px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 16px;">

                            <select name="category" style="flex: 1; min-width: 150px; padding: 15px 20px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                                <option value="">{{ __('Kategori Seçin') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->getTranslation('name', app()->getLocale()) }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="condition" style="flex: 1; min-width: 130px; padding: 15px 20px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                                <option value="">{{ __('Durum') }}</option>
                                <option value="new">{{ __('Yeni') }}</option>
                                <option value="used">{{ __('2. El') }}</option>
                                <option value="refurbished">{{ __('Yenilenmiş') }}</option>
                            </select>

                            <button type="submit" class="btn btn-primary" style="flex: 0 0 auto; padding: 15px 35px; white-space: nowrap; min-width: auto;">
                                <i class="fas fa-search" style="font-size: 18px;"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="padding: 60px 0; background: white;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; text-align: center;">
                <div>
                    <div style="font-size: 48px; color: var(--primary); font-weight: 800; margin-bottom: 10px;">
                        {{ number_format($stats['total_listings'] ?? 0) }}+
                    </div>
                    <p style="color: var(--text-light); font-size: 18px;">{{ __('Aktif İlan') }}</p>
                </div>
                <div>
                    <div style="font-size: 48px; color: var(--primary); font-weight: 800; margin-bottom: 10px;">
                        5,000+
                    </div>
                    <p style="color: var(--text-light); font-size: 18px;">{{ __('Mutlu Müşteri') }}</p>
                </div>
                <div>
                    <div style="font-size: 48px; color: var(--primary); font-weight: 800; margin-bottom: 10px;">
                        {{ $stats['total_brands'] ?? 0 }}+
                    </div>
                    <p style="color: var(--text-light); font-size: 18px;">{{ __('Marka') }}</p>
                </div>
                <div>
                    <div style="font-size: 48px; color: var(--primary); font-weight: 800; margin-bottom: 10px;">
                        24/7
                    </div>
                    <p style="color: var(--text-light); font-size: 18px;">{{ __('Destek') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sadece değişen kısım - Categories Section -->
    <!-- Sadece değişen kısım - Categories Section -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    {{ __('Popüler Kategoriler') }}
                </h2>
                <p style="color: var(--text-light); font-size: 18px;">
                    {{ __('İhtiyacınıza uygun kategoriyi seçin') }}
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                @foreach($categories as $category)
                    @php
                        // Alt kategorilerdeki toplam ilan sayısı (ana kategori kendisi hariç)
                        if ($category->children->count() > 0) {
                            // Sadece alt kategorilerdeki ilanlar
                            $categoryIds = $category->children->pluck('id');
                        } else {
                            // Alt kategori yoksa kendi ilanları
                            $categoryIds = collect([$category->id]);
                        }

                        $totalListings = \App\Models\Listing::whereIn('category_id', $categoryIds)
                            ->where('status', 'published')
                            ->count();
                    @endphp

                    <a href="{{ route('categories.show', $category->slug) }}" style="text-decoration: none; color: inherit;">
                        <div style="background: white; border-radius: 12px; padding: 30px; text-align: center; transition: all 0.3s; border: 2px solid var(--border); cursor: pointer;">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, {{ $loop->index % 4 == 0 ? '#FF6B35 0%, #FF8C5A' : ($loop->index % 4 == 1 ? '#004E89 0%, #1E6BA8' : ($loop->index % 4 == 2 ? '#10b981 0%, #34d399' : '#f59e0b 0%, #fbbf24')) }} 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 36px; color: white;">
                                <i class="fas {{ $category->icon ?? 'fa-cog' }}"></i>
                            </div>
                            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">
                                {{ $category->getTranslation('name', app()->getLocale()) }}
                            </h3>

                            <!-- Sadece alt kategorilerdeki ilan sayısı -->
                            <p style="color: var(--text-light);">
                                <strong style="color: var(--primary); font-size: 24px;">{{ $totalListings }}</strong>
                                {{ __('İlan') }}
                            </p>

                            @if($category->children && $category->children->count() > 0)
                                <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid var(--border);">
                                    <p style="font-size: 12px; color: var(--text-light); margin-bottom: 0;">
                                        <i class="fas fa-folder"></i> {{ $category->children->count() }} {{ __('Alt Kategori') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ route('categories.index') }}" class="btn btn-outline">
                    {{ __('Tüm Kategoriler') }}
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Featured Listings -->

    <section style="padding: 80px 0; background: white;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    {{ __('Öne Çıkan İlanlar') }}
                </h2>
                <p style="color: var(--text-light); font-size: 18px;">
                    {{ __('En çok ilgi gören ilanlarımız') }}
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                @forelse($featuredListings as $listing)
                    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s;">
                        <div style="position: relative;">
                            @if($listing->primaryImage)
                                <img src="{{ asset('storage/' . $listing->primaryImage->image_path) }}"
                                     alt="{{ $listing->getTranslation('title', app()->getLocale()) }}"
                                     style="width: 100%; height: 220px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/400x300/FF6B35/FFFFFF?text=Makine"
                                     alt="{{ $listing->getTranslation('title', app()->getLocale()) }}"
                                     style="width: 100%; height: 220px; object-fit: cover;">
                            @endif

                            @if($listing->condition === 'new')
                                <span style="position: absolute; top: 15px; left: 15px; background: var(--success); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                            {{ __('YENİ') }}
                        </span>
                            @elseif($listing->is_featured)
                                <span style="position: absolute; top: 15px; left: 15px; background: var(--warning); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                            <i class="fas fa-star"></i> {{ __('ÖNE ÇIKAN') }}
                        </span>
                            @endif

                            <span style="position: absolute; top: 15px; right: 15px; background: rgba(0,0,0,0.6); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                            <i class="fas fa-eye"></i> {{ $listing->views }}
                        </span>
                        </div>
                        <div style="padding: 20px;">
                            <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                @if($listing->category)
                                    <span style="background: var(--bg-light); padding: 4px 10px; border-radius: 4px; font-size: 12px; color: var(--text-light); font-weight: 600;">
                                {{ $listing->category->getTranslation('name', app()->getLocale()) }}
                            </span>
                                @endif
                                <span style="background: var(--bg-light); padding: 4px 10px; border-radius: 4px; font-size: 12px; color: var(--text-light); font-weight: 600;">
                                @if($listing->condition === 'new')
                                        {{ __('Yeni') }}
                                    @elseif($listing->condition === 'used')
                                        {{ __('2. El') }}
                                    @else
                                        {{ __('Yenilenmiş') }}
                                    @endif
                            </span>
                            </div>

                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 10px; color: var(--text-dark); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 50px;">
                                {{ $listing->getTranslation('title', app()->getLocale()) }}
                            </h3>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">
                                <i class="fas fa-map-marker-alt"></i> {{ $listing->location }}
                            </p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span style="font-size: 24px; font-weight: 800; color: var(--primary);">
                                @if($listing->currency === 'EUR')
                                    €
                                @elseif($listing->currency === 'USD')
                                    $
                                @else
                                    ₺
                                @endif
                                {{ number_format($listing->price, 0, ',', '.') }}
                            </span>
                                @if($listing->brand)
                                    <span style="background: var(--bg-light); padding: 6px 12px; border-radius: 6px; font-size: 13px; color: var(--text-light); font-weight: 600;">
                                {{ $listing->brand->name }}
                            </span>
                                @endif
                            </div>
                            <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-outline" style="width: 100%; justify-content: center; font-size: 14px; padding: 10px;">
                                {{ __('Detayları Gör') }}
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                        <i class="fas fa-box-open" style="font-size: 64px; color: var(--text-light); margin-bottom: 20px;"></i>
                        <p style="color: var(--text-light); font-size: 18px;">{{ __('Henüz öne çıkan ilan bulunmamaktadır.') }}</p>
                    </div>
                @endforelse
            </div>

            <div style="text-align: center; margin-top: 50px;">
                <a href="{{ route('listings.index') }}" class="btn btn-primary" style="padding: 15px 50px;">
                    {{ __('Tüm İlanları Gör') }}
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    {{ __('Nasıl Çalışır?') }}
                </h2>
                <p style="color: var(--text-light); font-size: 18px;">
                    {{ __('3 basit adımda ilan vermeye başlayın') }}
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 42px; color: white; font-weight: 800;">
                        1
                    </div>
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 15px;">{{ __('Kayıt Olun') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        {{ __('Ücretsiz hesap oluşturun ve platformumuza katılın') }}
                    </p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #004E89 0%, #1E6BA8 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 42px; color: white; font-weight: 800;">
                        2
                    </div>
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 15px;">{{ __('İlan Verin') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        {{ __('Detaylı bilgiler ve fotoğraflarla ilanınızı yayınlayın') }}
                    </p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #10b981 0%, #34d399 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 42px; color: white; font-weight: 800;">
                        3
                    </div>
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 15px;">{{ __('Satış Yapın') }}</h3>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        {{ __('Alıcılarla iletişime geçin ve satışı tamamlayın') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container" style="text-align: center;">
            <h2 style="font-size: 42px; font-weight: 800; margin-bottom: 20px;">
                {{ __('Hemen İlan Vermeye Başlayın!') }}
            </h2>
            <p style="font-size: 20px; opacity: 0.95; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                {{ __('Binlerce alıcıya ulaşın ve makinenizi hızlıca satın') }}
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
        /* Card Hover Effects */
        div[style*="cursor: pointer"]:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
            border-color: var(--primary) !important;
        }

        /* Listing Card Hover */
        section div[style*="box-shadow: 0 4px 12px"]:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
        }

        /* Responsive Search Box */
        @media (max-width: 768px) {
            div[style*="display: flex"] form > div {
                flex-direction: column;
            }

            div[style*="display: flex"] form > div > * {
                flex: 1 1 100% !important;
                min-width: 100% !important;
            }

            button[type="submit"] {
                width: 100%;
            }
        }
    </style>
@endpush
