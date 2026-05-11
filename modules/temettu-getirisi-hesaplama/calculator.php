<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temettu_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-temettu-getiri',
        HC_PLUGIN_URL . 'modules/temettu-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-temettu-getiri-css',
        HC_PLUGIN_URL . 'modules/temettu-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temettu-g">
        <h3>Temettü Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tg-shares">Hisse Adedi</label>
            <input type="number" id="hc-tg-shares" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tg-per-share">Hisse Başı Brüt Temettü (₺)</label>
            <input type="number" id="hc-tg-per-share" placeholder="Örn: 2.50" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcTemettuGetirisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tg-result">
            <div class="hc-result-item">
                <span>Brüt Temettü Toplamı:</span>
                <strong id="hc-tg-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Kesintisi (%10):</span>
                <strong id="hc-tg-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Temettü Kazancı:</span>
                <strong class="hc-result-value" id="hc-tg-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
