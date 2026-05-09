<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uretim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-production-cost',
        HC_PLUGIN_URL . 'modules/uretim-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-production-cost-css',
        HC_PLUGIN_URL . 'modules/uretim-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-production-cost">
        <h3>Üretim Maliyeti Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-pc-mat">Hammadde / Malzeme Maliyeti [₺]</label>
            <input type="number" id="hc-pc-mat" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-labor">İşçilik Maliyeti [₺]</label>
            <input type="number" id="hc-pc-labor" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-oh">Genel Üretim Giderleri (Overhead) [₺]</label>
            <input type="number" id="hc-pc-oh" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-qty">Üretim Adedi</label>
            <input type="number" id="hc-pc-qty" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcProductionCostHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-production-cost-result">
            <div class="hc-result-item">
                <span>Birim Maliyet:</span>
                <span class="hc-result-value" id="hc-res-pc-unit">0 ₺</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Maliyet:</span>
                <span id="hc-res-pc-total">0 ₺</span>
            </div>
        </div>
    </div>
    <?php
}
