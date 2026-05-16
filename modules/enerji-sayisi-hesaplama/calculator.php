<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-energy-number',
        HC_PLUGIN_URL . 'modules/enerji-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-energy-calc">
        <h3>Enerji Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-en-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcEnerjiSayisiHesapla()">Enerji Sayımı Bul</button>
        <div class="hc-result" id="hc-enerji-sayisi-result">
            <div class="hc-result-header">Sizin Enerji Sayınız: <span id="hc-en-value" class="hc-result-value"></span></div>
            <div id="hc-en-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
