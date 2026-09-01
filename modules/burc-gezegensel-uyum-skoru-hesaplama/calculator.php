<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_gezegensel_uyum_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gezegensel-skor',
        HC_PLUGIN_URL . 'modules/burc-gezegensel-uyum-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gezegensel-skor-css',
        HC_PLUGIN_URL . 'modules/burc-gezegensel-uyum-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegensel-skor">
        <div class="hc-header">
            <h3>Genel Gezegensel Uyum Skoru Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihi, saati ve şehirlerinizi girin; Güneş (Öz), Ay (Duygu), Yükselen (İmaj), Venüs (Aşk) ve Mars (Tutku) yerleşimleriniz otomatik hesaplanarak büyük uyum skorunuz çıkarılsın.</p>
        </div>

        <div class="hc-bg-persons-grid">
            <!-- 1. Kişi -->
            <div class="hc-bg-person-box">
                <div class="hc-bg-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-bg-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-bg-d1" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-bg-t1">Doğum Saati</label>
                    <input type="time" id="hc-bg-t1" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-bg-c1">Doğum Şehri</label>
                    <select id="hc-bg-c1" class="hc-input">
                        <option value="41.0082,28.9784" selected>İstanbul</option>
                        <option value="39.9334,32.8597">Ankara</option>
                        <option value="38.4237,27.1428">İzmir</option>
                        <option value="37.0000,35.3213">Adana</option>
                        <option value="36.8969,30.7133">Antalya</option>
                        <option value="40.1824,29.0667">Bursa</option>
                        <option value="37.0662,37.3833">Gaziantep</option>
                        <option value="37.8714,32.4846">Konya</option>
                        <option value="38.7312,35.4787">Kayseri</option>
                        <option value="41.2867,36.3300">Samsun</option>
                        <option value="37.7765,29.0864">Denizli</option>
                        <option value="37.9144,40.2110">Diyarbakır</option>
                        <option value="40.7569,30.3789">Sakarya</option>
                        <option value="38.3552,38.3095">Malatya</option>
                        <option value="41.0027,39.7168">Trabzon</option>
                        <option value="37.1591,38.7969">Şanlıurfa</option>
                    </select>
                </div>
            </div>

            <!-- 2. Kişi -->
            <div class="hc-bg-person-box">
                <div class="hc-bg-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-bg-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-bg-d2" value="1996-09-20" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-bg-t2">Doğum Saati</label>
                    <input type="time" id="hc-bg-t2" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-bg-c2">Doğum Şehri</label>
                    <select id="hc-bg-c2" class="hc-input">
                        <option value="41.0082,28.9784">İstanbul</option>
                        <option value="39.9334,32.8597" selected>Ankara</option>
                        <option value="38.4237,27.1428">İzmir</option>
                        <option value="37.0000,35.3213">Adana</option>
                        <option value="36.8969,30.7133">Antalya</option>
                        <option value="40.1824,29.0667">Bursa</option>
                        <option value="37.0662,37.3833">Gaziantep</option>
                        <option value="37.8714,32.4846">Konya</option>
                        <option value="38.7312,35.4787">Kayseri</option>
                        <option value="41.2867,36.3300">Samsun</option>
                        <option value="37.7765,29.0864">Denizli</option>
                        <option value="37.9144,40.2110">Diyarbakır</option>
                        <option value="40.7569,30.3789">Sakarya</option>
                        <option value="38.3552,38.3095">Malatya</option>
                        <option value="41.0027,39.7168">Trabzon</option>
                        <option value="37.1591,38.7969">Şanlıurfa</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcGezegenselSkorHesapla()">✨ Gezegensel Uyum Skorunu Hesapla</button>

        <div class="hc-result" id="hc-gs-result">
            <div class="hc-bg-hero" id="hc-bg-hero"></div>

            <div class="hc-bg-section">
                <h4 class="hc-bg-sec-title">🪐 Karşılaştırmalı Gezegen ve Burç Yerleşimleri</h4>
                <div class="hc-bg-planets-grid" id="hc-bg-planets-comp"></div>
            </div>

            <div class="hc-bg-section">
                <h4 class="hc-bg-sec-title">📊 Gezegensel Katman Skorları</h4>
                <div class="hc-bg-layers-list" id="hc-bg-layers"></div>
            </div>

            <div class="hc-bg-section">
                <h4 class="hc-bg-sec-title">📖 Kapsamlı Astroloji ve Uyum Raporu</h4>
                <div class="hc-result-content" id="hc-gs-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
