<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makine_kullanilabilirlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-makine-kullanilabilirlik-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/makine-kullanilabilirlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-makine-kullanilabilirlik-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/makine-kullanilabilirlik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-makine-kullanilabilirlik">
        <h3>Makine Kullanılabilirlik Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-avail-planned">Planlanan Üretim Süresi (Dakika):</label>
            <input type="number" id="hc-avail-planned" class="hc-input" placeholder="Örn: 480">
        </div>
        <div class="hc-form-group">
            <label for="hc-avail-downtime">Toplam Duruş Süresi (Dakika):</label>
            <input type="number" id="hc-avail-downtime" class="hc-input" placeholder="Örn: 60">
        </div>
        <button class="hc-btn" onclick="hcMakineKullanilabilirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-makine-kullanilabilirlik-result">
            <div class="hc-result-label">Kullanılabilirlik Oranı:</div>
            <div class="hc-result-value" id="hc-res-avail-ratio">-</div>
            <p id="hc-avail-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
