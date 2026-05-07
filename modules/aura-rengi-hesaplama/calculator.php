<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aura_rengi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aura-color',
        HC_PLUGIN_URL . 'modules/aura-rengi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aura-color-css',
        HC_PLUGIN_URL . 'modules/aura-rengi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aura-rengi-hesaplama">
        <h3>Aura Rengi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aura-date">Doğum Tarihi</label>
            <input type="date" id="hc-aura-date">
        </div>
        <button class="hc-btn" onclick="hcAuraBul()">Rengimi Bul</button>
        <div class="hc-result" id="hc-aura-result">
            <div class="hc-result-label">Aura Renginiz:</div>
            <div class="hc-result-value" id="hc-aura-val"></div>
            <div class="hc-result-desc" id="hc-aura-desc"></div>
        </div>
    </div>
    <?php
}
