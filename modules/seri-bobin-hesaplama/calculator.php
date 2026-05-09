<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_bobin_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-series-ind',
        HC_PLUGIN_URL . 'modules/seri-bobin-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-series-ind-css',
        HC_PLUGIN_URL . 'modules/seri-bobin-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-series-ind">
        <h3>Seri Bobin Eşdeğeri</h3>
        <div id="hc-si-list">
            <div class="hc-form-group">
                <label>Bobin 1 [mH]</label>
                <input type="number" class="hc-si-val" value="10">
            </div>
            <div class="hc-form-group">
                <label>Bobin 2 [mH]</label>
                <input type="number" class="hc-si-val" value="10">
            </div>
        </div>
        <button class="hc-btn" style="background:#7f8c8d; margin-bottom:10px;" onclick="hcAddInd()">+ Bobin Ekle</button>
        <button class="hc-btn" onclick="hcSeriesIndHesapla()">Eşdeğeri Hesapla</button>
        <div class="hc-result" id="hc-series-ind-result">
            <div class="hc-result-item">
                <span>Eşdeğer Endüktans (Leq):</span>
                <span class="hc-result-value" id="hc-res-si-val">0 mH</span>
            </div>
            <p class="hc-si-note">Leq = L1 + L2 + ...</p>
        </div>
    </div>
    <?php
}
