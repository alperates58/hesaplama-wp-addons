<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedefe_ulasma_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-reach',
        HC_PLUGIN_URL . 'modules/hedefe-ulasma-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-reach-css',
        HC_PLUGIN_URL . 'modules/hedefe-ulasma-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-reach">
        <h3>Hedefe Ulaşma Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-tu-target">Hedef Değer:</label>
            <input type="number" id="hc-tu-target" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tu-actual">Ulaşılan Değer:</label>
            <input type="number" id="hc-tu-actual" placeholder="60">
        </div>
        <button class="hc-btn" onclick="hcTargetReachHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-target-reach-result">
            <strong>Ulaşma Oranı:</strong>
            <div id="hc-tu-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
