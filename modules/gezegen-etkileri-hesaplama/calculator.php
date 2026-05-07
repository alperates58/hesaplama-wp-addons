<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gezegen_etkileri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-planet-effects',
        HC_PLUGIN_URL . 'modules/gezegen-etkileri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-planet-effects-css',
        HC_PLUGIN_URL . 'modules/gezegen-etkileri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegen-etkileri-hesaplama">
        <h3>Gezegen Etkileri Rehberi</h3>
        <div class="hc-form-group">
            <label for="hc-p-sel">Gezegen Seçin</label>
            <select id="hc-p-sel">
                <option value="Güneş">Güneş</option>
                <option value="Ay">Ay</option>
                <option value="Merkür">Merkür</option>
                <option value="Venüs">Venüs</option>
                <option value="Mars">Mars</option>
                <option value="Jüpiter">Jüpiter</option>
                <option value="Satürn">Satürn</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGezegenEtkiGoster()">Etkisini Gör</button>
        <div class="hc-result" id="hc-p-result">
            <div class="hc-result-value" id="hc-p-val"></div>
            <div class="hc-result-desc" id="hc-p-desc"></div>
        </div>
    </div>
    <?php
}
