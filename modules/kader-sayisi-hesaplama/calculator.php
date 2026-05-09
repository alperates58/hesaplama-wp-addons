<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kader_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kader-num',
        HC_PLUGIN_URL . 'modules/kader-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kader-num-css',
        HC_PLUGIN_URL . 'modules/kader-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kader-sayisi-hesaplama">
        <h3>Kader Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kader-name">Tam Adınız</label>
            <input type="text" id="hc-kader-name" placeholder="Adınız ve Soyadınız">
        </div>
        <button class="hc-btn" onclick="hcKaderHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kader-result">
            <div class="hc-result-label">Kader Sayınız:</div>
            <div class="hc-result-value" id="hc-kader-val"></div>
            <div class="hc-result-desc" id="hc-kader-desc"></div>
        </div>
    </div>
    <?php
}
