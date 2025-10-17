@extends('layouts.app')

@section('title', __('İletişim') . ' - MachinePazar')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); padding: 80px 0; color: white;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h1 style="font-size: 48px; font-weight: 800; margin-bottom: 20px;">
                    {{ __('İletişim') }}
                </h1>
                <p style="font-size: 20px; opacity: 0.95;">
                    @if(app()->getLocale() == 'tr')
                        Size nasıl yardımcı olabiliriz? Bize ulaşın
                    @else
                        How can we help you? Contact us
                    @endif
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section style="padding: 80px 0; background: white;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; margin-bottom: 80px;">
                <!-- Phone -->
                <div style="background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%); border-radius: 16px; padding: 40px; text-align: center; color: white; box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3); transition: all 0.3s;">
                    <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; backdrop-filter: blur(10px);">
                        <i class="fas fa-phone" style="font-size: 36px;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('Telefon') }}</h3>
                    <p style="opacity: 0.9; margin-bottom: 15px; font-size: 15px;">
                        @if(app()->getLocale() == 'tr')
                            7/24 Müşteri Hizmetleri
                        @else
                            24/7 Customer Service
                        @endif
                    </p>
                    <a href="tel:+905551234567" style="color: white; text-decoration: none; font-size: 18px; font-weight: 600; display: block;">
                        +90 555 123 45 67
                    </a>
                </div>

                <!-- WhatsApp -->
                <div style="background: linear-gradient(135deg, #25D366 0%, #20BA5A 100%); border-radius: 16px; padding: 40px; text-align: center; color: white; box-shadow: 0 10px 30px rgba(37, 211, 102, 0.3); transition: all 0.3s;">
                    <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; backdrop-filter: blur(10px);">
                        <i class="fab fa-whatsapp" style="font-size: 36px;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">WhatsApp</h3>
                    <p style="opacity: 0.9; margin-bottom: 15px; font-size: 15px;">
                        @if(app()->getLocale() == 'tr')
                            Anında Destek
                        @else
                            Instant Support
                        @endif
                    </p>
                    <a href="https://wa.me/905551234567" target="_blank" style="color: white; text-decoration: none; font-size: 18px; font-weight: 600; display: block;">
                        +90 555 123 45 67
                    </a>
                </div>

                <!-- Email -->
                <div style="background: linear-gradient(135deg, #004E89 0%, #1E6BA8 100%); border-radius: 16px; padding: 40px; text-align: center; color: white; box-shadow: 0 10px 30px rgba(0, 78, 137, 0.3); transition: all 0.3s;">
                    <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; backdrop-filter: blur(10px);">
                        <i class="fas fa-envelope" style="font-size: 36px;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">Email</h3>
                    <p style="opacity: 0.9; margin-bottom: 15px; font-size: 15px;">
                        @if(app()->getLocale() == 'tr')
                            Sorularınız için
                        @else
                            For your questions
                        @endif
                    </p>
                    <a href="mailto:info@makinepazari.com" style="color: white; text-decoration: none; font-size: 18px; font-weight: 600; display: block;">
                        info@makinepazari.com
                    </a>
                </div>

                <!-- Address -->
                <div style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border-radius: 16px; padding: 40px; text-align: center; color: white; box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3); transition: all 0.3s;">
                    <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; backdrop-filter: blur(10px);">
                        <i class="fas fa-map-marker-alt" style="font-size: 36px;"></i>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">{{ __('Adres') }}</h3>
                    <p style="opacity: 0.9; margin-bottom: 15px; font-size: 15px;">
                        @if(app()->getLocale() == 'tr')
                            Ofis Adresimiz
                        @else
                            Our Office Address
                        @endif
                    </p>
                    <p style="font-size: 16px; font-weight: 500; line-height: 1.6;">
                        Pendik, İstanbul<br>Türkiye
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map -->
    <section style="padding: 80px 0; background: var(--bg-light);">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
                <!-- Contact Form -->
                <div>
                    <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px; color: var(--text-dark);">
                        @if(app()->getLocale() == 'tr')
                            Bize Mesaj Gönderin
                        @else
                            Send Us a Message
                        @endif
                    </h2>
                    <p style="color: var(--text-light); margin-bottom: 40px; font-size: 17px;">
                        @if(app()->getLocale() == 'tr')
                            Aşağıdaki formu doldurarak bize ulaşabilirsiniz. En kısa sürede size dönüş yapacağız.
                        @else
                            You can contact us by filling out the form below. We will get back to you as soon as possible.
                        @endif
                    </p>

                    @if(session('success'))
                        <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Adınız Soyadınız
                                @else
                                    Your Name
                                @endif
                                <span style="color: var(--primary);">*</span>
                            </label>
                            <input type="text" name="name" required
                                   placeholder="@if(app()->getLocale() == 'tr') Örn: Ahmet Yılmaz @else Ex: John Doe @endif"
                                   style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 16px; transition: all 0.3s;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                Email <span style="color: var(--primary);">*</span>
                            </label>
                            <input type="email" name="email" required
                                   placeholder="ornek@email.com"
                                   style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 16px; transition: all 0.3s;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                {{ __('Telefon') }}
                            </label>
                            <input type="tel" name="phone"
                                   placeholder="+90 555 123 45 67"
                                   style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 16px; transition: all 0.3s;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Konu
                                @else
                                    Subject
                                @endif
                                <span style="color: var(--primary);">*</span>
                            </label>
                            <select name="subject" required
                                    style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 16px; transition: all 0.3s;">
                                <option value="">
                                    @if(app()->getLocale() == 'tr')
                                        Konu Seçin
                                    @else
                                        Select Subject
                                    @endif
                                </option>
                                <option value="general">
                                    @if(app()->getLocale() == 'tr')
                                        Genel Bilgi
                                    @else
                                        General Information
                                    @endif
                                </option>
                                <option value="listing">
                                    @if(app()->getLocale() == 'tr')
                                        İlan Hakkında
                                    @else
                                        About Listing
                                    @endif
                                </option>
                                <option value="support">
                                    @if(app()->getLocale() == 'tr')
                                        Teknik Destek
                                    @else
                                        Technical Support
                                    @endif
                                </option>
                                <option value="partnership">
                                    @if(app()->getLocale() == 'tr')
                                        İş Birliği
                                    @else
                                        Partnership
                                    @endif
                                </option>
                                <option value="complaint">
                                    @if(app()->getLocale() == 'tr')
                                        Şikayet
                                    @else
                                        Complaint
                                    @endif
                                </option>
                            </select>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Mesajınız
                                @else
                                    Your Message
                                @endif
                                <span style="color: var(--primary);">*</span>
                            </label>
                            <textarea name="message" required rows="6"
                                      placeholder="@if(app()->getLocale() == 'tr') Mesajınızı buraya yazın... @else Write your message here... @endif"
                                      style="width: 100%; padding: 15px; border: 2px solid var(--border); border-radius: 8px; font-size: 16px; resize: vertical; transition: all 0.3s;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 16px; font-size: 17px;">
                            <i class="fas fa-paper-plane"></i>
                            @if(app()->getLocale() == 'tr')
                                Mesajı Gönder
                            @else
                                Send Message
                            @endif
                        </button>
                    </form>
                </div>

                <!-- Map & Info -->
                <div>
                    <div style="background: white; border-radius: 16px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
                        <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 20px; color: var(--text-dark);">
                            @if(app()->getLocale() == 'tr')
                                Çalışma Saatlerimiz
                            @else
                                Working Hours
                            @endif
                        </h3>
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                            <span style="font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Pazartesi - Cuma
                                @else
                                    Monday - Friday
                                @endif
                            </span>
                                <span style="color: var(--text-light);">09:00 - 18:00</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                            <span style="font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Cumartesi
                                @else
                                    Saturday
                                @endif
                            </span>
                                <span style="color: var(--text-light);">10:00 - 16:00</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 12px 0;">
                            <span style="font-weight: 600; color: var(--text-dark);">
                                @if(app()->getLocale() == 'tr')
                                    Pazar
                                @else
                                    Sunday
                                @endif
                            </span>
                                <span style="color: var(--primary); font-weight: 600;">
                                @if(app()->getLocale() == 'tr')
                                        Kapalı
                                    @else
                                        Closed
                                    @endif
                            </span>
                            </div>
                        </div>

                        <div style="margin-top: 30px; padding-top: 30px; border-top: 2px solid var(--border);">
                            <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                                <i class="fas fa-info-circle" style="color: var(--primary);"></i>
                                @if(app()->getLocale() == 'tr')
                                    WhatsApp ve Email desteğimiz 7/24 aktiftir. Acil durumlar için bize her zaman ulaşabilirsiniz.
                                @else
                                    Our WhatsApp and Email support is active 24/7. You can always reach us for emergencies.
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Map -->
                    <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <div style="background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); height: 350px; display: flex; align-items: center; justify-content: center; flex-direction: column; color: white;">
                            <i class="fas fa-map-marked-alt" style="font-size: 64px; margin-bottom: 20px; opacity: 0.9;"></i>
                            <h3 style="font-size: 24px; font-weight: 700;">
                                @if(app()->getLocale() == 'tr')
                                    Harita Yakında Eklenecek
                                @else
                                    Map Coming Soon
                                @endif
                            </h3>
                            <p style="opacity: 0.9; margin-top: 10px;">İstanbul, Pendik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section style="padding: 80px 0; background: white;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 15px;">
                    @if(app()->getLocale() == 'tr')
                        Sık Sorulan Sorular
                    @else
                        Frequently Asked Questions
                    @endif
                </h2>
                <p style="color: var(--text-light); font-size: 18px;">
                    @if(app()->getLocale() == 'tr')
                        En çok merak edilen sorular ve cevapları
                    @else
                        Most frequently asked questions and answers
                    @endif
                </p>
            </div>

            <div style="max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 20px;">
                <details style="background: var(--bg-light); border-radius: 12px; padding: 25px; cursor: pointer; border: 2px solid var(--border);">
                    <summary style="font-weight: 700; font-size: 18px; color: var(--text-dark);">
                        @if(app()->getLocale() == 'tr')
                            İlan vermek ücretli mi?
                        @else
                            Is posting listings free?
                        @endif
                    </summary>
                    <p style="margin-top: 15px; color: var(--text-light); line-height: 1.8;">
                        @if(app()->getLocale() == 'tr')
                            Hayır, platformumuzda ilan vermek tamamen ücretsizdir. Dilediğiniz kadar ilan yayınlayabilirsiniz.
                        @else
                            No, posting listings on our platform is completely free. You can publish as many listings as you want.
                        @endif
                    </p>
                </details>

                <details style="background: var(--bg-light); border-radius: 12px; padding: 25px; cursor: pointer; border: 2px solid var(--border);">
                    <summary style="font-weight: 700; font-size: 18px; color: var(--text-dark);">
                        @if(app()->getLocale() == 'tr')
                            İlanım ne kadar sürede yayınlanır?
                        @else
                            How long does it take for my listing to be published?
                        @endif
                    </summary>
                    <p style="margin-top: 15px; color: var(--text-light); line-height: 1.8;">
                        @if(app()->getLocale() == 'tr')
                            İlanınız gönderdiğiniz anda otomatik olarak yayınlanır. Moderasyon süreci 24 saat içinde tamamlanır.
                        @else
                            Your listing is automatically published as soon as you submit it. The moderation process is completed within 24 hours.
                        @endif
                    </p>
                </details>

                <details style="background: var(--bg-light); border-radius: 12px; padding: 25px; cursor: pointer; border: 2px solid var(--border);">
                    <summary style="font-weight: 700; font-size: 18px; color: var(--text-dark);">
                        @if(app()->getLocale() == 'tr')
                            Güvenli alışveriş nasıl sağlanıyor?
                        @else
                            How is safe shopping ensured?
                        @endif
                    </summary>
                    <p style="margin-top: 15px; color: var(--text-light); line-height: 1.8;">
                        @if(app()->getLocale() == 'tr')
                            Tüm ilanlar moderasyondan geçer. Satıcılar ve alıcılar değerlendirme sistemi ile güvenilirlik kazanır.
                        @else
                            All listings go through moderation. Sellers and buyers gain credibility through a rating system.
                        @endif
                    </p>
                </details>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary) !important;
        }

        details summary {
            list-style: none;
        }

        details summary::-webkit-details-marker {
            display: none;
        }

        details summary::after {
            content: '+';
            float: right;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
        }

        details[open] summary::after {
            content: '−';
        }

        details[open] {
            border-color: var(--primary) !important;
        }

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
