<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kimyasal_denklem_dengeleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kimyasal-denklem-dengeleme-hesaplama',
        HC_PLUGIN_URL . 'modules/kimyasal-denklem-dengeleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kimyasal-denklem-dengeleme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kimyasal-denklem-dengeleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eq-balancing">
        <h3>Kimyasal Denklem Dengeleme</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Tepkimeyi şu formatta girin: <code>C3H8 + O2 = CO2 + H2O</code></p>
        <div class="hc-form-group">
            <input type="text" id="hc-eq-input" placeholder="Örn: H2 + O2 = H2O" style="font-family:monospace; font-size:1.1em;">
        </div>
        <button class="hc-btn" onclick="hcKimyasalDenklemDengelemeHesapla()">Denkleştir</button>
        <div class="hc-result" id="hc-eq-result">
            <div class="hc-result-label">Dengelenmiş Denklem:</div>
            <div class="hc-result-value" id="hc-eq-val" style="font-family:monospace; font-size:1.2em;">-</div>
        </div>
    </div>
    <?php
}
