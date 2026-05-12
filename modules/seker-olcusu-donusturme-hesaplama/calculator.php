<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seker_olcusu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sugar-conv-js',
        HC_PLUGIN_URL . 'modules/seker-olcusu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sugar-conv-css',
        HC_PLUGIN_URL . 'modules/seker-olcusu-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sugar-conv">
        <h3>Şeker Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-amount">Miktar</label>
            <input type="number" id="hc-sc-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-from">Birim</label>
            <select id="hc-sc-from">
                <option value="200">Su Bardağı (200g)</option>
                <option value="15">Yemek Kaşığı (15g)</option>
                <option value="5">Tatlı Kaşığı (5g)</option>
                <option value="1">Gram (g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSekerDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-sugar-conv-result">
            <div id="hc-sc-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
