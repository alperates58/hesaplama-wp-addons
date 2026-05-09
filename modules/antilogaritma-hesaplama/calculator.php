<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_antilogaritma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-antilog',
        HC_PLUGIN_URL . 'modules/antilogaritma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-antilog-css',
        HC_PLUGIN_URL . 'modules/antilogaritma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-antilog">
        <h3>Antilogaritma Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-al-base">Taban (b)</label>
            <input type="number" id="hc-al-base" value="10" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-al-log">Logaritma Değeri (y)</label>
            <input type="number" id="hc-al-log" placeholder="Örn: 2" step="any">
            <small>x = bʸ hesaplanır.</small>
        </div>

        <button class="hc-btn" onclick="hcAntilogHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-al-result">
            <div class="hc-result-item">
                <span>Sonuç (x):</span>
                <span class="hc-result-value highlight" id="hc-res-al-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
