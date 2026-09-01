<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_element_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-element-dagilimi',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-element-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-element-dagilimi-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-element-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-element-dagilimi">
        <div class="hc-header">
            <h3>Doğum Haritası Element Dağılımı Hesaplama</h3>
            <p class="hc-subtitle">Tüm gezegenlerinizin ve Yükselen burcunuzun Ateş, Toprak, Hava ve Su elementlerindeki ağırlıklı dağılımını ve mizaç dengesini analiz edin.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-elem-date">Doğum Tarihi *</label>
                <input type="date" id="hc-elem-date" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-elem-time">Doğum Saati</label>
                <input type="time" id="hc-elem-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-elem-city">Doğum Şehri</label>
                <select id="hc-elem-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcElementDagilimiHesapla()">🔥 Element Dağılımını Hesapla</button>

        <div class="hc-result" id="hc-element-dagilimi-result">
            <div class="hc-elem-hero" id="hc-elem-hero"></div>

            <div class="hc-elem-section">
                <h4 class="hc-elem-sec-title">📊 Element Dağılım Oranları ve Bar Grafiği</h4>
                <div class="hc-element-bars" id="hc-element-bars"></div>
            </div>

            <div class="hc-elem-section">
                <h4 class="hc-elem-sec-title">🪐 Gezegenlerin Element Yerleşim Tablosu</h4>
                <div id="hc-elem-planets-table"></div>
            </div>

            <div class="hc-elem-section">
                <h4 class="hc-elem-sec-title">👑 Mizaç ve Denge Analizi</h4>
                <div id="hc-element-desc" class="hc-element-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
