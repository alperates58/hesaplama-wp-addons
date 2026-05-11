<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-getiri',
        HC_PLUGIN_URL . 'modules/yuzde-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-getiri-css',
        HC_PLUGIN_URL . 'modules/yuzde-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-g">
        <h3>Yüzde Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yg-first">İlk Değer / Alış Fiyatı</label>
            <input type="number" id="hc-yg-first" placeholder="Örn: 100" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-yg-last">Son Değer / Satış Fiyatı</label>
            <input type="number" id="hc-yg-last" placeholder="Örn: 125" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcYuzdeGetiriHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-yg-result">
            <div class="hc-result-item">
                <span>Yüzdesel Değişim:</span>
                <strong class="hc-result-value" id="hc-yg-res-ratio">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Fark:</span>
                <strong id="hc-yg-res-diff">-</strong>
            </div>
        </div>
    </div>
    <?php
}
