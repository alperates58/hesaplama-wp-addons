<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transferrin_saturasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-transferrin-saturasyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/transferrin-saturasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-transferrin-saturasyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/transferrin-saturasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transferrin">
        <h3>Transferrin Saturasyonu (%)</h3>
        <div class="hc-form-group">
            <label for="hc-ts-iron">Serum Demiri (µg/dL)</label>
            <input type="number" id="hc-ts-iron" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ts-tibc">TIBC (Toplam Demir Bağlama Kapasitesi)</label>
            <input type="number" id="hc-ts-tibc" placeholder="300">
        </div>
        <button class="hc-btn" onclick="hcTransferrinHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ts-result">
            <div class="hc-result-label">Saturasyon:</div>
            <div class="hc-result-value" id="hc-ts-val">-</div>
            <p id="hc-ts-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
