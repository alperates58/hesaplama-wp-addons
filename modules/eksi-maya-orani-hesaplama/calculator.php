<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eksi_maya_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-starter-ratio',
        HC_PLUGIN_URL . 'modules/eksi-maya-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-starter-ratio-css',
        HC_PLUGIN_URL . 'modules/eksi-maya-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-starter-ratio">
        <h3>Tarifte Maya Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-sr-flour">Toplam Un Miktarı (gr)</label>
            <input type="number" id="hc-sr-flour" value="500" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-percent">Maya Yüzdesi (%)</label>
            <input type="number" id="hc-sr-percent" value="20" min="5" max="50">
        </div>
        <button class="hc-btn" onclick="hcStarterRatioHesapla()">Maya Miktarını Gör</button>
        <div class="hc-result" id="hc-starter-ratio-result">
            <div class="hc-result-item">
                <span>Gereken Maya:</span>
                <span class="hc-result-value" id="hc-res-sr-maya">0 gr</span>
            </div>
            <p class="hc-sr-note">Standart tariflerde un miktarının %20'si kadar maya kullanımı yaygındır.</p>
        </div>
    </div>
    <?php
}
