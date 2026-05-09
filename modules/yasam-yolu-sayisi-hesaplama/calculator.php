<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yasam_yolu_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yasam-yolu',
        HC_PLUGIN_URL . 'modules/yasam-yolu-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yasam-yolu-css',
        HC_PLUGIN_URL . 'modules/yasam-yolu-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yasam-yolu-hesaplama">
        <h3>Yaşam Yolu Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lp-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-lp-tarih">
        </div>
        <button class="hc-btn" onclick="hcLpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yasam-yolu-result">
            <div class="hc-result-label">Yaşam Yolu Sayınız:</div>
            <div class="hc-result-value" id="hc-lp-value"></div>
            <div class="hc-result-desc" id="hc-lp-desc"></div>
        </div>
    </div>
    <?php
}
