<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mutfak_olcu_birimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kitchen-units-js',
        HC_PLUGIN_URL . 'modules/mutfak-olcu-birimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kitchen-units-css',
        HC_PLUGIN_URL . 'modules/mutfak-olcu-birimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kitchen-units">
        <h3>Mutfak Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-ku-amount">Miktar</label>
            <input type="number" id="hc-ku-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-ku-from">Nereden</label>
            <select id="hc-ku-from">
                <option value="200">Su Bardağı (200ml)</option>
                <option value="100">Çay Bardağı (100ml)</option>
                <option value="15">Yemek Kaşığı (15ml)</option>
                <option value="10">Tatlı Kaşığı (10ml)</option>
                <option value="5">Çay Kaşığı (5ml)</option>
                <option value="1">Mililitre (ml)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMutfakOlcuDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-kitchen-units-result">
            <div id="hc-ku-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
