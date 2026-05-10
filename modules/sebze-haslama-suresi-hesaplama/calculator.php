<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sebze_haslama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-veg-boil',
        HC_PLUGIN_URL . 'modules/sebze-haslama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-veg-boil-calc">
        <h3>Sebze Haşlama Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-vb-type">Sebze:</label>
            <select id="hc-vb-type">
                <option value="3-5">Bezelye</option>
                <option value="10-15">Havuç (Dilimlenmiş)</option>
                <option value="15-20">Patates (Küp Doğranmış)</option>
                <option value="3-4">Brokoli / Karnabahar</option>
                <option value="2-3">Ispanak</option>
                <option value="5-8">Taze Fasulye</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVegBoilHesapla()">Süreyi Gör</button>
        <div class="hc-result" id="hc-veg-boil-result">
            <strong>İdeal Süre:</strong>
            <div id="hc-vb-val" class="hc-result-value">-</div>
            <p id="hc-vb-info"></p>
        </div>
    </div>
    <?php
}
