<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inc_metre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inch-to-m',
        HC_PLUGIN_URL . 'modules/inc-metre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inch-to-m-css',
        HC_PLUGIN_URL . 'modules/inc-metre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inch-m">
        <h3>İnç → Metre</h3>
        <div class="hc-form-group">
            <label for="hc-im-inch">İnç (in):</label>
            <input type="number" id="hc-im-inch" step="any" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcInchToMHesapla()">Çevir</button>
        <div class="hc-result" id="hc-inch-m-result">
            <strong>Sonuç (Metre):</strong>
            <div id="hc-im-res-val" class="hc-result-value">-</div>
            <span>m</span>
        </div>
    </div>
    <?php
}
