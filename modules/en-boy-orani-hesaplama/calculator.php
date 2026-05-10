<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_boy_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-en-boy-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/en-boy-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-en-boy-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/en-boy-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aspect">
        <h3>En Boy Oranı (Aspect Ratio)</h3>
        <div class="hc-form-group">
            <label for="hc-ar-w">Genişlik (Piksel)</label>
            <input type="number" id="hc-ar-w" placeholder="Örn: 1920">
        </div>
        <div class="hc-form-group">
            <label for="hc-ar-h">Yükseklik (Piksel)</label>
            <input type="number" id="hc-ar-h" placeholder="Örn: 1080">
        </div>
        <button class="hc-btn" onclick="hcEnBoyOranıHesapla()">Oranı Bul</button>
        <div class="hc-result" id="hc-ar-result">
            <div class="hc-result-label">Görüntü Oranı:</div>
            <div class="hc-result-value" id="hc-ar-val">-</div>
            <p id="hc-ar-type" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
