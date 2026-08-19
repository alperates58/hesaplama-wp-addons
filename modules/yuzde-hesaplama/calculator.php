<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-hesaplama-js',
        HC_PLUGIN_URL . 'modules/yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-hesaplama">
        <div class="hc-yh-header">
            <h3>Yüzde Hesaplama</h3>
            <p class="hc-yh-desc">İhtiyacınıza uygun hesaplama türünü seçin; anında sonuç, adım adım formül ve pratik tabloyu inceleyin.</p>
        </div>

        <!-- Sekmeler -->
        <div class="hc-yh-tabs" role="tablist">
            <button type="button" class="hc-yh-tab-btn active" role="tab" aria-selected="true" onclick="hcYhTab('sayi', this)">
                <span class="hc-yh-tab-icon">🔢</span>
                <span>Sayının Yüzdesi</span>
            </button>
            <button type="button" class="hc-yh-tab-btn" role="tab" aria-selected="false" onclick="hcYhTab('oran', this)">
                <span class="hc-yh-tab-icon">📊</span>
                <span>Yüzde Oranı</span>
            </button>
            <button type="button" class="hc-yh-tab-btn" role="tab" aria-selected="false" onclick="hcYhTab('degisim', this)">
                <span class="hc-yh-tab-icon">📈</span>
                <span>Yüzde Değişim</span>
            </button>
            <button type="button" class="hc-yh-tab-btn" role="tab" aria-selected="false" onclick="hcYhTab('ekle-cikar', this)">
                <span class="hc-yh-tab-icon">🏷️</span>
                <span>Yüzde Ekle / Çıkar</span>
            </button>
            <button type="button" class="hc-yh-tab-btn" role="tab" aria-selected="false" onclick="hcYhTab('ters', this)">
                <span class="hc-yh-tab-icon">🔄</span>
                <span>Tamamını Bul</span>
            </button>
        </div>

        <!-- Sekme 1: Sayının Yüzdesi (A'nın %B'si) -->
        <div id="hc-yh-panel-sayi" class="hc-yh-panel active">
            <div class="hc-yh-panel-lead">
                <strong>A</strong> sayısının <strong>% B</strong>'si kaçtır?
            </div>
            <div class="hc-yh-grid">
                <div class="hc-form-group">
                    <label for="hc-yh-p1-a">Sayı (A)</label>
                    <input type="number" id="hc-yh-p1-a" placeholder="Örn: 500" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaSayi()">
                </div>
                <div class="hc-form-group">
                    <label for="hc-yh-p1-b">Yüzde Oranı (% B)</label>
                    <input type="number" id="hc-yh-p1-b" placeholder="Örn: 20" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaSayi()">
                </div>
            </div>

            <!-- Hızlı Yüzde Çipleri -->
            <div class="hc-yh-quick-row">
                <span class="hc-yh-quick-label">Sık Kullanılanlar:</span>
                <div class="hc-yh-chips">
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(1)">%1</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(5)">%5</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(10)">%10</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(18)">%18</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(20)">%20</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(25)">%25</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP1B(50)">%50</button>
                </div>
            </div>

            <div class="hc-yh-btn-row">
                <button type="button" class="hc-btn" onclick="hcYhHesaplaSayi()">Hesapla</button>
                <button type="button" class="hc-yh-reset-btn" onclick="hcYhSifirla('sayi')">Temizle</button>
            </div>

            <!-- Sonuç 1 -->
            <div class="hc-result" id="hc-yh-res-sayi">
                <div class="hc-yh-res-box">
                    <div class="hc-yh-res-title" id="hc-yh-p1-title">Hesaplama Sonucu</div>
                    <div class="hc-yh-res-primary">
                        <span class="hc-yh-res-big" id="hc-yh-p1-main">-</span>
                        <button type="button" class="hc-yh-copy-btn" onclick="hcYhKopyala('hc-yh-p1-main')" title="Sonucu Kopyala">
                            📋 Kopyala
                        </button>
                    </div>
                </div>

                <div class="hc-yh-cards-row">
                    <div class="hc-yh-card hc-yh-card-success">
                        <span class="hc-yh-card-label">Yüzde Eklenmiş Hali (+Zam)</span>
                        <span class="hc-yh-card-value" id="hc-yh-p1-added">-</span>
                    </div>
                    <div class="hc-yh-card hc-yh-card-danger">
                        <span class="hc-yh-card-label">Yüzde Çıkarılmış Hali (-İndirim)</span>
                        <span class="hc-yh-card-value" id="hc-yh-p1-subbed">-</span>
                    </div>
                </div>

                <!-- Adım Adım Formül -->
                <div class="hc-yh-formula-box">
                    <div class="hc-yh-formula-head">📐 Adım Adım Formül</div>
                    <div class="hc-yh-formula-content" id="hc-yh-p1-formula">-</div>
                </div>

                <!-- Pratik Tablo -->
                <div class="hc-yh-table-box">
                    <div class="hc-yh-table-head">⚡ Girilen Sayının Pratik Yüzdeleri</div>
                    <div class="hc-yh-table-grid" id="hc-yh-p1-table"></div>
                </div>
            </div>
        </div>

        <!-- Sekme 2: Yüzde Oranı (A, B'nin yüzde kaçı?) -->
        <div id="hc-yh-panel-oran" class="hc-yh-panel" style="display:none;">
            <div class="hc-yh-panel-lead">
                <strong>A</strong> sayısı, <strong>B</strong> sayısının yüzde kaçıdır?
            </div>
            <div class="hc-yh-grid">
                <div class="hc-form-group">
                    <label for="hc-yh-p2-a">Parça Değer (A)</label>
                    <input type="number" id="hc-yh-p2-a" placeholder="Örn: 25" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaOran()">
                </div>
                <div class="hc-form-group">
                    <label for="hc-yh-p2-b">Toplam / Bütün Değer (B)</label>
                    <input type="number" id="hc-yh-p2-b" placeholder="Örn: 200" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaOran()">
                </div>
            </div>

            <div class="hc-yh-btn-row">
                <button type="button" class="hc-btn" onclick="hcYhHesaplaOran()">Hesapla</button>
                <button type="button" class="hc-yh-reset-btn" onclick="hcYhSifirla('oran')">Temizle</button>
            </div>

            <!-- Sonuç 2 -->
            <div class="hc-result" id="hc-yh-res-oran">
                <div class="hc-yh-res-box">
                    <div class="hc-yh-res-title" id="hc-yh-p2-title">Yüzde Oranı</div>
                    <div class="hc-yh-res-primary">
                        <span class="hc-yh-res-big" id="hc-yh-p2-main">-</span>
                        <button type="button" class="hc-yh-copy-btn" onclick="hcYhKopyala('hc-yh-p2-main')" title="Sonucu Kopyala">
                            📋 Kopyala
                        </button>
                    </div>
                </div>

                <!-- Oran Çubuğu -->
                <div class="hc-yh-bar-wrapper">
                    <div class="hc-yh-bar-labels">
                        <span id="hc-yh-p2-bar-pct">%0</span>
                        <span id="hc-yh-p2-bar-rem">%100 Kalan</span>
                    </div>
                    <div class="hc-yh-progress">
                        <div class="hc-yh-progress-fill" id="hc-yh-p2-bar" style="width: 0%;"></div>
                    </div>
                </div>

                <div class="hc-yh-cards-row">
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Kalan (Tamamlayıcı) Yüzde</span>
                        <span class="hc-yh-card-value" id="hc-yh-p2-kalan">-</span>
                    </div>
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Kesirsel Oran</span>
                        <span class="hc-yh-card-value" id="hc-yh-p2-kesir">-</span>
                    </div>
                </div>

                <!-- Adım Adım Formül -->
                <div class="hc-yh-formula-box">
                    <div class="hc-yh-formula-head">📐 Adım Adım Formül</div>
                    <div class="hc-yh-formula-content" id="hc-yh-p2-formula">-</div>
                </div>
            </div>
        </div>

        <!-- Sekme 3: Yüzde Değişim (Artış / Azalış) -->
        <div id="hc-yh-panel-degisim" class="hc-yh-panel" style="display:none;">
            <div class="hc-yh-panel-lead">
                <strong>A</strong> değerinden <strong>B</strong> değerine değişim yüzde kaçtır?
            </div>
            <div class="hc-yh-grid">
                <div class="hc-form-group">
                    <label for="hc-yh-p3-a">İlk / Eski Değer (A)</label>
                    <input type="number" id="hc-yh-p3-a" placeholder="Örn: 100" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaDegisim()">
                </div>
                <div class="hc-form-group">
                    <label for="hc-yh-p3-b">Son / Yeni Değer (B)</label>
                    <input type="number" id="hc-yh-p3-b" placeholder="Örn: 140" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaDegisim()">
                </div>
            </div>

            <div class="hc-yh-btn-row">
                <button type="button" class="hc-btn" onclick="hcYhHesaplaDegisim()">Hesapla</button>
                <button type="button" class="hc-yh-reset-btn" onclick="hcYhSifirla('degisim')">Temizle</button>
            </div>

            <!-- Sonuç 3 -->
            <div class="hc-result" id="hc-yh-res-degisim">
                <div class="hc-yh-res-box">
                    <div class="hc-yh-res-title">Değişim Oranı ve Yönü</div>
                    <div class="hc-yh-res-primary">
                        <span class="hc-yh-res-big" id="hc-yh-p3-main">-</span>
                        <button type="button" class="hc-yh-copy-btn" onclick="hcYhKopyala('hc-yh-p3-main')" title="Sonucu Kopyala">
                            📋 Kopyala
                        </button>
                    </div>
                </div>

                <div class="hc-yh-cards-row">
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Mutlak Sayısal Fark</span>
                        <span class="hc-yh-card-value" id="hc-yh-p3-fark">-</span>
                    </div>
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Değişim Çarpanı</span>
                        <span class="hc-yh-card-value" id="hc-yh-p3-kat">-</span>
                    </div>
                </div>

                <!-- Adım Adım Formül -->
                <div class="hc-yh-formula-box">
                    <div class="hc-yh-formula-head">📐 Adım Adım Formül</div>
                    <div class="hc-yh-formula-content" id="hc-yh-p3-formula">-</div>
                </div>
            </div>
        </div>

        <!-- Sekme 4: Yüzde Ekle / Çıkar (Zam & İndirim) -->
        <div id="hc-yh-panel-ekle-cikar" class="hc-yh-panel" style="display:none;">
            <div class="hc-yh-panel-lead">
                <strong>A</strong> tutarına <strong>% B</strong> oranında zam / indirim uygula:
            </div>
            <div class="hc-yh-grid">
                <div class="hc-form-group">
                    <label for="hc-yh-p4-a">Başlangıç Tutarı / Değeri</label>
                    <input type="number" id="hc-yh-p4-a" placeholder="Örn: 1000" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaEkleCikar()">
                </div>
                <div class="hc-form-group">
                    <label for="hc-yh-p4-b">Yüzde Oranı (%)</label>
                    <input type="number" id="hc-yh-p4-b" placeholder="Örn: 20" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaEkleCikar()">
                </div>
            </div>

            <div class="hc-form-group">
                <label>İşlem Türü</label>
                <div class="hc-yh-radio-group">
                    <label class="hc-yh-radio">
                        <input type="radio" name="hc-yh-p4-islem" value="ekle" checked>
                        <span>➕ Yüzde Ekle (Zam / KDV)</span>
                    </label>
                    <label class="hc-yh-radio">
                        <input type="radio" name="hc-yh-p4-islem" value="cikar">
                        <span>➖ Yüzde Çıkar (İndirim / İskonto)</span>
                    </label>
                </div>
            </div>

            <!-- Hızlı Yüzde Çipleri -->
            <div class="hc-yh-quick-row">
                <span class="hc-yh-quick-label">Sık Kullanılanlar:</span>
                <div class="hc-yh-chips">
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(1)">%1</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(10)">%10</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(18)">%18</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(20)">%20</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(25)">%25</button>
                    <button type="button" class="hc-yh-chip" onclick="hcYhSetP4B(50)">%50</button>
                </div>
            </div>

            <div class="hc-yh-btn-row">
                <button type="button" class="hc-btn" onclick="hcYhHesaplaEkleCikar()">Hesapla</button>
                <button type="button" class="hc-yh-reset-btn" onclick="hcYhSifirla('ekle-cikar')">Temizle</button>
            </div>

            <!-- Sonuç 4 -->
            <div class="hc-result" id="hc-yh-res-ekle-cikar">
                <div class="hc-yh-res-box">
                    <div class="hc-yh-res-title" id="hc-yh-p4-res-title">Hesaplanan Yeni Tutar</div>
                    <div class="hc-yh-res-primary">
                        <span class="hc-yh-res-big" id="hc-yh-p4-main">-</span>
                        <button type="button" class="hc-yh-copy-btn" onclick="hcYhKopyala('hc-yh-p4-main')" title="Sonucu Kopyala">
                            📋 Kopyala
                        </button>
                    </div>
                </div>

                <div class="hc-yh-cards-row">
                    <div class="hc-yh-card" id="hc-yh-p4-fark-card">
                        <span class="hc-yh-card-label" id="hc-yh-p4-fark-label">Uygulanan Fark Tutarı</span>
                        <span class="hc-yh-card-value" id="hc-yh-p4-fark">-</span>
                    </div>
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Orijinal Başlangıç Tutarı</span>
                        <span class="hc-yh-card-value" id="hc-yh-p4-orijinal">-</span>
                    </div>
                </div>

                <!-- Adım Adım Formül -->
                <div class="hc-yh-formula-box">
                    <div class="hc-yh-formula-head">📐 Adım Adım Formül</div>
                    <div class="hc-yh-formula-content" id="hc-yh-p4-formula">-</div>
                </div>
            </div>
        </div>

        <!-- Sekme 5: Tamamını Bul (Ters Yüzde) -->
        <div id="hc-yh-panel-ters" class="hc-yh-panel" style="display:none;">
            <div class="hc-yh-panel-lead">
                <strong>% A</strong>'sı <strong>B</strong> olan sayının tamamı (%100'ü) kaçtır?
            </div>
            <div class="hc-yh-grid">
                <div class="hc-form-group">
                    <label for="hc-yh-p5-a">Yüzde Oranı (% A)</label>
                    <input type="number" id="hc-yh-p5-a" placeholder="Örn: 20" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaTers()">
                </div>
                <div class="hc-form-group">
                    <label for="hc-yh-p5-b">Karşılık Gelen Değer (B)</label>
                    <input type="number" id="hc-yh-p5-b" placeholder="Örn: 50" step="any" onkeydown="if(event.key==='Enter') hcYhHesaplaTers()">
                </div>
            </div>

            <div class="hc-yh-btn-row">
                <button type="button" class="hc-btn" onclick="hcYhHesaplaTers()">Hesapla</button>
                <button type="button" class="hc-yh-reset-btn" onclick="hcYhSifirla('ters')">Temizle</button>
            </div>

            <!-- Sonuç 5 -->
            <div class="hc-result" id="hc-yh-res-ters">
                <div class="hc-yh-res-box">
                    <div class="hc-yh-res-title">Sayının Tamamı (%100)</div>
                    <div class="hc-yh-res-primary">
                        <span class="hc-yh-res-big" id="hc-yh-p5-main">-</span>
                        <button type="button" class="hc-yh-copy-btn" onclick="hcYhKopyala('hc-yh-p5-main')" title="Sonucu Kopyala">
                            📋 Kopyala
                        </button>
                    </div>
                </div>

                <div class="hc-yh-cards-row">
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Bilinen Parça Tutarı</span>
                        <span class="hc-yh-card-value" id="hc-yh-p5-parca">-</span>
                    </div>
                    <div class="hc-yh-card">
                        <span class="hc-yh-card-label">Parçanın Yüzde Oranı</span>
                        <span class="hc-yh-card-value" id="hc-yh-p5-oran">-</span>
                    </div>
                </div>

                <!-- Adım Adım Formül -->
                <div class="hc-yh-formula-box">
                    <div class="hc-yh-formula-head">📐 Adım Adım Formül</div>
                    <div class="hc-yh-formula-content" id="hc-yh-p5-formula">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

