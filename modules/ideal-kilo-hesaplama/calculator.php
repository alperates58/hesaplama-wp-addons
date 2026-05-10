<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_kilo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-weight',
        HC_PLUGIN_URL . 'modules/ideal-kilo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ideal-weight-css',
        HC_PLUGIN_URL . 'modules/ideal-kilo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-weight">
        <h3>İdeal Kilo Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-iw-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-iw-gender" value="female"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-iw-height">Boy (cm):</label>
            <input type="number" id="hc-iw-height" placeholder="175">
        </div>
        <button class="hc-btn" onclick="hcIdealWeightHesapla()">İdeal Kiloyu Bul</button>
        <div class="hc-result" id="hc-ideal-weight-result">
            <strong>Tahmini İdeal Kilonuz:</strong>
            <div id="hc-iw-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
