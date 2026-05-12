<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tereyagi_olcusu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-butter-conv-js',
        HC_PLUGIN_URL . 'modules/tereyagi-olcusu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-butter-conv-css',
        HC_PLUGIN_URL . 'modules/tereyagi-olcusu-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-butter-conv">
        <h3>Tereyağı Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-bc-amount">Miktar</label>
            <input type="number" id="hc-bc-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-from">Birim</label>
            <select id="hc-bc-from">
                <option value="225">Su Bardağı (225g)</option>
                <option value="14">Yemek Kaşığı (14g)</option>
                <option value="250">Paket (250g)</option>
                <option value="1">Gram (g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTereyagiDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-butter-conv-result">
            <div id="hc-bc-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
