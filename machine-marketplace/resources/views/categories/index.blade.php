@extends('layouts.app')

@section('title', 'Kategoriler - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 60px 0; color: white;">
        <div class="container">
            <h1 style="font-size: 42px; font-weight: 800; margin-bottom: 15px;">
                {{ __('Tüm Kategoriler') }}
            </h1>
            <p style="font-size: 18px; opacity: 0.95;">
                {{ __('İhtiyacınıza uygun kategoriyi seçin ve ilanları inceleyin') }}
            </p>
        </div>
    </section>

    <!-- Categories Grid -->
    <section style="padding: 80px 0;">
        <div class="container">
            @if($categories->count() > 0)
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" style="text-decoration: none; color: inherit;">
                            <div class="category-card" style="background: white; border-radius: 16px; padding: 40px; text-align: center; transition: all 0.3s; border: 2px solid var(--border); cursor: pointer; position: relative; overflow: hidden;">
                                <!-- Background Gradient -->
                                <div style="position: absolute; top: 0; left: 0; right: 0; height: 100px; background: linear-gradient(135deg,
                        {{ $loop->index % 4 == 0 ? '#FF6B35 0%, #FF8C5A' : ($loop->index % 4 == 1 ? '#004E89 0%, #1E6BA8' : ($loop->index % 4 == 2 ? '#10b981 0%, #34d399' : '#f59e0b 0%, #fbbf24')) }} 100%);
                        opacity: 0.1; z-index: 0;">
                                </div>

                                <!-- Icon -->
                                <div style="width: 100px; height: 100px; background: linear-gradient(135deg,
                        {{ $loop->index % 4 == 0 ? '#FF6B35 0%, #FF8C5A' : ($loop->index % 4 == 1 ? '#004E89 0%, #1E6BA8' : ($loop->index % 4 == 2 ? '#10b981 0%, #34d399' : '#f59e0b 0%, #fbbf24')) }} 100%);
                        border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 48px; color: white; position: relative; z-index: 1; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                                    <i class="fas {{ $category->icon ?? 'fa-cog' }}"></i>
                                </div>

                                <!-- Category Name -->
                                <h3 style="font-size: 24px; font-weight: 800; margin-bottom: 15px; color: var(--text-dark); position: relative; z-index: 1;">
                                    {{ $category->getTranslation('name', app()->getLocale()) }}
                                </h3>

                                <!-- Listing Count -->
                                <div style="display: inline-block; background: var(--bg-light); padding: 8px 20px; border-radius: 20px; margin-bottom: 20px; position: relative; z-index: 1;">
                                    <i class="fas fa-tag" style="color: var(--primary); margin-right: 5px;"></i>
                                    <span style="font-weight: 700; color: var(--text-dark);">{{ $category->listings_count ?? 0 }}</span>
                                    <span style="color: var(--text-light); margin-left: 3px;">{{ __('İlan') }}</span>
                                </div>

                                <!-- Arrow Icon -->
                                <div style="position: relative; z-index: 1;">
                                    <i class="fas fa-arrow-right" style="font-size: 24px; color: var(--primary); transition: transform 0.3s;"></i>
                                </div>

                                <!-- Subcategories Preview (if any) -->
                                @if($category->children && $category->children->count() > 0)
                                    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); position: relative; z-index: 1;">
                                        <p style="font-size: 13px; color: var(--text-light); margin-bottom: 10px;">
                                            <i class="fas fa-folder"></i> {{ __('Alt Kategoriler:') }}
                                        </p>
                                        <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;">
                                            @foreach($category->children->take(3) as $subcategory)
                                                <span style="background: var(--bg-light); padding: 4px 12px; border-radius: 12px; font-size: 12px; color: var(--text-dark);">
                                {{ $subcategory->getTranslation('name', app()->getLocale()) }}
                            </span>
                                            @endforeach
                                            @if($category->children->count() > 3)
                                                <span style="background: var(--primary); color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                                +{{ $category->children->count() - 3 }}
                            </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 80px 20px;">
                    <i class="fas fa-box-open" style="font-size: 64px; color: var(--text-light); margin-bottom: 20px;"></i>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 10px; color: var(--text-dark);">
                        {{ __('Henüz Kategori Bulunmamaktadır') }}
                    </h3>
                    <p style="color: var(--text-light); font-size: 16px;">
                        {{ __('Yakında kategoriler eklenecektir.') }}
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- Popular Categories Section -->
    @if($categories->count() > 0)
        <section style="padding: 80px 0; background: white;">
            <div class="container">
                <div style="text-align: center; margin-bottom: 50px;">
                    <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                        {{ __('En Popüler Kategoriler') }}
                    </h2>
                    <p style="color: var(--text-light); font-size: 18px;">
                        {{ __('En çok ilan bulunan kategoriler') }}
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                    @foreach($categories->sortByDesc('listings_count')->take(6) as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" style="text-decoration: none; color: inherit;">
                            <div style="background: var(--bg-light); border-radius: 12px; padding: 25px; display: flex; align-items: center; gap: 20px; transition: all 0.3s; border: 2px solid transparent;">
                                <div style="width: 60px; height: 60px; background: linear-gradient(135deg,
                        {{ $loop->index % 4 == 0 ? '#FF6B35 0%, #FF8C5A' : ($loop->index % 4 == 1 ? '#004E89 0%, #1E6BA8' : ($loop->index % 4 == 2 ? '#10b981 0%, #34d399' : '#f59e0b 0%, #fbbf24')) }} 100%);
                        border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px; color: white; flex-shrink: 0;">
                                    <i class="fas {{ $category->icon ?? 'fa-cog' }}"></i>
                                </div>
                                <div style="flex: 1; min-width: 0;">
                                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 5px; color: var(--text-dark); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $category->getTranslation('name', app()->getLocale()) }}
                                    </h4>
                                    <p style="font-size: 14px; color: var(--text-light); margin: 0;">
                                        {{ $category->listings_count ?? 0 }} {{ __('İlan') }}
                                    </p>
                                </div>
                                <i class="fas fa-chevron-right" style="color: var(--text-light); font-size: 16px;"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container" style="text-align: center;">
            <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 20px;">
                {{ __('Aradığınızı Bulamadınız mı?') }}
            </h2>
            <p style="font-size: 18px; opacity: 0.95; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                {{ __('Tüm ilanları görüntüleyebilir veya kendi ilanınızı yayınlayabilirsiniz') }}
            </p>
            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('listings.index') }}" class="btn" style="background: white; color: var(--primary); padding: 15px 40px; font-size: 16px;">
                    <i class="fas fa-list"></i>
                    {{ __('Tüm İlanları Gör') }}
                </a>
                <a href="{{ route('listings.create') }}" class="btn btn-outline" style="border-color: white; color: white; padding: 15px 40px; font-size: 16px;">
                    <i class="fas fa-plus-circle"></i>
                    {{ __('İlan Ver') }}
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Category Card Hover Effect */
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
            border-color: var(--primary) !important;
        }

        .category-card:hover i.fa-arrow-right {
            transform: translateX(5px);
        }

        /* Popular Category Item Hover */
        div[style*="background: var(--bg-light)"][style*="display: flex"]:hover {
            background: white !important;
            border-color: var(--primary) !important;
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            section h1 {
                font-size: 32px !important;
            }

            section h2 {
                font-size: 28px !important;
            }
        }
    </style>
@endpush
