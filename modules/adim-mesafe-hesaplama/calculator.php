<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adim_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-step-dist',
        HC_PLUGIN_URL . 'modules/adim-mesafe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-step-dist-css',
        HC_PLUGIN_URL . 'modules/adim-mesafe-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-step-dist">
        <h3>Adım -> Mesafe Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-sd-steps">Adım Sayısı:</label>
            <input type="number" id="hc-sd-steps" placeholder="5000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-len">Ortalama Adım Uzunluğunuz (cm):</label>
            <input type="number" id="hc-sd-len" placeholder="75">
            <small>Bilmiyorsanız 70-80 cm arası bir değer girebilirsiniz.</small>
        </div>
        <button class="hc-btn" onclick="hcStepDistHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-step-dist-result">
            <strong>Toplam Mesafe:</strong>
            <div id="hc-sd-res-val" class="hc-result-value">-</div>
            <span>Kilometre (km)</span>
        </div>
    </div>
    <?php
}
