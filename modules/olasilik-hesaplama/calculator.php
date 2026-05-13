<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olasilik-hesaplama',
        HC_PLUGIN_URL . 'modules/olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olasilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olasilik-hesaplama">
        <h3>Temel Olasılık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-prob-favorable">İstenen Durum Sayısı</label>
            <input type="number" id="hc-prob-favorable" min="0" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-prob-total">Tüm Olası Durumların Sayısı</label>
            <input type="number" id="hc-prob-total" min="1" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcOlasilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olasilik-hesaplama-result">
            <span class="hc-label">Olasılık:</span>
            <div class="hc-result-value" id="hc-prob-res-val">0</div>
            <div id="hc-prob-res-percent" style="margin-top:10px; font-weight:bold; color:#2980b9;"></div>
            <div id="hc-prob-res-odds" style="margin-top:5px; color:#777; font-size:0.9rem;"></div>
        </div>
    </div>
    <?php
}
