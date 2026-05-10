<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_tamamlama_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-comp',
        HC_PLUGIN_URL . 'modules/hedef-tamamlama-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-comp-css',
        HC_PLUGIN_URL . 'modules/hedef-tamamlama-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-comp">
        <h3>Hedef Tamamlama Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-tc-target">Hedeflenen Miktar:</label>
            <input type="number" id="hc-tc-target" placeholder="örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-actual">Tamamlanan Miktar:</label>
            <input type="number" id="hc-tc-actual" placeholder="örn: 750">
        </div>
        <button class="hc-btn" onclick="hcTargetCompHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-target-comp-result">
            <strong>Tamamlama Yüzdesi:</strong>
            <div id="hc-tc-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
