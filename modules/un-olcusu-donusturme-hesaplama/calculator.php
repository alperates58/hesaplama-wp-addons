<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_un_olcusu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flour-conv-js',
        HC_PLUGIN_URL . 'modules/un-olcusu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-flour-conv-css',
        HC_PLUGIN_URL . 'modules/un-olcusu-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flour-conv">
        <h3>Un Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-fc-amount">Miktar</label>
            <input type="number" id="hc-fc-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-fc-from">Birim</label>
            <select id="hc-fc-from">
                <option value="130">Su Bardağı (130g)</option>
                <option value="12">Yemek Kaşığı (12g)</option>
                <option value="1">Gram (g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcUnDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-flour-conv-result">
            <div id="hc-fc-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
