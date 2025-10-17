@extends('layouts.app')

@section('title', __('İlan Ver') . ' - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 60px 0; color: white;">
        <div class="container">
            <h1 style="font-size: 42px; font-weight: 800; margin-bottom: 15px;">
                @if(app()->getLocale() == 'tr')
                    Yeni İlan Ver
                @else
                    Post New Listing
                @endif
            </h1>
            <p style="font-size: 18px; opacity: 0.95;">
                @if(app()->getLocale() == 'tr')
                    Makinenizi veya yedek parçanızı binlerce alıcıya ulaştırın
                @else
                    Reach thousands of buyers with your machinery or spare parts
                @endif
            </p>
        </div>
    </section>

    <!-- Form Steps -->
    <section style="padding: 30px 0; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; max-width: 800px; margin: 0 auto;">
                <div style="flex: 1; text-align: center;">
                    <div style="width: 50px; height: 50px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; font-weight: 800; font-size: 20px;">
                        1
                    </div>
                    <p style="font-weight: 600; color: var(--primary);">{{ __('Temel Bilgiler') }}</p>
                </div>
                <div style="flex: 1; height: 2px; background: var(--border); margin: 0 10px;"></div>
                <div style="flex: 1; text-align: center;">
                    <div style="width: 50px; height: 50px; background: var(--border); color: var(--text-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; font-weight: 800; font-size: 20px;">
                        2
                    </div>
                    <p style="font-weight: 600; color: var(--text-light);">{{ __('Teknik Detaylar') }}</p>
                </div>
                <div style="flex: 1; height: 2px; background: var(--border); margin: 0 10px;"></div>
                <div style="flex: 1; text-align: center;">
                    <div style="width: 50px; height: 50px; background: var(--border); color: var(--text-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; font-weight: 800; font-size: 20px;">
                        3
                    </div>
                    <p style="font-weight: 600; color: var(--text-light);">{{ __('Görseller') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section style="padding: 50px 0;">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Language Tabs -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <div style="display: flex; gap: 15px; margin-bottom: 30px; border-bottom: 2px solid var(--border);">
                            <button type="button" class="lang-tab active" data-lang="tr" style="background: none; border: none; padding: 15px 30px; font-weight: 600; color: var(--primary); border-bottom: 3px solid var(--primary); cursor: pointer; margin-bottom: -2px;">
                                <i class="fas fa-flag"></i> Türkçe
                            </button>
                            <button type="button" class="lang-tab" data-lang="en" style="background: none; border: none; padding: 15px 30px; font-weight: 600; color: var(--text-light); cursor: pointer;">
                                <i class="fas fa-flag"></i> English
                            </button>
                        </div>

                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            @if(app()->getLocale() == 'tr')
                                Temel Bilgiler
                            @else
                                Basic Information
                            @endif
                        </h2>

                        <!-- Turkish Fields -->
                        <div class="lang-content" data-lang="tr">
                            <div style="margin-bottom: 25px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('İlan Başlığı') }} (TR) <span style="color: var(--primary);">*</span>
                                </label>
                                <input type="text" name="title[tr]" required
                                       placeholder="{{ __('Örn: Caterpillar 320D Hidrolik Ekskavatör') }}"
                                       style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                <p style="font-size: 13px; color: var(--text-light); margin-top: 5px;">
                                    {{ __('Açıklayıcı ve dikkat çekici bir başlık yazın') }}
                                </p>
                            </div>

                            <div style="margin-bottom: 25px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Açıklama') }} (TR) <span style="color: var(--primary);">*</span>
                                </label>
                                <textarea name="description[tr]" required rows="8"
                                          placeholder="{{ __('Makinenizin detaylı açıklamasını yazın...') }}"
                                          style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px; resize: vertical;"></textarea>
                                <p style="font-size: 13px; color: var(--text-light); margin-top: 5px;">
                                    {{ __('En az 100 karakter yazmanız önerilir') }}
                                </p>
                            </div>
                        </div>

                        <!-- English Fields -->
                        <div class="lang-content" data-lang="en" style="display: none;">
                            <div style="margin-bottom: 25px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('İlan Başlığı') }} (EN) <span style="color: var(--primary);">*</span>
                                </label>
                                <input type="text" name="title[en]" required
                                       placeholder="Ex: Caterpillar 320D Hydraulic Excavator"
                                       style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            </div>

                            <div style="margin-bottom: 25px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Açıklama') }} (EN) <span style="color: var(--primary);">*</span>
                                </label>
                                <textarea name="description[en]" required rows="8"
                                          placeholder="Write detailed description of your machine..."
                                          style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px; resize: vertical;"></textarea>
                            </div>
                        </div>

                        <!-- Category, Subcategory & Brand -->
                        <div id="category-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    @if(app()->getLocale() == 'tr')
                                        Kategori
                                    @else
                                        Category
                                    @endif
                                    <span style="color: var(--primary);">*</span>
                                </label>
                                <select name="category_id" id="category_id" required
                                        style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                    <option value="">{{ __('Kategori Seçin') }}</option>
                                    @foreach($categories->whereNull('parent_id') as $category)
                                        <option value="{{ $category->id }}" data-has-subcategories="{{ $category->children->count() > 0 ? 'true' : 'false' }}">
                                            {{ $category->getTranslation('name', app()->getLocale()) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="subcategory-wrapper" style="display: none;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    @if(app()->getLocale() == 'tr')
                                        Alt Kategori
                                    @else
                                        Subcategory
                                    @endif
                                    <span style="color: var(--primary);">*</span>
                                </label>
                                <select name="subcategory_id" id="subcategory_id"
                                        style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                    <option value="">{{ __('Alt Kategori Seçin') }}</option>
                                </select>
                            </div>

                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    @if(app()->getLocale() == 'tr')
                                        Marka
                                    @else
                                        Brand
                                    @endif
                                    <span style="color: var(--primary);">*</span>
                                </label>
                                <select name="brand_id" required
                                        style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                    <option value="">{{ __('Marka Seçin') }}</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Condition & Price -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Durum') }} <span style="color: var(--primary);">*</span>
                                </label>
                                <select name="condition" required
                                        style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                    <option value="new">{{ __('Yeni') }}</option>
                                    <option value="used">{{ __('2. El') }}</option>
                                    <option value="refurbished">{{ __('Yenilenmiş') }}</option>
                                </select>
                            </div>

                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Fiyat') }} <span style="color: var(--primary);">*</span>
                                </label>
                                <input type="number" name="price" required min="0" step="0.01"
                                       placeholder="125000"
                                       style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            </div>

                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Para Birimi') }} <span style="color: var(--primary);">*</span>
                                </label>
                                <select name="currency" required
                                        style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                                    <option value="TRY">₺ TRY</option>
                                    <option value="USD">$ USD</option>
                                    <option value="EUR">€ EUR</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location -->
                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                {{ __('Konum') }} <span style="color: var(--primary);">*</span>
                            </label>
                            <input type="text" name="location" required
                                   placeholder="{{ __('Örn: İstanbul, Pendik') }}"
                                   style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('İletişim Bilgileri') }}
                        </h2>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('Telefon') }} <span style="color: var(--primary);">*</span>
                                </label>
                                <input type="tel" name="contact_phone" required
                                       placeholder="+90 555 123 45 67"
                                       style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            </div>

                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                    {{ __('E-posta') }} <span style="color: var(--primary);">*</span>
                                </label>
                                <input type="email" name="contact_email" required
                                       placeholder="ornek@email.com"
                                       style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            </div>
                        </div>

                        <div style="margin-bottom: 0;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                {{ __('WhatsApp Numarası') }}
                            </label>
                            <input type="tel" name="contact_whatsapp"
                                   placeholder="+90 555 123 45 67"
                                   style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 15px;">
                            <p style="font-size: 13px; color: var(--text-light); margin-top: 5px;">
                                <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                                {{ __('WhatsApp üzerinden iletişim için') }}
                            </p>
                        </div>
                    </div>

                    <!-- Images Upload -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('Görseller') }}
                        </h2>

                        <div style="border: 3px dashed var(--border); border-radius: 12px; padding: 60px 30px; text-align: center; background: var(--bg-light); cursor: pointer;" onclick="document.getElementById('images').click()">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 64px; color: var(--primary); margin-bottom: 20px;"></i>
                            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">
                                {{ __('Görselleri Sürükleyin veya Tıklayın') }}
                            </h3>
                            <p style="color: var(--text-light); margin-bottom: 20px;">
                                {{ __('En fazla 10 görsel yükleyebilirsiniz (Her biri max 5MB)') }}
                            </p>
                            <input type="file" id="images" name="images[]" multiple accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-primary" onclick="event.stopPropagation(); document.getElementById('images').click();">
                                <i class="fas fa-folder-open"></i>
                                {{ __('Dosya Seç') }}
                            </button>
                        </div>

                        <div id="image-preview" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 15px; margin-top: 25px;">
                            <!-- Preview images will be added here -->
                        </div>
                    </div>

                    <!-- Additional Options -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark);">
                            {{ __('Ek Seçenekler') }}
                        </h2>

                        <div style="display: flex; align-items: center; gap: 15px; padding: 20px; background: var(--bg-light); border-radius: 8px; margin-bottom: 15px;">
                            <input type="checkbox" name="is_featured" id="is_featured" style="width: 20px; height: 20px; cursor: pointer;">
                            <label for="is_featured" style="font-weight: 600; cursor: pointer; flex: 1;">
                                <i class="fas fa-star" style="color: var(--warning);"></i>
                                {{ __('İlanımı öne çıkar') }}
                                <span style="display: block; font-size: 13px; color: var(--text-light); font-weight: 400; margin-top: 5px;">
                                {{ __('Öne çıkan ilanlar daha fazla görüntülenir') }}
                            </span>
                            </label>
                            <span style="background: var(--success); color: white; padding: 6px 15px; border-radius: 6px; font-weight: 600; font-size: 14px;">
                            {{ __('Ücretsiz') }}
                        </span>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <div style="display: flex; gap: 15px; justify-content: flex-end;">
                            <a href="{{ route('listings.index') }}" class="btn btn-outline" style="padding: 15px 40px;">
                                {{ __('İptal') }}
                            </a>
                            <button type="submit" name="status" value="draft" class="btn" style="background: var(--text-light); color: white; padding: 15px 40px;">
                                <i class="fas fa-save"></i>
                                {{ __('Taslak Olarak Kaydet') }}
                            </button>
                            <button type="submit" name="status" value="published" class="btn btn-primary" style="padding: 15px 40px;">
                                <i class="fas fa-check-circle"></i>
                                {{ __('Yayınla') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .lang-tab.active {
            color: var(--primary) !important;
            border-bottom: 3px solid var(--primary) !important;
        }

        .lang-tab:hover {
            color: var(--primary) !important;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary) !important;
        }

        /* Image Preview Styles */
        .image-preview-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 1;
        }

        .image-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-preview-item button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: var(--primary);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            div[style*="grid-template-columns: 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Subcategory loading data
        const subcategoriesData = @json($categories->whereNull('parent_id')->mapWithKeys(function($category) {
            return [$category->id => $category->children->map(function($sub) {
                return [
                    'id' => $sub->id,
                    'name' => $sub->getTranslation('name', app()->getLocale())
                ];
            })];
        }));

        // Language Tab Switching
        document.querySelectorAll('.lang-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const lang = this.dataset.lang;

                // Update tabs
                document.querySelectorAll('.lang-tab').forEach(t => {
                    t.classList.remove('active');
                    t.style.color = 'var(--text-light)';
                    t.style.borderBottom = 'none';
                });
                this.classList.add('active');
                this.style.color = 'var(--primary)';
                this.style.borderBottom = '3px solid var(--primary)';

                // Update content
                document.querySelectorAll('.lang-content').forEach(content => {
                    content.style.display = content.dataset.lang === lang ? 'block' : 'none';
                });
            });
        });

        // Category change handler
        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const hasSubcategories = selectedOption.dataset.hasSubcategories === 'true';

            const categoryGrid = document.getElementById('category-grid');
            const subcategoryWrapper = document.getElementById('subcategory-wrapper');
            const subcategorySelect = document.getElementById('subcategory_id');

            // Clear subcategory options
            subcategorySelect.innerHTML = '<option value="">{{ __("Alt Kategori Seçin") }}</option>';

            if (hasSubcategories && categoryId && subcategoriesData[categoryId]) {
                // Show subcategory field
                subcategoryWrapper.style.display = 'block';
                subcategorySelect.required = true;

                // Adjust grid layout
                categoryGrid.style.gridTemplateColumns = '1fr 1fr 1fr';

                // Populate subcategories
                subcategoriesData[categoryId].forEach(function(subcategory) {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            } else {
                // Hide subcategory field
                subcategoryWrapper.style.display = 'none';
                subcategorySelect.required = false;

                // Adjust grid layout
                categoryGrid.style.gridTemplateColumns = '1fr 1fr';
            }
        });

        // Image Preview
        document.getElementById('images').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            Array.from(e.target.files).forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'image-preview-item';
                        div.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}">
                        <button type="button" onclick="removeImage(this)">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                        preview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        function removeImage(btn) {
            btn.parentElement.remove();
        }
    </script>
@endpush
