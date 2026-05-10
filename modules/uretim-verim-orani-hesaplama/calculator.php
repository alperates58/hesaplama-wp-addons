<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uretim_verim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prod-yield',
        HC_PLUGIN_URL . 'modules/uretim-verim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-py">
        <h3>Üretim Verim Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-py-actual">Gerçekleşen Üretim (Adet):</label>
            <input type="number" id="hc-py-actual" placeholder="920">
        </div>
        <div class="hc-form-group">
            <label for="hc-py-target">Hedeflenen Üretim (Adet):</label>
            <input type="number" id="hc-py-target" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcProdYieldHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uretim-verim-result">
            <strong>Verim Oranı:</strong>
            <div id="hc-py-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
