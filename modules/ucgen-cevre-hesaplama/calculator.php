<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucgen_cevre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-peri',
        HC_PLUGIN_URL . 'modules/ucgen-cevre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tri-p">
        <h3>Üçgen Çevre Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Kenar (m):</label><input type="number" id="hc-tp-a" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label>2. Kenar (m):</label><input type="number" id="hc-tp-b" placeholder="6">
        </div>
        <div class="hc-form-group">
            <label>3. Kenar (m):</label><input type="number" id="hc-tp-c" placeholder="7">
        </div>
        <button class="hc-btn" onclick="hcTriPeriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ucgen-cevre-result">
            <strong>Çevre:</strong>
            <div id="hc-tp-res-val" class="hc-result-value">-</div>
            <span>m</span>
        </div>
    </div>
    <?php
}
