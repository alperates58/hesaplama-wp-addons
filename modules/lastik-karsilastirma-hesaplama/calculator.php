<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tire-comp-v2',
        HC_PLUGIN_URL . 'modules/lastik-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tc2-box">
        <h3>Lastik Ölçüsü Karşılaştırma Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-form-section">
                <h4>Lastik 1</h4>
                <input type="number" id="hc-tc2-w1" value="205" placeholder="Genişlik">
                <input type="number" id="hc-tc2-r1" value="55" placeholder="Oran">
                <input type="number" id="hc-tc2-d1" value="16" placeholder="Jant">
            </div>
            <div class="hc-form-section">
                <h4>Lastik 2</h4>
                <input type="number" id="hc-tc2-w2" value="225" placeholder="Genişlik">
                <input type="number" id="hc-tc2-r2" value="45" placeholder="Oran">
                <input type="number" id="hc-tc2-d2" value="17" placeholder="Jant">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTc2Hesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-tc2-result">
            <div class="hc-result-title">Çap Farkı:</div>
            <div class="hc-result-value" id="hc-tc2-val">-</div>
        </div>
    </div>
    <?php
}
