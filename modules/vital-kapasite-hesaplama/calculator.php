<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vital_kapasite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vital-kapasite',
        HC_PLUGIN_URL . 'modules/vital-kapasite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vital-kapasite-css',
        HC_PLUGIN_URL . 'modules/vital-kapasite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vital-kapasite">
        <h3>Vital Kapasite Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vk-tv">Soluk Hacmi (TV - mL):</label>
            <input type="number" id="hc-vk-tv" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-vk-irv">İnspiratuar Rezerv Hacim (IRV - mL):</label>
            <input type="number" id="hc-vk-irv" placeholder="3000">
        </div>
        <div class="hc-form-group">
            <label for="hc-vk-erv">Ekspiratuar Rezerv Hacim (ERV - mL):</label>
            <input type="number" id="hc-vk-erv" placeholder="1100">
        </div>
        <button class="hc-btn" onclick="hcVitalKapasiteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vital-kapasite-result">
            <strong>Vital Kapasite (VC):</strong>
            <div id="hc-vk-res-val" class="hc-result-value">-</div>
            <span>mL</span>
        </div>
    </div>
    <?php
}
