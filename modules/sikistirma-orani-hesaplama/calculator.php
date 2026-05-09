<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sikistirma_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-compression-calc',
        HC_PLUGIN_URL . 'modules/sikistirma-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cr-box">
        <h3>Motor Sıkıştırma Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Silindir Süpürme Hacmi (Vd - cc)</label>
            <input type="number" id="hc-cr-vd" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label>Yanma Odası Hacmi (Vc - cc)</label>
            <input type="number" id="hc-cr-vc" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcCrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <div class="hc-result-title">Sıkıştırma Oranı:</div>
            <div class="hc-result-value" id="hc-cr-val">-</div>
        </div>
    </div>
    <?php
}
