<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisilik_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisilik-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisilik-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisilik-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisilik-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personality-number">
        <h3>Kişilik Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pn-name">Tam Adınız:</label>
            <input type="text" id="hc-pn-name" class="hc-input" placeholder="Örn: Ayşe Fatma">
        </div>
        <button class="hc-btn" onclick="hcPersonalityNumberHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kisilik-sayisi-hesaplama-result">
            <div class="hc-result-label">Kişilik Sayınız:</div>
            <div class="hc-result-value" id="hc-res-pn-val">-</div>
            <div id="hc-res-pn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
