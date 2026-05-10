<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adimdan_kilometreye_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-step-to-km',
        HC_PLUGIN_URL . 'modules/adimdan-kilometreye-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-step-to-km-css',
        HC_PLUGIN_URL . 'modules/adimdan-kilometreye-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-step-to-km">
        <h3>Adım -> Kilometre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-sk-steps">Adım Sayısı:</label>
            <input type="number" id="hc-sk-steps" placeholder="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sk-height">Boyunuz (cm):</label>
            <input type="number" id="hc-sk-height" placeholder="175">
            <small>Adım uzunluğu boyun yaklaşık %41-45'idir.</small>
        </div>
        <button class="hc-btn" onclick="hcStepToKmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-step-to-km-result">
            <strong>Tahmini Mesafe:</strong>
            <div id="hc-sk-res-val" class="hc-result-value">-</div>
            <span>Kilometre</span>
        </div>
    </div>
    <?php
}
