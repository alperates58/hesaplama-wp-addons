<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sivi_olcu_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-liquid-conv-js',
        HC_PLUGIN_URL . 'modules/sivi-olcu-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-liquid-conv-css',
        HC_PLUGIN_URL . 'modules/sivi-olcu-birimi-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-liquid-conv">
        <h3>Sıvı Ölçü Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-lc-amount">Miktar</label>
            <input type="number" id="hc-lc-amount" value="1" min="0" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-lc-from">Birim</label>
            <select id="hc-lc-from">
                <option value="1000">Litre (L)</option>
                <option value="1">Mililitre (ml)</option>
                <option value="200">Su Bardağı (200ml)</option>
                <option value="29.57">Sıvı Ons (fl oz)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSiviDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-liquid-conv-result">
            <div id="hc-lc-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
