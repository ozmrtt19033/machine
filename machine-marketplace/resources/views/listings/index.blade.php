@extends('layouts.app')

@section('title', 'Tüm İlanlar - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 60px 0; color: white;">
        <div class="container">
            <h1 style="font-size: 42px; font-weight: 800; margin-bottom: 15px;">
                {{ __('Tüm İlanlar') }}
            </h1>
            <p style="font-size: 18px; opacity: 0.95;">
                {{ __('Binlerce makine ve yedek parça ilanı arasından seçim yapın') }}
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section style="padding: 30px 0; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <div class="container">
            <form method="GET" action="{{ route('listings.index') }}">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; align-items: end;">
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Arama') }}
                        </label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="{{ __('Makine veya parça ara...') }}"
                               style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Kategori') }}
                        </label>
                        <select name="category" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="">{{ __('Tümü') }}</option>
                            <option value="excavator">{{ __('Ekskavatör') }}</option>
                            <option value="spare-parts">{{ __('Yedek Parça') }}</option>
                            <option value="hydraulic">{{ __('Hidrolik Sistemler') }}</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Durum') }}
                        </label>
                        <select name="condition" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="">{{ __('Tümü') }}</option>
                            <option value="new">{{ __('Yeni') }}</option>
                            <option value="used">{{ __('2. El') }}</option>
                            <option value="refurbished">{{ __('Yenilenmiş') }}</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Sıralama') }}
                        </label>
                        <select name="sort" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="newest">{{ __('En Yeni') }}</option>
                            <option value="price_low">{{ __('Fiyat (Düşük-Yüksek)') }}</option>
                            <option value="price_high">{{ __('Fiyat (Yüksek-Düşük)') }}</option>
                            <option value="popular">{{ __('En Popüler') }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="padding: 12px 30px;">
                        <i class="fas fa-filter"></i>
                        {{ __('Filtrele') }}
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Listings Grid -->
    <section style="padding: 50px 0;">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <p style="color: var(--text-light); font-size: 16px;">
                    <strong>{{ __('2,487') }}</strong> {{ __('ilan bulundu') }}
                </p>
                <div style="display: flex; gap: 10px;">
                    <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-th"></i>
                    </button>
                    <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Listings Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; margin-bottom: 50px;">
                @for($i = 1; $i <= 12; $i++)
                    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s;">
                        <div style="position: relative;">
                            <img src="https://via.placeholder.com/400x300/FF6B35/FFFFFF?text=Makine+{{ $i }}"
                                 alt="Listing" style="width: 100%; height: 220px; object-fit: cover;">

                            @if($i % 3 == 0)
                                <span style="position: absolute; top: 15px; left: 15px; background: var(--success); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        {{ __('YENİ') }}
                    </span>
                            @elseif($i % 3 == 1)
                                <span style="position: absolute; top: 15px; left: 15px; background: var(--warning); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        {{ __('ÖNE ÇIKAN') }}
                    </span>
                            @endif

                            <button style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.9); border: none; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s;">
                                <i class="far fa-heart" style="color: var(--primary); font-size: 18px;"></i>
                            </button>

                            <span style="position: absolute; bottom: 15px; right: 15px; background: rgba(0,0,0,0.7); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        <i class="fas fa-star" style="color: #fbbf24;"></i> 4.{{ $i }}
                    </span>
                        </div>

                        <div style="padding: 20px;">
                            <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                        <span style="background: var(--bg-light); padding: 4px 10px; border-radius: 4px; font-size: 12px; color: var(--text-light); font-weight: 600;">
                            {{ __('Ekskavatör') }}
                        </span>
                                <span style="background: var(--bg-light); padding: 4px 10px; border-radius: 4px; font-size: 12px; color: var(--text-light); font-weight: 600;">
                            2. El
                        </span>
                            </div>

                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 10px; color: var(--text-dark); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                Caterpillar 320D {{ $i }} Model Hidrolik Ekskavatör
                            </h3>

                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px; display: flex; align-items: center; gap: 5px;">
                                <i class="fas fa-map-marker-alt"></i> İstanbul, Türkiye
                            </p>

                            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid var(--border);">
                                <div>
                                    <p style="font-size: 12px; color: var(--text-light); margin-bottom: 3px;">{{ __('Fiyat') }}</p>
                                    <span style="font-size: 22px; font-weight: 800; color: var(--primary);">
                                €{{ number_format(100000 + ($i * 5000), 0, ',', '.') }}
                            </span>
                                </div>
                                <a href="{{ route('listings.show', $i) }}" class="btn btn-outline" style="padding: 10px 20px; font-size: 14px;">
                                    {{ __('Detay') }}
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                            <div style="display: flex; gap: 15px; margin-top: 15px; padding-top: 15px; border-top: 1px solid var(--border); font-size: 13px; color: var(--text-light);">
                                <span><i class="fas fa-eye"></i> {{ rand(50, 500) }}</span>
                                <span><i class="fas fa-clock"></i> {{ rand(1, 30) }} {{ __('gün önce') }}</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Pagination -->
            <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; color: var(--text-light);">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button style="padding: 10px 15px; border: 2px solid var(--primary); background: var(--primary); color: white; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    1
                </button>
                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                    2
                </button>
                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                    3
                </button>
                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                    4
                </button>
                <span style="padding: 10px;">...</span>
                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                    25
                </button>

                <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; color: var(--text-dark);">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Card Hover Effect */
        div[style*="box-shadow: 0 4px 12px"]:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
        }

        /* Heart Button Hover */
        button:has(.fa-heart):hover {
            background: var(--primary) !important;
        }

        button:has(.fa-heart):hover i {
            color: white !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            div[style*="grid-template-columns: repeat(auto-fit"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
@endpush
