<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_silindir_hacmi_litre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cyl-litre',
        HC_PLUGIN_URL . 'modules/silindir-hacmi-litre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cyl-litre">
        <h3>Silindir Hacmi (Litre)</h3>
        <div class="hc-form-group">
            <label for="hc-cl-radius">Yarıçap (cm):</label>
            <input type="number" id="hc-cl-radius" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-height">Yükseklik (cm):</label>
            <input type="number" id="hc-cl-height" step="any" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcCylLitreHesapla()">Litre Hesapla</button>
        <div class="hc-result" id="hc-silindir-litre-result">
            <strong>Hacim:</strong>
            <div id="hc-cl-res-val" class="hc-result-value">-</div>
            <span>Litre</span>
        </div>
    </div>
    <?php
}
