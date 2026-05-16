<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yasam_amaci_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yasam-amaci-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/yasam-amaci-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yasam-amaci-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yasam-amaci-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-life-purpose">
        <h3>Yaşam Amacı Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lp-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-lp-birth" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcLifePurposeHesapla()">Amacı Hesapla</button>
        <div class="hc-result" id="hc-yasam-amaci-sayisi-hesaplama-result">
            <div class="hc-result-label">Yaşam Amacı Sayınız:</div>
            <div class="hc-result-value" id="hc-res-lp-val">-</div>
            <div id="hc-res-lp-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
