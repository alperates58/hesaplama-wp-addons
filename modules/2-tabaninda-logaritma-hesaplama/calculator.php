<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_2_tabaninda_logaritma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-log2',
        HC_PLUGIN_URL . 'modules/2-tabaninda-logaritma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-log2-css',
        HC_PLUGIN_URL . 'modules/2-tabaninda-logaritma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-log2">
        <h3>2 Tabanında Logaritma (log₂)</h3>
        
        <div class="hc-form-group">
            <label for="hc-l2-val">Sayı (x)</label>
            <input type="number" id="hc-l2-val" placeholder="Örn: 256" step="any">
            <small>log₂x hesaplanır.</small>
        </div>

        <button class="hc-btn" onclick="hcLog2Hesapla()">Hesapla</button>

        <div class="hc-result" id="hc-l2-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value highlight" id="hc-res-l2-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tam Kısım:</span>
                <span class="hc-result-value" id="hc-res-l2-floor">-</span>
            </div>
        </div>
    </div>
    <?php
}
