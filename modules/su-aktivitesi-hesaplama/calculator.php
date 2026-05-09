<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_aktivitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-activity',
        HC_PLUGIN_URL . 'modules/su-aktivitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-activity-css',
        HC_PLUGIN_URL . 'modules/su-aktivitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-activity">
        <h3>Su Aktivitesi (aw) Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-wa-erh">Dengeli Bağıl Nem (ERH) [%]</label>
            <input type="number" id="hc-wa-erh" value="75" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcWaterActivityHesapla()">aw Değerini Hesapla</button>
        <div class="hc-result" id="hc-water-activity-result">
            <div class="hc-result-item">
                <span>Su Aktivitesi (aw):</span>
                <span class="hc-result-value" id="hc-res-wa-val">0.75</span>
            </div>
            <p id="hc-res-wa-comment" class="hc-wa-note">Mikrobiyal gelişim analizi...</p>
        </div>
    </div>
    <?php
}
