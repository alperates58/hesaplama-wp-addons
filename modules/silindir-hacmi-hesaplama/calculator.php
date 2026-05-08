<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_silindir_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cylinder-calc',
        HC_PLUGIN_URL . 'modules/silindir-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cc-box">
        <h3>Silindir Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Silindir Çapı (mm)</label>
            <input type="number" step="0.1" id="hc-cc-bore" placeholder="Örn: 80">
        </div>
        <div class="hc-form-group">
            <label>Strok Uzunluğu (mm)</label>
            <input type="number" step="0.1" id="hc-cc-stroke" placeholder="Örn: 80">
        </div>
        <div class="hc-form-group">
            <label>Silindir Sayısı</label>
            <input type="number" id="hc-cc-count" value="4">
        </div>
        <button class="hc-btn" onclick="hcCcHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-cc-result">
            <div class="hc-result-title">Toplam Motor Hacmi:</div>
            <div class="hc-result-value" id="hc-cc-val">-</div>
        </div>
    </div>
    <?php
}
