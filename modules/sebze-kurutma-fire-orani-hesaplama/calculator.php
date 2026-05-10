<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sebze_kurutma_fire_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-veg-dry',
        HC_PLUGIN_URL . 'modules/sebze-kurutma-fire-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-veg-dry-calc">
        <h3>Sebze Kurutma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vd-type">Sebze Türü:</label>
            <select id="hc-vd-type">
                <option value="12">Domates (~12 kg -> 1 kg kuru)</option>
                <option value="10">Biber (~10 kg -> 1 kg kuru)</option>
                <option value="15">Patlıcan (~15 kg -> 1 kg kuru)</option>
                <option value="8">Havuç (~8 kg -> 1 kg kuru)</option>
                <option value="20">Kabak (~20 kg -> 1 kg kuru)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vd-amount">Taze Sebze Miktarı (kg):</label>
            <input type="number" id="hc-vd-amount" placeholder="10" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcVegDryHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-veg-dry-result">
            <strong>Tahmini Kuru Ürün:</strong>
            <div id="hc-vd-val" class="hc-result-value">-</div>
            <p id="hc-vd-info"></p>
        </div>
    </div>
    <?php
}
