<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mutfak_olcu_birimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kitchen-units',
        HC_PLUGIN_URL . 'modules/mutfak-olcu-birimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kitchen-units-calc">
        <h3>Mutfak Ölçü Birimi Çevirici</h3>
        <div class="hc-form-group">
            <label for="hc-unit-val">Miktar:</label>
            <input type="number" id="hc-unit-val" placeholder="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-unit-from">Şu Birimden:</label>
            <select id="hc-unit-from">
                <option value="200">Su Bardağı (200ml)</option>
                <option value="100">Çay Bardağı (100ml)</option>
                <option value="15">Yemek Kaşığı (15ml)</option>
                <option value="5">Çay Kaşığı (5ml)</option>
                <option value="1">Mililitre (ml)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKitchenUnitsHesapla()">Tümüne Çevir</button>
        <div class="hc-result" id="hc-kitchen-units-result">
            <strong>Eşdeğer Ölçüler:</strong>
            <div id="hc-unit-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
