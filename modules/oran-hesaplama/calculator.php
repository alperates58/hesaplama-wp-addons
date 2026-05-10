<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oran_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ratio',
        HC_PLUGIN_URL . 'modules/oran-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ratio">
        <h3>Oran Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-r-v1">1. Sayı:</label>
            <input type="number" id="hc-r-v1" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-r-v2">2. Sayı:</label>
            <input type="number" id="hc-r-v2" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcRatioHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ratio-result">
            <div id="hc-r-res-val" class="hc-result-value">-</div>
            <p id="hc-r-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
