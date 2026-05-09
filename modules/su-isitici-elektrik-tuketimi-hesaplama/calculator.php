<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_isitici_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-heater',
        HC_PLUGIN_URL . 'modules/su-isitici-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-heater-css',
        HC_PLUGIN_URL . 'modules/su-isitici-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-heater">
        <h3>Su Isıtıcı Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-wh-volume">Su Hacmi (Litre)</label>
            <input type="number" id="hc-wh-volume" placeholder="Örn: 65" value="65" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wh-tin">Giriş Su Sıcaklığı (°C)</label>
            <input type="number" id="hc-wh-tin" value="15" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wh-tout">Hedef Su Sıcaklığı (°C)</label>
            <input type="number" id="hc-wh-tout" value="55" step="1">
        </div>

        <button class="hc-btn" onclick="hcSuIsiticiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wh-result">
            <div class="hc-result-item">
                <span>Tek Seferlik Isıtma:</span>
                <span class="hc-result-value highlight" id="hc-res-wh-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Maliyet:</span>
                <span class="hc-result-value" id="hc-res-wh-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Isıtıcının verimi %90 baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
