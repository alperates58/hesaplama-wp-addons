<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayinin_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-pct',
        HC_PLUGIN_URL . 'modules/sayinin-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-num-pct">
        <h3>Sayının Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-np-val">Sayı:</label>
            <input type="number" id="hc-np-val" step="any" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-np-pct">Yüzde (%):</label>
            <input type="number" id="hc-np-pct" step="any" placeholder="18">
        </div>
        <button class="hc-btn" onclick="hcNumPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sayinin-yuzdesi-result">
            <strong>Sonuç:</strong>
            <div id="hc-np-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
