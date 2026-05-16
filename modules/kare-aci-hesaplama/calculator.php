<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kare_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kare-aci',
        HC_PLUGIN_URL . 'modules/kare-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kare-aci-css',
        HC_PLUGIN_URL . 'modules/kare-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kare-aci">
        <h3>Kare Açı (90°) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-kare-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKareAcisiHesapla()">Kare Açıları Bul</button>
        <div class="hc-result" id="hc-kare-aci-result">
            <div id="hc-kare-list" class="hc-aspect-list">
                <!-- Kare listesi -->
            </div>
        </div>
    </div>
    <?php
}
