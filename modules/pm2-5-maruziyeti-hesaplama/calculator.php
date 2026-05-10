<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pm2_5_maruziyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pm2-5-maruziyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/pm2-5-maruziyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pm2-5-maruziyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pm2-5-maruziyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pm25-exp">
        <h3>PM2.5 Maruziyeti ve Sağlık Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-pm-level">Havadaki PM2.5 Seviyesi (µg/m³)</label>
            <input type="number" id="hc-pm-level" placeholder="Örn: 25">
            <small>WHO güvenli sınırı: 5 µg/m³</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-pm-time">Günlük Maruz Kalma Süresi (Saat)</label>
            <input type="number" id="hc-pm-time" value="24">
        </div>
        <button class="hc-btn" onclick="hcPM25MaruziyetiHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-pm-result">
            <div id="hc-pm-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
