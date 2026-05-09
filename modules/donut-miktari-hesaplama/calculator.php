<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donut_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-donut-qty',
        HC_PLUGIN_URL . 'modules/donut-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-donut-qty-css',
        HC_PLUGIN_URL . 'modules/donut-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-donut-qty">
        <h3>Donut Miktarı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-dq-people">Kişi Sayısı</label>
            <input type="number" id="hc-dq-people" value="12" min="1">
        </div>
        <button class="hc-btn" onclick="hcDonutQtyHesapla()">Miktarı Gör</button>
        <div class="hc-result" id="hc-donut-qty-result">
            <div class="hc-result-item">
                <span>Gereken Adet:</span>
                <span class="hc-result-value" id="hc-res-dq-count">0 Adet</span>
            </div>
            <div class="hc-result-item">
                <span>12'li Kutu Sayısı:</span>
                <span id="hc-res-dq-boxes">0 Kutu</span>
            </div>
        </div>
    </div>
    <?php
}
