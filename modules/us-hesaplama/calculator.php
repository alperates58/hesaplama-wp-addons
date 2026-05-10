<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_us_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pow',
        HC_PLUGIN_URL . 'modules/us-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pow">
        <h3>Üs Hesaplama (aᵇ)</h3>
        <div class="hc-form-group">
            <label for="hc-p-base">Taban (a):</label>
            <input type="number" id="hc-p-base" step="any" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-p-exp">Üs (b):</label>
            <input type="number" id="hc-p-exp" step="any" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcPowHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-us-result">
            <strong>Sonuç:</strong>
            <div id="hc-p-res-val" class="hc-result-value" style="word-break:break-all;">-</div>
        </div>
    </div>
    <?php
}
