<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogurt_mayalama_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogurt-ratio-js',
        HC_PLUGIN_URL . 'modules/yogurt-mayalama-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yogurt-ratio-css',
        HC_PLUGIN_URL . 'modules/yogurt-mayalama-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yogurt-ratio">
        <h3>Yoğurt Mayalama Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yr-milk">Süt Miktarı (Litre)</label>
            <input type="number" id="hc-yr-milk" value="1" min="0.5" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcYogurtHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yogurt-ratio-result">
            <div id="hc-yr-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">
                <strong>İdeal Sıcaklık:</strong> Sütü 42-45°C'ye (serçe parmağınızın 7 saniye dayanabildiği sıcaklık) kadar soğutun.
            </div>
        </div>
    </div>
    <?php
}
