<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yatirim_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yatirim-getirisi',
        HC_PLUGIN_URL . 'modules/yatirim-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yatirim-getirisi-css',
        HC_PLUGIN_URL . 'modules/yatirim-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roi-calc">
        <h3>Yatırım Getirisi (ROI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-roi-cost">Yatırım Maliyeti (₺)</label>
            <input type="number" id="hc-roi-cost" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-roi-current">Güncel Değer / Satış Bedeli (₺)</label>
            <input type="number" id="hc-roi-current" placeholder="Örn: 150.000">
        </div>
        <button class="hc-btn" onclick="hcRoiHesapla()">ROI Hesapla</button>
        <div class="hc-result" id="hc-roi-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-roi-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yatırım Getirisi (ROI):</span>
                <strong class="hc-result-value" id="hc-roi-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
