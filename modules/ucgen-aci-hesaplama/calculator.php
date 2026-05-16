<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucgen_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ucgen-aci',
        HC_PLUGIN_URL . 'modules/ucgen-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ucgen-aci-css',
        HC_PLUGIN_URL . 'modules/ucgen-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ucgen-aci">
        <h3>Üçgen Açı (120°) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-ucgen-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcUcgenAcisiHesapla()">Üçgen Açıları Bul</button>
        <div class="hc-result" id="hc-ucgen-aci-result">
            <div id="hc-ucgen-list" class="hc-aspect-list">
                <!-- Üçgen listesi -->
            </div>
        </div>
    </div>
    <?php
}
