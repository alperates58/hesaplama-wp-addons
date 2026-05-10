<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ussun_ussu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-of-exp',
        HC_PLUGIN_URL . 'modules/ussun-ussu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eoe">
        <h3>Üssün Üssü ( (aˣ)ʸ = aˣʸ )</h3>
        <div class="hc-form-group">
            <label>Taban (a):</label><input type="number" id="hc-ee-a" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label>İç Üs (x):</label><input type="number" id="hc-ee-x" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label>Dış Üs (y):</label><input type="number" id="hc-ee-y" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcExpExpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ussun-ussu-result">
            <strong>Sonuç:</strong>
            <div id="hc-ee-res-val" class="hc-result-value">-</div>
            <p id="hc-ee-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
