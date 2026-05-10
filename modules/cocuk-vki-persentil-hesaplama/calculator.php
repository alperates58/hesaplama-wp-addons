<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_vki_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-child-vki-perc',
        HC_PLUGIN_URL . 'modules/cocuk-vki-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-child-vki-perc-css',
        HC_PLUGIN_URL . 'modules/cocuk-vki-persentil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-child-vki-perc">
        <h3>Çocuk VKİ Persentil Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-cvp-age">Yaş (2-20):</label>
            <input type="number" id="hc-cvp-age" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cvp-vki">VKİ Değeri:</label>
            <input type="number" id="hc-cvp-vki" placeholder="18.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcChildVkiPercHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-child-vki-perc-result">
            <strong>Durum:</strong>
            <div id="hc-cvp-res-status" class="hc-result-value">-</div>
            <p id="hc-cvp-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
