<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ph_poh_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ph-poh-donusumu-hesaplama',
        HC_PLUGIN_URL . 'modules/ph-poh-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ph-poh-donusumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ph-poh-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ph-poh-conv">
        <h3>pH ➔ pOH Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-pp-val">Değer</label>
            <input type="number" id="hc-pp-val" placeholder="Örn: 5.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-type">Giriş Tipi</label>
            <select id="hc-pp-type">
                <option value="ph">pH</option>
                <option value="poh">pOH</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcpHpOHDönüşümüHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-pp-result">
            <div class="hc-result-label">Karşılığı:</div>
            <div class="hc-result-value" id="hc-pp-res">-</div>
        </div>
    </div>
    <?php
}
