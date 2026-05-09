<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basamak_degeri_acilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-place-value-exp',
        HC_PLUGIN_URL . 'modules/basamak-degeri-acilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-place-value-exp-css',
        HC_PLUGIN_URL . 'modules/basamak-degeri-acilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pv-expansion">
        <h3>Basamak Değeri Açılımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-pve-val">Sayı</label>
            <input type="number" id="hc-pve-val" placeholder="Örn: 4852" step="1">
        </div>

        <button class="hc-btn" onclick="hcBasamakAcilimHesapla()">Çözümle</button>

        <div class="hc-result" id="hc-pve-result">
            <div class="hc-result-item">
                <span>Çözümleme:</span>
                <span class="hc-result-value highlight" id="hc-res-pve-val">-</span>
            </div>
            <div id="hc-res-pve-list" class="hc-pve-list">
                <!-- Detailed list here -->
            </div>
        </div>
    </div>
    <?php
}
