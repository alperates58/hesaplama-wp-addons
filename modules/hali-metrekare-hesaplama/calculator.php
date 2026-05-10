<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hali_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hali-metrekare-hesaplama',
        HC_PLUGIN_URL . 'modules/hali-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hali-metrekare-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hali-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rug-sqm">
        <h3>Halı Metrekare ve Yıkama Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-rm-w">Genişlik (cm)</label>
            <input type="number" id="hc-rm-w" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-rm-l">Boy (cm)</label>
            <input type="number" id="hc-rm-l" placeholder="Örn: 300">
        </div>
        <div class="hc-form-group">
            <label for="hc-rm-price">m² Yıkama Fiyatı (₺ - Opsiyonel)</label>
            <input type="number" id="hc-rm-price" value="50">
        </div>
        <button class="hc-btn" onclick="hcHalıMetrekareHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rm-result">
            <div class="hc-result-label">Toplam Alan:</div>
            <div class="hc-result-value" id="hc-rm-val">-</div>
            <div id="hc-rm-cost" style="margin-top:10px; font-weight:bold; color:#27ae60;"></div>
        </div>
    </div>
    <?php
}
