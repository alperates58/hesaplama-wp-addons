<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_baz_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bps',
        HC_PLUGIN_URL . 'modules/baz-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bps-css',
        HC_PLUGIN_URL . 'modules/baz-puan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bps">
        <h3>Baz Puan (BPS) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bps-val">Miktar</label>
            <input type="number" id="hc-bps-val" value="100" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-bps-dir">Dönüştür</label>
            <select id="hc-bps-dir">
                <option value="bps-to-perc">Baz Puan -> Yüzde (%)</option>
                <option value="perc-to-bps">Yüzde (%) -> Baz Puan</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBPSHesapla()">Dönüştür</button>
        
        <div class="hc-result" id="hc-bps-result">
            <div class="hc-result-value" id="hc-bps-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Dönüşüm Sonucu</p>
        </div>
    </div>
    <?php
}
