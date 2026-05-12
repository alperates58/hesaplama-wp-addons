<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_salata_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salad-cal-js',
        HC_PLUGIN_URL . 'modules/salata-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-salad-cal-css',
        HC_PLUGIN_URL . 'modules/salata-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-salad-cal">
        <h3>Salata Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Yeşillik (Marul, Roka vb. - Gram)</label>
            <input type="number" id="hc-sc-greens" value="200" step="50">
        </div>

        <div class="hc-form-group">
            <label>Domates / Salatalık (Gram)</label>
            <input type="number" id="hc-sc-veg" value="200" step="50">
        </div>

        <div class="hc-form-group">
            <label>Zeytinyağı (Yemek Kaşığı)</label>
            <input type="number" id="hc-sc-oil" value="1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label>Protein (Peynir, Tavuk vb. - Gram)</label>
            <input type="number" id="hc-sc-prot" value="0" step="10">
        </div>

        <button class="hc-btn" onclick="hcSalataKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-salad-cal-result">
            <div class="hc-result-item">
                <span>Yaklaşık Toplam Kalori:</span>
                <strong class="hc-result-value" id="hc-sc-res-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
