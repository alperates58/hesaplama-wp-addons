<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yildiz_haritasi_dogum_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sans-noktasi',
        HC_PLUGIN_URL . 'modules/yildiz-haritasi-dogum-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sans-noktasi-css',
        HC_PLUGIN_URL . 'modules/yildiz-haritasi-dogum-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sans-noktasi">
        <div class="hc-header">
            <h3>Şans Noktası (Pars Fortunae) Analizi</h3>
            <p>Ruhsal ve maddi bolluğun haritanızdaki kapısını bulun. Şansınız nerede saklı?</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label>Güneş Burcu</label>
                <select id="hc-sn-sun-sign" class="hc-input">
                    <option value="0">Koç</option><option value="30">Boğa</option><option value="60">İkizler</option>
                    <option value="90">Yengeç</option><option value="120">Aslan</option><option value="150">Başak</option>
                    <option value="180">Terazi</option><option value="210">Akrep</option><option value="240">Yay</option>
                    <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                </select>
                <input type="number" id="hc-sn-sun-deg" class="hc-input" placeholder="Derece (0-29)" min="0" max="29">
            </div>
            <div class="hc-form-group">
                <label>Ay Burcu</label>
                <select id="hc-sn-moon-sign" class="hc-input">
                    <option value="0">Koç</option><option value="30">Boğa</option><option value="60">İkizler</option>
                    <option value="90">Yengeç</option><option value="120">Aslan</option><option value="150">Başak</option>
                    <option value="180">Terazi</option><option value="210">Akrep</option><option value="240">Yay</option>
                    <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                </select>
                <input type="number" id="hc-sn-moon-deg" class="hc-input" placeholder="Derece (0-29)" min="0" max="29">
            </div>
        </div>
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label>Yükselen Burcu</label>
                <select id="hc-sn-asc-sign" class="hc-input">
                    <option value="0">Koç</option><option value="30">Boğa</option><option value="60">İkizler</option>
                    <option value="90">Yengeç</option><option value="120">Aslan</option><option value="150">Başak</option>
                    <option value="180">Terazi</option><option value="210">Akrep</option><option value="240">Yay</option>
                    <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                </select>
                <input type="number" id="hc-sn-asc-deg" class="hc-input" placeholder="Derece (0-29)" min="0" max="29">
            </div>
            <div class="hc-form-group">
                <label>Doğum Zamanı</label>
                <select id="hc-sn-time" class="hc-input">
                    <option value="day">Gündüz Doğumu (Güneş Ufuk Üstünde)</option>
                    <option value="night">Gece Doğumu (Güneş Ufuk Altında)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSansNoktasiHesapla()">Şans Noktamı Hesapla</button>

        <div class="hc-result" id="hc-sn-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Şans Noktanız:</span>
                <span class="hc-result-value" id="hc-sn-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-sn-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
