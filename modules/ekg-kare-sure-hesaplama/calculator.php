<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekg_kare_sure_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekg-kare-sure-hesaplama',
        HC_PLUGIN_URL . 'modules/ekg-kare-sure-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekg-kare-sure-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ekg-kare-sure-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekg-time">
        <h3>EKG Kare Süre Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-et-small">Küçük Kare Sayısı</label>
            <input type="number" id="hc-et-small" placeholder="Örn: 3">
        </div>
        <div class="hc-form-group">
            <label for="hc-et-large">Büyük Kare Sayısı</label>
            <input type="number" id="hc-et-large" placeholder="Örn: 1">
        </div>
        <button class="hc-btn" onclick="hcEKGKareSüreHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-et-result">
            <div id="hc-et-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
