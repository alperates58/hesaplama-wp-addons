<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sanziman_oranlari_ve_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gear-speed-calc',
        HC_PLUGIN_URL . 'modules/sanziman-oranlari-ve-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gs-box">
        <h3>Şanzıman ve Hız Hesaplama</h3>
        <div class="hc-form-group">
            <label>Devir (RPM)</label>
            <input type="number" id="hc-gs-rpm" value="3000">
        </div>
        <div class="hc-form-group">
            <label>Vites Oranı</label>
            <input type="number" step="0.001" id="hc-gs-ratio" value="1.000">
        </div>
        <div class="hc-form-group">
            <label>Diferansiyel Oranı (Final Drive)</label>
            <input type="number" step="0.001" id="hc-gs-final" value="3.550">
        </div>
        <div class="hc-form-group">
            <label>Lastik Çapı (mm)</label>
            <input type="number" id="hc-gs-tire" value="630">
        </div>
        <button class="hc-btn" onclick="hcGsHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-gs-result">
            <div class="hc-result-title">Vites Hızı:</div>
            <div class="hc-result-value" id="hc-gs-val">-</div>
        </div>
    </div>
    <?php
}
