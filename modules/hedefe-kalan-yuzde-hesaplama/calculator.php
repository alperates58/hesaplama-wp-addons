<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedefe_kalan_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-rem',
        HC_PLUGIN_URL . 'modules/hedefe-kalan-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-rem-css',
        HC_PLUGIN_URL . 'modules/hedefe-kalan-yuzde-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-rem">
        <h3>Hedefe Kalan Yüzde</h3>
        <div class="hc-form-group">
            <label for="hc-tr-target">Toplam Hedef:</label>
            <input type="number" id="hc-tr-target" placeholder="örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-actual">Mevcut Miktar:</label>
            <input type="number" id="hc-tr-actual" placeholder="örn: 400">
        </div>
        <button class="hc-btn" onclick="hcTargetRemHesapla()">Kalanı Hesapla</button>
        <div class="hc-result" id="hc-target-rem-result">
            <strong>Kalan Yüzde:</strong>
            <div id="hc-tr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
