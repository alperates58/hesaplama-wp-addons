<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rlc_devresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rlc-circuit',
        HC_PLUGIN_URL . 'modules/rlc-devresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rlc-circuit-css',
        HC_PLUGIN_URL . 'modules/rlc-devresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rlc-circuit">
        <h3>RLC Rezonans Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-rc-l">Endüktans (L) [mH]</label>
            <input type="number" id="hc-rc-l" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-c">Kapasitans (C) [μF]</label>
            <input type="number" id="hc-rc-c" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-r">Direnç (R) [Ω]</label>
            <input type="number" id="hc-rc-r" value="5">
        </div>
        <button class="hc-btn" onclick="hcRlcCircuitHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-rlc-circuit-result">
            <div class="hc-result-item">
                <span>Rezonans Frekansı (fr):</span>
                <span class="hc-result-value" id="hc-res-rc-fr">0 Hz</span>
            </div>
            <div class="hc-result-item">
                <span>Q Faktörü:</span>
                <span id="hc-res-rc-q">0</span>
            </div>
            <div class="hc-result-item">
                <span>Bant Genişliği (BW):</span>
                <span id="hc-res-rc-bw">0 Hz</span>
            </div>
        </div>
    </div>
    <?php
}
