@extends('layouts.app')

@section('title', $category->getTranslation('name', app()->getLocale()) . ' - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 60px 0; color: white;">
        <div class="container">
            <!-- Breadcrumb -->
            <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; margin-bottom: 20px; opacity: 0.9;">
                <a href="{{ route('home') }}" style="color: white; text-decoration: none;">{{ __('Anasayfa') }}</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <a href="{{ route('categories.index') }}" style="color: white; text-decoration: none;">{{ __('Kategoriler') }}</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span>{{ $category->getTranslation('name', app()->getLocale()) }}</span>
            </div>

            <div style="display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
                <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 40px;">
                    <i class="fas {{ $category->icon ?? 'fa-cog' }}"></i>
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <h1 style="font-size: 42px; font-weight: 800; margin-bottom: 10px;">
                        {{ $category->getTranslation('name', app()->getLocale()) }}
                    </h1>
                    <p style="font-size: 18px; opacity: 0.95;">
                        <i class="fas fa-tag"></i> {{ $listings->total() }} {{ __('ilan bulundu') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Subcategories (if any) -->
    @if($subcategories && $subcategories->count() > 0)
        <section style="padding: 40px 0; background: white; border-bottom: 1px solid var(--border);">
            <div class="container">
                <h2 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">
                    <i class="fas fa-folder-open"></i> {{ __('Alt Kategoriler') }}
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px;">
                    @foreach($subcategories as $subcategory)
                        <a href="{{ route('categories.show', $subcategory->slug) }}" style="text-decoration: none;">
                            <div style="background: var(--bg-light); border: 2px solid var(--border); border-radius: 12px; padding: 20px; text-align: center; transition: all 0.3s; cursor: pointer;">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px; font-size: 24px; color: white;">
                                    <i class="fas {{ $subcategory->icon ?? 'fa-cog' }}"></i>
                                </div>
                                <h3 style="font-size: 15px; font-weight: 700; color: var(--text-dark); margin-bottom: 5px;">
                                    {{ $subcategory->getTranslation('name', app()->getLocale()) }}
                                </h3>
                                <p style="font-size: 13px; color: var(--text-light); margin: 0;">
                                    {{ $subcategory->listings_count ?? 0 }} {{ __('İlan') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Filters & Listings -->
    <section style="padding: 50px 0;">
        <div class="container">
            <!-- Filters -->
            <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 30px;">
                <form method="GET" action="{{ route('categories.show', $category->slug) }}">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; align-items: end;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark); font-size: 14px;">
                                {{ __('Arama') }}
                            </label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="{{ __('Ara...') }}"
                                   style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark); font-size: 14px;">
                                {{ __('Durum') }}
                            </label>
                            <select name="condition" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                <option value="">{{ __('Tümü') }}</option>
                                <option value="new" {{ request('condition') == 'new' ? 'selected' : '' }}>{{ __('Yeni') }}</option>
                                <option value="used" {{ request('condition') == 'used' ? 'selected' : '' }}>{{ __('2. El') }}</option>
                                <option value="refurbished" {{ request('condition') == 'refurbished' ? 'selected' : '' }}>{{ __('Yenilenmiş') }}</option>
                            </select>
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark); font-size: 14px;">
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

            <!-- Results Count -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h2 style="font-size: 24px; font-weight: 800; color: var(--text-dark);">
                    {{ __('İlanlar') }}
                    <span style="color: var(--text-light); font-weight: 400; font-size: 18px;">
                    ({{ $listings->total() }})
                </span>
                </h2>
                <div style="display: flex; gap: 10px;">
                    <button style="padding: 10px 15px; border: 2px solid var(--primary); background: var(--primary); color: white; border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-th"></i>
                    </button>
                    <button style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Listings Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; margin-bottom: 50px;">
                @forelse($listings as $listing)
                    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s;">
                        <div style="position: relative;">
                            @if($listing->primaryImage)
                                <img src="{{ asset('storage/' . $listing->primaryImage->image_path) }}"
                                     alt="{{ $listing->getTranslation('title', app()->getLocale()) }}"
                                     style="width: 100%; height: 220px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/400x300/FF6B35/FFFFFF?text={{ urlencode($listing->brand->name ?? 'Makine') }}"
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

                            <button style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.9); border: none; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s;">
                                <i class="far fa-heart" style="color: var(--primary); font-size: 18px;"></i>
                            </button>

                            <span style="position: absolute; bottom: 15px; right: 15px; background: rgba(0,0,0,0.7); color: white; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                            <i class="fas fa-eye"></i> {{ $listing->views }}
                        </span>
                        </div>

                        <div style="padding: 20px;">
                            <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                @if($listing->brand)
                                    <span style="background: var(--bg-light); padding: 4px 10px; border-radius: 4px; font-size: 12px; color: var(--text-light); font-weight: 600;">
                                {{ $listing->brand->name }}
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

                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px; display: flex; align-items: center; gap: 5px;">
                                <i class="fas fa-map-marker-alt"></i> {{ $listing->location }}
                            </p>

                            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid var(--border);">
                                <div>
                                    <p style="font-size: 12px; color: var(--text-light); margin-bottom: 3px;">{{ __('Fiyat') }}</p>
                                    <span style="font-size: 22px; font-weight: 800; color: var(--primary);">
                                    @if($listing->currency === 'EUR')
                                            €
                                        @elseif($listing->currency === 'USD')
                                            $
                                        @else
                                            ₺
                                        @endif
                                        {{ number_format($listing->price, 0, ',', '.') }}
                                </span>
                                </div>
                                <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-outline" style="padding: 10px 20px; font-size: 14px;">
                                    {{ __('Detay') }}
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                            <div style="display: flex; gap: 15px; margin-top: 15px; padding-top: 15px; border-top: 1px solid var(--border); font-size: 13px; color: var(--text-light);">
                                <span><i class="fas fa-eye"></i> {{ $listing->views }}</span>
                                <span><i class="fas fa-clock"></i> {{ $listing->published_at ? $listing->published_at->diffForHumans() : __('Yeni') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 80px 20px;">
                        <i class="fas fa-search" style="font-size: 64px; color: var(--text-light); margin-bottom: 20px;"></i>
                        <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 10px;">{{ __('Bu Kategoride İlan Bulunamadı') }}</h3>
                        <p style="color: var(--text-light); font-size: 16px; margin-bottom: 20px;">
                            {{ __('Bu kategoride henüz ilan bulunmamaktadır.') }}
                        </p>
                        <a href="{{ route('listings.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            {{ __('İlk İlanı Siz Verin') }}
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($listings->hasPages())
                <div style="display: flex; justify-content: center; align-items: center; gap: 10px; flex-wrap: wrap;">
                    @if($listings->onFirstPage())
                        <button disabled style="padding: 10px 15px; border: 2px solid var(--border); background: var(--bg-light); border-radius: 6px; color: var(--text-light); cursor: not-allowed;">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $listings->previousPageUrl() }}" style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; color: var(--text-dark); text-decoration: none;">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @foreach($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)
                        @if($page == $listings->currentPage())
                            <button style="padding: 10px 15px; border: 2px solid var(--primary); background: var(--primary); color: white; border-radius: 6px; font-weight: 600;">
                                {{ $page }}
                            </button>
                        @elseif($page == 1 || $page == $listings->lastPage() || abs($page - $listings->currentPage()) < 3)
                            <a href="{{ $url }}" style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; text-decoration: none; color: var(--text-dark);">
                                {{ $page }}
                            </a>
                        @elseif(abs($page - $listings->currentPage()) == 3)
                            <span style="padding: 10px;">...</span>
                        @endif
                    @endforeach

                    @if($listings->hasMorePages())
                        <a href="{{ $listings->nextPageUrl() }}" style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; color: var(--text-dark); text-decoration: none;">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <button disabled style="padding: 10px 15px; border: 2px solid var(--border); background: var(--bg-light); border-radius: 6px; color: var(--text-light); cursor: not-allowed;">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <style>
        div[style*="box-shadow: 0 4px 12px"]:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
        }

        button:has(.fa-heart):hover {
            background: var(--primary) !important;
        }

        button:has(.fa-heart):hover i {
            color: white !important;
        }

        div[style*="cursor: pointer"]:hover {
            transform: translateY(-3px);
            border-color: var(--primary) !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
@endpush
