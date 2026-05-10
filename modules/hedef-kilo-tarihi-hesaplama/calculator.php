<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_kilo_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-date',
        HC_PLUGIN_URL . 'modules/hedef-kilo-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-date-css',
        HC_PLUGIN_URL . 'modules/hedef-kilo-tarihi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-date">
        <h3>Hedef Kilo Takvimi</h3>
        <div class="hc-form-group">
            <label for="hc-td-current">Mevcut Kilo (kg):</label>
            <input type="number" id="hc-td-current" placeholder="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-td-target">Hedef Kilo (kg):</label>
            <input type="number" id="hc-td-target" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-td-deficit">Günlük Kalori Açığı (kcal):</label>
            <input type="number" id="hc-td-deficit" value="500">
        </div>
        <button class="hc-btn" onclick="hcTargetDateHesapla()">Tarihi Hesapla</button>
        <div class="hc-result" id="hc-target-date-result">
            <strong>Tahmini Varış Tarihi:</strong>
            <div id="hc-td-res-date" class="hc-result-value">-</div>
            <p id="hc-td-res-days" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
