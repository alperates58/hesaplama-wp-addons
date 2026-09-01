<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_natal_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-natal-calc',
        HC_PLUGIN_URL . 'modules/natal-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-natal-calc-css',
        HC_PLUGIN_URL . 'modules/natal-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-natal-harita-hesaplama">
        <div class="hc-header">
            <h3>Natal (Doğum) Haritası Hesaplama ve Yaşam Potansiyeli Analizi</h3>
            <p class="hc-subtitle">Doğum anınızdaki gökyüzü konumunu, Büyük Üçlünüzü (Güneş, Ay, Yükselen), 10 gezegen yerleşiminizi ve element dengenizi keşfedin.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-natal-date">Doğum Tarihi *</label>
                <input type="date" id="hc-natal-date" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-natal-time">Doğum Saati *</label>
                <input type="time" id="hc-natal-time" value="12:00" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-natal-city">Doğum Şehri *</label>
                <select id="hc-natal-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcNatalHesapla()">✨ Natal Haritamı Hesapla ve Analiz Et</button>

        <div class="hc-result" id="hc-natal-result">
            <div class="hc-big-three-grid" id="hc-natal-big-three"></div>
            <div class="hc-balance-bar-row" id="hc-natal-balance"></div>

            <div class="hc-chart-section">
                <h4 class="hc-chart-sec-title">🪐 Gezegen Yerleşimleri ve Ev Konumları</h4>
                <div id="hc-natal-planets-table"></div>
            </div>

            <div class="hc-chart-section">
                <h4 class="hc-chart-sec-title">🔮 Natal Harita Potansiyel Özeti</h4>
                <div id="hc-natal-desc" class="hc-chart-summary"></div>
            </div>
        </div>
    </div>
    <?php
}
