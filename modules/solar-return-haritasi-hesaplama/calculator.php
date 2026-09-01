<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_solar_return_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-return',
        HC_PLUGIN_URL . 'modules/solar-return-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-return-css',
        HC_PLUGIN_URL . 'modules/solar-return-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-return">
        <div class="hc-header">
            <h3>Solar Return (Güneş Dönüşü Yıllık Harita) Hesaplama</h3>
            <p class="hc-subtitle">Güneşinizin doğum derecesine döndüğü tam anı hesaplayarak yeni yaşınızın yıllık temasını, Yıllık Yükselen burcunuzu ve ana fırsatlarını keşfedin.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-sr-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-sr-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-sr-year">Dönüş Yılı (Yeni Yaşınız) *</label>
                <input type="number" id="hc-sr-year" class="hc-input" value="2026" min="1900" max="2100" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-sr-city">Doğum / Yaşanan Şehir</label>
                <select id="hc-sr-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcSolarReturnHesapla()">☀️ Yıllık Güneş Dönüş Haritasını Hesapla</button>

        <div class="hc-result" id="hc-solar-return-result">
            <div class="hc-sr-hero" id="hc-sr-hero"></div>

            <div class="hc-sr-section">
                <h4 class="hc-sr-sec-title">🪐 Yıllık Solar Return Gezegen Dizilimi</h4>
                <div id="hc-sr-table-container"></div>
            </div>

            <div class="hc-sr-section">
                <h4 class="hc-sr-sec-title">🎯 Yeni Yaşınızın Yıllık Odak Noktaları</h4>
                <div id="hc-sr-details" class="hc-sr-details"></div>
            </div>
        </div>
    </div>
    <?php
}
