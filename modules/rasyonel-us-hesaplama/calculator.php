<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rasyonel_us_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frac-exp',
        HC_PLUGIN_URL . 'modules/rasyonel-us-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-frac-exp">
        <h3>Rasyonel Üs Hesaplama (a<sup>b/c</sup>)</h3>
        <div class="hc-form-group">
            <label for="hc-fe-base">Taban (a):</label>
            <input type="number" id="hc-fe-base" step="any" placeholder="8">
        </div>
        <div class="hc-form-group">
            <label>Üs (b/c):</label>
            <div style="display:flex; align-items:center; gap:10px;">
                <input type="number" id="hc-fe-num" placeholder="2" style="width:45%">
                <span>/</span>
                <input type="number" id="hc-fe-den" placeholder="3" style="width:45%">
            </div>
        </div>
        <button class="hc-btn" onclick="hcFracExpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rasyonel-us-result">
            <strong>Sonuç:</strong>
            <div id="hc-fe-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
