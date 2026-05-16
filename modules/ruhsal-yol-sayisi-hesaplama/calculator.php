<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruhsal_yol_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ruhsal-yol-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ruhsal-yol-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ruhsal-yol-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ruhsal-yol-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spiritual-path">
        <h3>Ruhsal Yol Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sp-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-sp-birth" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcSpiritualPathHesapla()">Yolu Hesapla</button>
        <div class="hc-result" id="hc-ruhsal-yol-sayisi-hesaplama-result">
            <div class="hc-result-label">Ruhsal Yol Sayınız:</div>
            <div class="hc-result-value" id="hc-res-sp-val">-</div>
            <div id="hc-res-sp-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
