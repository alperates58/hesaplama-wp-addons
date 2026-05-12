<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarimsak_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-garlic-size-js',
        HC_PLUGIN_URL . 'modules/sarimsak-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-garlic-size-css',
        HC_PLUGIN_URL . 'modules/sarimsak-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-garlic-size">
        <h3>Sarımsak Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-gs-amount">Miktar</label>
            <input type="number" id="hc-gs-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-gs-from">Birim</label>
            <select id="hc-gs-from">
                <option value="4">Diş (Orta Boy)</option>
                <option value="15">Yemek Kaşığı (Ezilmiş)</option>
                <option value="5">Tatlı Kaşığı (Ezilmiş)</option>
                <option value="1">Gram (g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSarimsakDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-garlic-size-result">
            <div id="hc-gs-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
