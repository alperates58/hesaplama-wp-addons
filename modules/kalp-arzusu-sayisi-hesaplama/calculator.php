<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalp_arzusu_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalp-arzusu-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kalp-arzusu-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalp-arzusu-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kalp-arzusu-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soul-urge-number">
        <h3>Kalp Arzusu Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sun-name">Tam Adınız:</label>
            <input type="text" id="hc-sun-name" class="hc-input" placeholder="Örn: Elif Su">
        </div>
        <button class="hc-btn" onclick="hcSoulUrgeNumberHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kalp-arzusu-sayisi-hesaplama-result">
            <div class="hc-result-label">Kalp Arzusu Sayınız:</div>
            <div class="hc-result-value" id="hc-res-sun-val">-</div>
            <div id="hc-res-sun-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
