<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-burc',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-burc-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-burc">
        <div class="hc-header">
            <h3>Haritadaki Baskın Burç ve İmza Burcu Analizi</h3>
            <p class="hc-subtitle">Güneş burcunuzun ötesinde, haritanızdaki element ve nitelik sentezinden doğan "İmza Burcunuzu" (Signature Sign) ve en güçlü 3 burcunuzu hesaplayın.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-bb-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-bb-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-bb-time">Doğum Saati</label>
                <input type="time" id="hc-bb-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-bb-city">Doğum Şehri</label>
                <select id="hc-bb-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcBaskinBurcHesapla()">✨ Baskın Burcumu ve İmza Burcumu Hesapla</button>

        <div class="hc-result" id="hc-bb-result">
            <div class="hc-bb-hero" id="hc-bb-hero"></div>

            <div class="hc-bb-section">
                <h4 class="hc-bb-sec-title">📊 12 Burcun Haritanızdaki Güç Sıralaması</h4>
                <div id="hc-bb-bars" class="hc-bb-bars-list"></div>
            </div>

            <div class="hc-bb-section">
                <h4 class="hc-bb-sec-title">👑 İmza Burcunuzun Psikolojik Dinamikleri</h4>
                <div id="hc-bb-desc" class="hc-bb-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
