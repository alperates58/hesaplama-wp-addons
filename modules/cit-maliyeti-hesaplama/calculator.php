<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fence-cost',
        HC_PLUGIN_URL . 'modules/cit-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fence-cost-css',
        HC_PLUGIN_URL . 'modules/cit-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fcost">
        <h3>Çit Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fc-len">Toplam Uzunluk (m):</label>
            <input type="number" id="hc-fc-len" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-mat">Malzeme Birim Fiyatı (TL/m):</label>
            <input type="number" id="hc-fc-mat" placeholder="250">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-labor">İşçilik Birim Fiyatı (TL/m):</label>
            <input type="number" id="hc-fc-labor" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcFenceCostHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fence-cost-result">
            <strong>Toplam Tahmini Maliyet:</strong>
            <div id="hc-fc-res-val" class="hc-result-value">-</div>
            <span>Türk Lirası (₺)</span>
        </div>
    </div>
    <?php
}
