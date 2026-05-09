<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tirmanma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-roc-calc',
        HC_PLUGIN_URL . 'modules/tirmanma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-roc-calc-css',
        HC_PLUGIN_URL . 'modules/tirmanma-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roc-calc">
        <h3>Tırmanma Hızı (Rate of Climb)</h3>
        <div class="hc-form-group">
            <label for="hc-roc-power">Fazla Güç (Excess Power) [HP]</label>
            <input type="number" id="hc-roc-power" value="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-roc-weight">Uçak Ağırlığı [kg]</label>
            <input type="number" id="hc-roc-weight" value="1200">
        </div>
        <button class="hc-btn" onclick="hcROCHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-roc-calc-result">
            <div class="hc-result-item">
                <span>Tırmanma Hızı:</span>
                <span class="hc-result-value" id="hc-res-roc-val">0 fpm</span>
            </div>
            <p class="hc-roc-note">fpm: fit/dakika</p>
        </div>
    </div>
    <?php
}
