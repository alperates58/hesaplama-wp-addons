<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harita_tipi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-harita-tipi',
        HC_PLUGIN_URL . 'modules/harita-tipi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-harita-tipi-css',
        HC_PLUGIN_URL . 'modules/harita-tipi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-harita-tipi">
        <div class="hc-header">
            <h3>Astrolojik Harita Tipi ve Gezegen Dağılım Modeli Analizi</h3>
            <p class="hc-subtitle">Marc Edmund Jones sistemine göre 10 gezegeninizin gökyüzündeki yerleşim geometrisini (Çanak, Kova, Lokomotif, Demet, Salıncak, Dağılım) ve hayat stratejinizi hesaplayın.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-ht-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-ht-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-ht-time">Doğum Saati</label>
                <input type="time" id="hc-ht-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-ht-city">Doğum Şehri</label>
                <select id="hc-ht-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcHaritaTipiHesapla()">🪐 Harita Tipimi ve Dağılım Modelini Hesapla</button>

        <div class="hc-result" id="hc-ht-result">
            <div class="hc-ht-hero" id="hc-ht-hero"></div>

            <div class="hc-ht-section">
                <h4 class="hc-ht-sec-title">🪐 Gezegen Dağılımı ve Eksen Konumları</h4>
                <div id="hc-ht-planets-table"></div>
            </div>

            <div class="hc-ht-section">
                <h4 class="hc-ht-sec-title">🎯 Hayat Stratejiniz ve Enerji Yönetimi Analizi</h4>
                <div id="hc-ht-desc" class="hc-ht-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
