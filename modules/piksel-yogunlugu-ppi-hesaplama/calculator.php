<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piksel_yogunlugu_ppi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppi-calc',
        HC_PLUGIN_URL . 'modules/piksel-yogunlugu-ppi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppi-calc-css',
        HC_PLUGIN_URL . 'modules/piksel-yogunlugu-ppi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ppi-calc">
        <h3>PPI Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-ppi-w">Yatay Piksel</label>
            <input type="number" id="hc-ppi-w" value="1920">
        </div>
        <div class="hc-form-group">
            <label for="hc-ppi-h">Dikey Piksel</label>
            <input type="number" id="hc-ppi-h" value="1080">
        </div>
        <div class="hc-form-group">
            <label for="hc-ppi-diag">Ekran Boyutu (İnç)</label>
            <input type="number" id="hc-ppi-diag" value="15.6" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPpiCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ppi-calc-result">
            <div class="hc-result-item">
                <span>Piksel Yoğunluğu:</span>
                <span class="hc-result-value" id="hc-res-ppi">0 PPI</span>
            </div>
            <p id="hc-res-ppi-desc" class="hc-ppi-desc"></p>
        </div>
    </div>
    <?php
}
