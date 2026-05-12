<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuz_olcusu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salt-conv-js',
        HC_PLUGIN_URL . 'modules/tuz-olcusu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-salt-conv-css',
        HC_PLUGIN_URL . 'modules/tuz-olcusu-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-salt-conv">
        <h3>Tuz Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-amount">Miktar</label>
            <input type="number" id="hc-sc-amount" value="1" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-from">Birim</label>
            <select id="hc-sc-from">
                <option value="18">Yemek Kaşığı (18g)</option>
                <option value="6">Tatlı Kaşığı (6g)</option>
                <option value="3">Çay Kaşığı (3g)</option>
                <option value="1">Gram (g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTuzDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-salt-conv-result">
            <div id="hc-sc-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
