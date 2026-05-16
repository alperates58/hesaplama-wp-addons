<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sekstil_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sekstil-aci',
        HC_PLUGIN_URL . 'modules/sekstil-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sekstil-aci-css',
        HC_PLUGIN_URL . 'modules/sekstil-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sekstil-aci">
        <h3>Sekstil Açı (60°) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-sekstil-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSekstilAcisiHesapla()">Sekstil Açıları Bul</button>
        <div class="hc-result" id="hc-sekstil-aci-result">
            <div id="hc-sekstil-list" class="hc-aspect-list">
                <!-- Sekstil listesi -->
            </div>
        </div>
    </div>
    <?php
}
