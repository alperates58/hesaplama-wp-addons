<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sae_metrik_olcu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sae-metric',
        HC_PLUGIN_URL . 'modules/sae-metrik-olcu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sm-box">
        <h3>SAE - Metrik Ölçü Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>İnç (Fractional, Örn: 1/2 veya Decimal 0.5)</label>
            <input type="text" id="hc-sm-inch" placeholder="1/2">
        </div>
        <button class="hc-btn" onclick="hcSmHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-sm-result">
            <div class="hc-result-title">Metrik Karşılığı:</div>
            <div class="hc-result-value" id="hc-sm-val">-</div>
        </div>
    </div>
    <?php
}
