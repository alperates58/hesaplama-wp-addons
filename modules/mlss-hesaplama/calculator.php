<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mlss_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mlss-calc',
        HC_PLUGIN_URL . 'modules/mlss-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mlss-calc-css',
        HC_PLUGIN_URL . 'modules/mlss-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mlss-calc">
        <h3>MLSS (Mixed Liquor Suspended Solids)</h3>
        <div class="hc-form-group">
            <label for="hc-ml-dry">Filtre + Kurutulmuş Katı Ağırlığı (mg):</label>
            <input type="number" id="hc-ml-dry" placeholder="1250">
        </div>
        <div class="hc-form-group">
            <label for="hc-ml-tare">Boş Filtre Ağırlığı (mg):</label>
            <input type="number" id="hc-ml-tare" placeholder="1200">
        </div>
        <div class="hc-form-group">
            <label for="hc-ml-sample">Numune Hacmi (mL):</label>
            <input type="number" id="hc-ml-sample" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcMlssHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mlss-calc-result">
            <strong>MLSS Konsantrasyonu:</strong>
            <div id="hc-ml-res-val" class="hc-result-value">-</div>
            <span>mg / L</span>
        </div>
    </div>
    <?php
}
