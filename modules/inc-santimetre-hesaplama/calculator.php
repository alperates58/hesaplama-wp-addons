<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inc_santimetre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inch-to-cm',
        HC_PLUGIN_URL . 'modules/inc-santimetre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inch-to-cm-css',
        HC_PLUGIN_URL . 'modules/inc-santimetre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inch-cm">
        <h3>İnç → Santimetre</h3>
        <div class="hc-form-group">
            <label for="hc-ic-inch">İnç (in):</label>
            <input type="number" id="hc-ic-inch" step="any" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcInchToCmHesapla()">Çevir</button>
        <div class="hc-result" id="hc-inch-cm-result">
            <strong>Sonuç (Santimetre):</strong>
            <div id="hc-ic-res-val" class="hc-result-value">-</div>
            <span>cm</span>
        </div>
    </div>
    <?php
}
