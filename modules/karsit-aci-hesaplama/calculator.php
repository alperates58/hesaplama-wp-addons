<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karsit_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karsit-aci',
        HC_PLUGIN_URL . 'modules/karsit-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karsit-aci-css',
        HC_PLUGIN_URL . 'modules/karsit-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karsit-aci">
        <h3>Karşıt Açı (180°) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-karsit-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKarsitAcisiHesapla()">Karşıt Açıları Bul</button>
        <div class="hc-result" id="hc-karsit-aci-result">
            <div id="hc-karsit-list" class="hc-aspect-list">
                <!-- Karşıt listesi -->
            </div>
        </div>
    </div>
    <?php
}
