<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yay_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arc-len',
        HC_PLUGIN_URL . 'modules/yay-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-arc">
        <h3>Yay Uzunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-al-r">Yarıçap (r - m):</label>
            <input type="number" id="hc-al-r" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-al-angle">Merkez Açı (Derece):</label>
            <input type="number" id="hc-al-angle" step="any" placeholder="90">
        </div>
        <button class="hc-btn" onclick="hcArcLenHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yay-uzunlugu-result">
            <strong>Yay Uzunluğu (s):</strong>
            <div id="hc-al-res-val" class="hc-result-value">-</div>
            <span>m</span>
        </div>
    </div>
    <?php
}
