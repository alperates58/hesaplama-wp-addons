<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_verimliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-efficiency',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-verimliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eve-box">
        <h3>Elektrikli Araç Verimliliği</h3>
        <div class="hc-form-group">
            <label>Kat Edilen Mesafe (km)</label>
            <input type="number" id="hc-eve-distance" placeholder="Örn: 350">
        </div>
        <div class="hc-form-group">
            <label>Harcanan Enerji (kWh)</label>
            <input type="number" step="0.1" id="hc-eve-energy" placeholder="Örn: 52.5">
        </div>
        <button class="hc-btn" onclick="hcEveHesapla()">Verimliliği Hesapla</button>
        <div class="hc-result" id="hc-eve-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Verimlilik:</strong><br><span id="hc-eve-val1">-</span></div>
                <div><strong>Wh/km:</strong><br><span id="hc-eve-val2">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
