<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalp_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalp-debisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kalp-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalp-debisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kalp-debisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cardiac-output">
        <h3>Kalp Debisi (Cardiac Output)</h3>
        <div class="hc-form-group">
            <label for="hc-co-hr">Kalp Hızı (Nabız) (atım/dk)</label>
            <input type="number" id="hc-co-hr" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-co-sv">Atım Hacmi (mL/atım)</label>
            <input type="number" id="hc-co-sv" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcKalpDebisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-co-result">
            <div class="hc-result-label">Kalp Debisi:</div>
            <div class="hc-result-value" id="hc-co-val">-</div>
        </div>
    </div>
    <?php
}
