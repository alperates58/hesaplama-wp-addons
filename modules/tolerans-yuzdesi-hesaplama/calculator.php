<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tolerans_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tol-pct',
        HC_PLUGIN_URL . 'modules/tolerans-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tol-p">
        <h3>Tolerans Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-tp-nominal">Nominal Değer:</label>
            <input type="number" id="hc-tp-nominal" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-tol">Tolerans Miktarı:</label>
            <input type="number" id="hc-tp-tol" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcTolPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tolerans-yuzdesi-result">
            <strong>Tolerans Yüzdesi:</strong>
            <div id="hc-tp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
