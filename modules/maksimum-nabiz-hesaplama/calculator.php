<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-max',
        HC_PLUGIN_URL . 'modules/maksimum-nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-max-css',
        HC_PLUGIN_URL . 'modules/maksimum-nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-max">
        <h3>Maksimum Nabız (HRmax) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-hm-age">Yaşınız:</label>
            <input type="number" id="hc-hm-age" placeholder="25">
        </div>
        <div class="hc-form-group">
            <label for="hc-hm-formula">Kullanılacak Formül:</label>
            <select id="hc-hm-formula">
                <option value="fox">Fox Formülü (220 - Yaş)</option>
                <option value="tanaka">Tanaka Formülü (208 - 0.7 * Yaş)</option>
                <option value="gulati">Gulati Formülü (Kadınlar için: 206 - 0.88 * Yaş)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHrMaxHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-max-result">
            <strong>Tahmini Maksimum Nabız:</strong>
            <div id="hc-hm-res-val" class="hc-result-value">-</div>
            <span>BPM</span>
        </div>
    </div>
    <?php
}
