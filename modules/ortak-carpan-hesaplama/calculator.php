<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortak_carpan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-common-factors',
        HC_PLUGIN_URL . 'modules/ortak-carpan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-common-factors">
        <h3>Ortak Çarpan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cf-input">Sayıları Girin (Virgülle ayırın):</label>
            <input type="text" id="hc-cf-input" placeholder="12, 18, 24">
        </div>
        <button class="hc-btn" onclick="hcCommonFactorsHesapla()">Çarpanları Bul</button>
        <div class="hc-result" id="hc-common-factors-result">
            <strong>Ortak Çarpanlar:</strong>
            <div id="hc-cf-res-val" class="hc-result-value" style="font-size: 1.5rem;">-</div>
            <p id="hc-cf-ebob" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
