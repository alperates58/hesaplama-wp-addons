<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurtlama_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yumurtlama-gunu-hesaplama',
        HC_PLUGIN_URL . 'modules/yumurtlama-gunu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yumurtlama-gunu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yumurtlama-gunu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yumurtlama-gunu-hesaplama" id="hc-yumurtlama-gunu-hesaplama">
        <div class="hc-header">
            <h3>Yumurtlama Günü (Ovülasyon) & En Doğurgan Günler Hesaplama</h3>
            <p class="hc-subtitle">Son adet tarihinizi ve döngü uzunluğunuzu girerek en yüksek gebe kalma şansına sahip olduğunuz 6 günlük doğurganlık pencerenizi hesaplayın.</p>
        </div>

        <div class="hc-yumurtlama-gunu-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-ygh-son-adet">Son Adet Tarihinin İlk Günü (SAT) *</label>
                <input type="date" id="hc-ygh-son-adet" class="hc-input" required />
            </div>

            <div class="hc-form-group">
                <label for="hc-ygh-dongu">Ortalama Adet Döngüsü Süreniz (Gün) *</label>
                <input type="number" id="hc-ygh-dongu" min="21" max="45" step="1" value="28" class="hc-input" placeholder="Örn: 28" required />
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcYumurtlamaGunuHesapla()">🌸 Doğurgan Günlerimi & Yumurtlama Tarihimi Hesapla</button>

        <div class="hc-result hc-yumurtlama-gunu-hesaplama-result" id="hc-ygh-result">
            <div class="hc-yumurtlama-gunu-hesaplama-hero">
                <span class="hc-yumurtlama-gunu-hesaplama-badge">En Yüksek Doğurganlık</span>
                <div>
                    <div class="hc-result-value" id="hc-ygh-ana-sonuc"></div>
                    <div class="hc-yumurtlama-gunu-hesaplama-subtitle" id="hc-ygh-ozet"></div>
                </div>
            </div>

            <div class="hc-fertility-window-box" id="hc-fertility-window-box"></div>

            <div class="hc-yumurtlama-gunu-hesaplama-cards">
                <div>
                    <span>6 Günlük Doğurganlık Aralığı</span>
                    <strong id="hc-ygh-dogurgan"></strong>
                </div>
                <div>
                    <span>Tahmini Yerleşme (İmplantasyon)</span>
                    <strong id="hc-ygh-implantasyon"></strong>
                </div>
                <div>
                    <span>Erken Gebelik Testi Tarihi</span>
                    <strong id="hc-ygh-test-tarihi"></strong>
                </div>
                <div>
                    <span>Sonraki Beklenen Adet Tarihi</span>
                    <strong id="hc-ygh-sonraki-adet"></strong>
                </div>
            </div>

            <p class="hc-yumurtlama-gunu-hesaplama-yorum" id="hc-ygh-yorum"></p>
            <p class="hc-yumurtlama-gunu-hesaplama-not">Bu hesaplama 14 günlük luteal faza dayalı bilimsel bir tahmindir. Doğal gebelik planlaması için LH ovülasyon testleri ve bazal vücut ısısı takibiyle desteklenmesi önerilir.</p>
        </div>
    </div>
    <?php
}
