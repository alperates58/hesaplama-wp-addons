<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vektor_toplama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vec-add',
        HC_PLUGIN_URL . 'modules/vektor-toplama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-va">
        <h3>Vektör Toplama (A + B)</h3>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <h4>Vektör A</h4>
                <div class="hc-form-group"><label>Ax:</label><input type="number" id="hc-va-ax" placeholder="2"></div>
                <div class="hc-form-group"><label>Ay:</label><input type="number" id="hc-va-ay" placeholder="3"></div>
            </div>
            <div>
                <h4>Vektör B</h4>
                <div class="hc-form-group"><label>Bx:</label><input type="number" id="hc-va-bx" placeholder="4"></div>
                <div class="hc-form-group"><label>By:</label><input type="number" id="hc-va-by" placeholder="1"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcVecAddHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vektor-toplama-result">
            <strong>Bileşke Vektör (R):</strong>
            <div id="hc-va-res-val" class="hc-result-value">-</div>
            <p id="hc-va-mag" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
