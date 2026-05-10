<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_silindir_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cyl-vol',
        HC_PLUGIN_URL . 'modules/silindir-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cyl-vol">
        <h3>Silindir Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cv-radius">Yarıçap (r - m):</label>
            <input type="number" id="hc-cv-radius" step="any" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-cv-height">Yükseklik (h - m):</label>
            <input type="number" id="hc-cv-height" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcCylVolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-silindir-hacmi-result">
            <strong>Hacim:</strong>
            <div id="hc-cv-res-val" class="hc-result-value">-</div>
            <span>m³</span>
        </div>
    </div>
    <?php
}
