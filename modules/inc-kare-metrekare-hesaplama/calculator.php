<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inc_kare_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sqin-to-sqm',
        HC_PLUGIN_URL . 'modules/inc-kare-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sqin-to-sqm-css',
        HC_PLUGIN_URL . 'modules/inc-kare-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sqin-sqm">
        <h3>İnç Kare → Metrekare</h3>
        <div class="hc-form-group">
            <label for="hc-im-val">İnç Kare (sq in):</label>
            <input type="number" id="hc-im-val" step="any" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcSqinToSqmHesapla()">Çevir</button>
        <div class="hc-result" id="hc-sqin-sqm-result">
            <strong>Sonuç (Metrekare):</strong>
            <div id="hc-im-res-val" class="hc-result-value">-</div>
            <span>m²</span>
        </div>
    </div>
    <?php
}
