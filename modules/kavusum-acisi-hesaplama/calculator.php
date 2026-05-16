<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kavusum_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kavusum-acisi',
        HC_PLUGIN_URL . 'modules/kavusum-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kavusum-acisi-css',
        HC_PLUGIN_URL . 'modules/kavusum-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kavusum-acisi">
        <h3>Kavuşum Açısı (0°) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-kav-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKavusumAcisiHesapla()">Kavuşumları Bul</button>
        <div class="hc-result" id="hc-kavusum-acisi-result">
            <div id="hc-kav-list" class="hc-aspect-list">
                <!-- Kavuşum listesi -->
            </div>
        </div>
    </div>
    <?php
}
