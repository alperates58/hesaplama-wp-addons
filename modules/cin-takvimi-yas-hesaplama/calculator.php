<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_takvimi_yas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-age',
        HC_PLUGIN_URL . 'modules/cin-takvimi-yas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-age-calc">
        <h3>Çin Takvimi Yaş Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-ca-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinYasiHesapla()">Çin Yaşımı Hesapla</button>
        <div class="hc-result" id="hc-cin-takvimi-yas-result">
            <div class="hc-result-header">Çin Takvimine Göre Yaşınız: <span id="hc-ca-value" class="hc-result-value"></span></div>
            <div id="hc-ca-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
