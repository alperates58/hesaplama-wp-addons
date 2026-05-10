<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zarar_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-loss-pct',
        HC_PLUGIN_URL . 'modules/zarar-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lp">
        <h3>Zarar Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Alış Fiyatı (₺):</label><input type="number" id="hc-lp-buy" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label>Satış Fiyatı (₺):</label><input type="number" id="hc-lp-sell" placeholder="800">
        </div>
        <button class="hc-btn" onclick="hcLossPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-zarar-yuzdesi-result">
            <strong>Zarar Oranı:</strong>
            <div id="hc-lp-res-val" class="hc-result-value">-</div>
            <p id="hc-lp-diff" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
