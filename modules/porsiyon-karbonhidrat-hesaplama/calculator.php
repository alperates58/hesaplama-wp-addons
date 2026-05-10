<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_porsiyon_karbonhidrat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-port-carb',
        HC_PLUGIN_URL . 'modules/porsiyon-karbonhidrat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-port-carb-calc">
        <h3>Karbonhidrat Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pc-type">Gıda Grubu:</label>
            <select id="hc-pc-type">
                <option value="28">Pilav / Makarna (100g -> 28g)</option>
                <option value="50">Ekmek (100g -> 50g)</option>
                <option value="15">Meyve (100g -> 15g)</option>
                <option value="5">Sebze (100g -> 5g)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-weight">Miktar (Gram):</label>
            <input type="number" id="hc-pc-weight" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcPortCarbHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-porsiyon-karbonhidrat-result">
            <strong>Toplam Karbonhidrat:</strong>
            <div id="hc-pc-res" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
