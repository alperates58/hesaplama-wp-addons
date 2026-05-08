<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_deposu_hacmi_ve_menzil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tank-range-calc',
        HC_PLUGIN_URL . 'modules/yakit-deposu-hacmi-ve-menzil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tr-box">
        <h3>Depo Menzili Hesaplama</h3>
        <div class="hc-form-group">
            <label>Depo Kapasitesi (Litre)</label>
            <input type="number" id="hc-tr-cap" value="50">
        </div>
        <div class="hc-form-group">
            <label>Ortalama Tüketim (L/100km)</label>
            <input type="number" step="0.1" id="hc-tr-cons" value="6.0">
        </div>
        <button class="hc-btn" onclick="hcTrHesapla()">Menzili Hesapla</button>
        <div class="hc-result" id="hc-tr-result">
            <div class="hc-result-title">Tam Depo ile Gidilecek Mesafe:</div>
            <div class="hc-result-value" id="hc-tr-val">-</div>
        </div>
    </div>
    <?php
}
