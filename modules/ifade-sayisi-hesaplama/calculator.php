<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ifade_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ifade-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ifade-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ifade-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ifade-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-expression-number">
        <h3>İfade Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-en-name">Tam Adınız:</label>
            <input type="text" id="hc-en-name" class="hc-input" placeholder="Örn: Mehmet Can">
        </div>
        <button class="hc-btn" onclick="hcExpressionNumberHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ifade-sayisi-hesaplama-result">
            <div class="hc-result-label">İfade Sayınız:</div>
            <div class="hc-result-value" id="hc-res-en-val">-</div>
            <div id="hc-res-en-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
