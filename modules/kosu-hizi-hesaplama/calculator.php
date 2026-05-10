<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-run-speed',
        HC_PLUGIN_URL . 'modules/kosu-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-speed-css',
        HC_PLUGIN_URL . 'modules/kosu-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-run-speed">
        <h3>Koşu Hızı Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Tempo (dk:sn / km):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-rs-min" placeholder="5" style="flex:1;">
                <input type="number" id="hc-rs-sec" placeholder="00" style="flex:1;">
            </div>
            <small>Örn: 5:00 tempo = 12 km/s</small>
        </div>
        <button class="hc-btn" onclick="hcRunSpeedHesapla()">Hıza Dönüştür</button>
        <div class="hc-result" id="hc-run-speed-result">
            <strong>Koşu Hızı:</strong>
            <div id="hc-rs-res-val" class="hc-result-value">-</div>
            <span>km / s (Kilometre/Saat)</span>
        </div>
    </div>
    <?php
}
