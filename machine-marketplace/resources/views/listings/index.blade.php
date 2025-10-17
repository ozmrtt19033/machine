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
            <form method="GET" action="{{ route('listings.index') }}" id="filter-form">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; align-items: end;">
                    <!-- Arama -->
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Arama') }}
                        </label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="{{ __('Makine veya parça ara...') }}"
                               style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                    </div>

                    <!-- Ana Kategori -->
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Kategori') }}
                        </label>
                        <select name="category" id="filter-category" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="">{{ __('Tümü') }}</option>
                            @foreach($categories->whereNull('parent_id') as $category)
                                <option value="{{ $category->id }}"
                                        data-has-children="{{ $category->children->count() > 0 ? 'true' : 'false' }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->getTranslation('name', app()->getLocale()) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Alt Kategori -->
                    <div id="subcategory-filter-wrapper" style="{{ request('subcategory') ? 'display: block;' : 'display: none;' }}">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Alt Kategori') }}
                        </label>
                        <select name="subcategory" id="filter-subcategory" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="">{{ __('Tümü') }}</option>
                        </select>
                    </div>

                    <!-- Durum -->
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Durum') }}
                        </label>
                        <select name="condition" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="">{{ __('Tümü') }}</option>
                            <option value="new" {{ request('condition') == 'new' ? 'selected' : '' }}>{{ __('Yeni') }}</option>
                            <option value="used" {{ request('condition') == 'used' ? 'selected' : '' }}>{{ __('2. El') }}</option>
                            <option value="refurbished" {{ request('condition') == 'refurbished' ? 'selected' : '' }}>{{ __('Yenilenmiş') }}</option>
                        </select>
                    </div>

                    <!-- Sıralama -->
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                            {{ __('Sıralama') }}
                        </label>
                        <select name="sort" style="width: 100%; padding: 12px 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('En Yeni') }}</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>{{ __('Fiyat (Düşük-Yüksek)') }}</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>{{ __('Fiyat (Yüksek-Düşük)') }}</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>{{ __('En Popüler') }}</option>
                        </select>
                    </div>

                    <!-- Filtrele Butonu -->
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
                    <strong>{{ $listings->total() }}</strong> {{ __('ilan bulundu') }}
                </p>
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
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; margin-bottom: 50px;">
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
                        <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 10px;">{{ __('İlan Bulunamadı') }}</h3>
                        <p style="color: var(--text-light); font-size: 16px; margin-bottom: 20px;">
                            {{ __('Arama kriterlerinize uygun ilan bulunamadı. Lütfen farklı filtreler deneyin.') }}
                        </p>
                        <a href="{{ route('listings.index') }}" class="btn btn-primary">
                            <i class="fas fa-redo"></i>
                            {{ __('Filtreleri Temizle') }}
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($listings->hasPages())
                <div style="display: flex; justify-content: center; align-items: center; gap: 10px; flex-wrap: wrap;">
                    {{-- Previous Button --}}
                    @if($listings->onFirstPage())
                        <button disabled style="padding: 10px 15px; border: 2px solid var(--border); background: var(--bg-light); border-radius: 6px; color: var(--text-light); cursor: not-allowed;">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $listings->previousPageUrl() }}" style="padding: 10px 15px; border: 2px solid var(--border); background: white; border-radius: 6px; cursor: pointer; color: var(--text-dark); text-decoration: none;">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
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

                    {{-- Next Button --}}
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

@push('scripts')
    <script>
        // Alt kategori verileri
        const filterSubcategoriesData = @json($categories->whereNull('parent_id')->mapWithKeys(function($category) {
        return [$category->id => $category->children->map(function($sub) {
            return [
                'id' => $sub->id,
                'name' => $sub->getTranslation('name', app()->getLocale())
            ];
        })];
    }));

        const filterCategorySelect = document.getElementById('filter-category');
        const filterSubcategoryWrapper = document.getElementById('subcategory-filter-wrapper');
        const filterSubcategorySelect = document.getElementById('filter-subcategory');
        const selectedSubcategory = "{{ request('subcategory') }}";

        // Sayfa yüklendiğinde seçili kategori varsa alt kategorileri yükle
        if (filterCategorySelect.value) {
            loadSubcategories(filterCategorySelect.value, selectedSubcategory);
        }

        // Kategori değiştiğinde
        filterCategorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const hasChildren = selectedOption.dataset.hasChildren === 'true';

            // Alt kategori seçimini temizle
            filterSubcategorySelect.innerHTML = '<option value="">{{ __("Tümü") }}</option>';

            if (hasChildren && categoryId && filterSubcategoriesData[categoryId]) {
                loadSubcategories(categoryId, '');
            } else {
                // Alt kategori alanını gizle
                filterSubcategoryWrapper.style.display = 'none';
            }
        });

        function loadSubcategories(categoryId, selectedId = '') {
            if (filterSubcategoriesData[categoryId] && filterSubcategoriesData[categoryId].length > 0) {
                // Alt kategori alanını göster
                filterSubcategoryWrapper.style.display = 'block';

                // Alt kategorileri doldur
                filterSubcategoriesData[categoryId].forEach(function(subcategory) {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    if (selectedId && selectedId == subcategory.id) {
                        option.selected = true;
                    }
                    filterSubcategorySelect.appendChild(option);
                });
            } else {
                filterSubcategoryWrapper.style.display = 'none';
            }
        }
    </script>
@endpush
