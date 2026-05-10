<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molarite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molarite-hesaplama',
        HC_PLUGIN_URL . 'modules/molarite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molarite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molarite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molarity">
        <h3>Molarite Hesaplama (M)</h3>
        <div class="hc-form-group">
            <label for="hc-ma-mol">Çözünen Molü (mol)</label>
            <input type="number" id="hc-ma-mol" placeholder="Örn: 0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ma-vol">Çözelti Hacmi (Litre)</label>
            <input type="number" id="hc-ma-vol" placeholder="Örn: 0.5">
        </div>
        <button class="hc-btn" onclick="hcMolariteHesapla()">Molarite Hesapla</button>
        <div class="hc-result" id="hc-ma-result">
            <div class="hc-result-label">Molarite (M):</div>
            <div class="hc-result-value" id="hc-ma-val">-</div>
        </div>
    </div>
    <?php
}
