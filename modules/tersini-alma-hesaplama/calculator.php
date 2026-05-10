<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tersini_alma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inverse',
        HC_PLUGIN_URL . 'modules/tersini-alma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-inv">
        <h3>Tersini Alma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-i-val">Sayı:</label>
            <input type="number" id="hc-i-val" step="any" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcInverseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tersini-alma-result">
            <div style="margin-bottom:10px;">
                <strong>Toplamsal Ters (-x):</strong>
                <div id="hc-i-res-add" class="hc-result-value">-</div>
            </div>
            <div>
                <strong>Çarpımsal Ters (1/x):</strong>
                <div id="hc-i-res-mul" class="hc-result-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
