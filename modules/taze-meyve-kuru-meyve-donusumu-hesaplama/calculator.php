<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_taze_meyve_kuru_meyve_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fruit-dry-conv',
        HC_PLUGIN_URL . 'modules/taze-meyve-kuru-meyve-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fruit-dry-conv-calc">
        <h3>Meyve Dönüşümü (Taze-Kuru)</h3>
        <div class="hc-form-group">
            <label for="hc-fc-orig">Elinizdeki Ölçü:</label>
            <select id="hc-fc-type">
                <option value="fresh-to-dry">Taze Meyve -> Kuru Meyve</option>
                <option value="dry-to-fresh">Kuru Meyve -> Taze Meyve</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-val">Miktar (g):</label>
            <input type="number" id="hc-fc-val" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcFruitDryConvHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-fruit-dry-conv-result">
            <strong>Eşdeğer Ölçü:</strong>
            <div id="hc-fc-res" class="hc-result-value">-</div>
            <p id="hc-fc-info"></p>
        </div>
    </div>
    <?php
}
