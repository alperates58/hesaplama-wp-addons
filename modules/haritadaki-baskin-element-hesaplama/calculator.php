<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_element_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-element',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-element-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-element-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-element-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-element">
        <div class="hc-header">
            <h3>Haritadaki Baskın Element ve Mizaç Analizi</h3>
            <p class="hc-subtitle">Doğum haritanızdaki 10 gezegen ve Yükselen yerleşiminizin Ateş, Toprak, Hava ve Su elementleri arasındaki dağılımını, baskın mizacınızı ve eksik element dengenizi hesaplayın.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-be-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-be-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-be-time">Doğum Saati</label>
                <input type="time" id="hc-be-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-be-city">Doğum Şehri</label>
                <select id="hc-be-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcBaskinElementHesapla()">🔥 Baskın Elementimi ve Mizaç Tablomu Hesapla</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-be-hero" id="hc-be-hero"></div>

            <div class="hc-be-section">
                <h4 class="hc-be-sec-title">📊 4 Elementin Ağırlık Dağılımı</h4>
                <div id="hc-be-bars" class="hc-be-bars-grid"></div>
            </div>

            <div class="hc-be-section">
                <h4 class="hc-be-sec-title">👑 Mizaç ve Dengeleme Rehberi</h4>
                <div id="hc-be-desc" class="hc-be-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
