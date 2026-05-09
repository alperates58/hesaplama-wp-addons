<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_turbini_kazanc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wind-earnings',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-kazanc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wind-earnings-css',
        HC_PLUGIN_URL . 'modules/ruzgar-turbini-kazanc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wind-earnings">
        <h3>Rüzgar Türbini Kazanç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-wk-prod">Aylık Üretim (MWh)</label>
            <input type="number" id="hc-wk-prod" placeholder="Örn: 800" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wk-price">Satış Birim Fiyatı (₺/kWh)</label>
            <input type="number" id="hc-wk-price" value="2.50" step="0.01">
            <small>YEKDEM veya piyasa takas fiyatı (PTF).</small>
        </div>

        <button class="hc-btn" onclick="hcRuzgarKazancHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wk-result">
            <div class="hc-result-item">
                <span>Aylık Brüt Gelir:</span>
                <span class="hc-result-value highlight" id="hc-res-wk-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tahmini Gelir:</span>
                <span class="hc-result-value" id="hc-res-wk-yearly">-</span>
            </div>
        </div>
    </div>
    <?php
}
