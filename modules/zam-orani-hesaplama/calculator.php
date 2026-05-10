<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zam_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-raise-rate',
        HC_PLUGIN_URL . 'modules/zam-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rr">
        <h3>Zam Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Eski Maaş/Fiyat (₺):</label><input type="number" id="hc-rr-old" placeholder="17002">
        </div>
        <div class="hc-form-group">
            <label>Yeni Maaş/Fiyat (₺):</label><input type="number" id="hc-rr-new" placeholder="25000">
        </div>
        <button class="hc-btn" onclick="hcRaiseRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-zam-orani-result">
            <strong>Zam Oranı:</strong>
            <div id="hc-rr-res-val" class="hc-result-value">-</div>
            <p id="hc-rr-diff" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
