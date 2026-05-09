<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_kondansator_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-series-cap',
        HC_PLUGIN_URL . 'modules/seri-kondansator-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-series-cap-css',
        HC_PLUGIN_URL . 'modules/seri-kondansator-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-series-cap">
        <h3>Seri Kondansatör Eşdeğeri</h3>
        <div id="hc-sc-list">
            <div class="hc-form-group">
                <label>Kondansatör 1 [μF]</label>
                <input type="number" class="hc-sc-val" value="10">
            </div>
            <div class="hc-form-group">
                <label>Kondansatör 2 [μF]</label>
                <input type="number" class="hc-sc-val" value="10">
            </div>
        </div>
        <button class="hc-btn" style="background:#7f8c8d; margin-bottom:10px;" onclick="hcAddCap()">+ Kondansatör Ekle</button>
        <button class="hc-btn" onclick="hcSeriesCapHesapla()">Eşdeğeri Hesapla</button>
        <div class="hc-result" id="hc-series-cap-result">
            <div class="hc-result-item">
                <span>Eşdeğer Kapasite (Ceq):</span>
                <span class="hc-result-value" id="hc-res-sc-val">0 μF</span>
            </div>
            <p class="hc-sc-note">1 / Ceq = 1/C1 + 1/C2 + ...</p>
        </div>
    </div>
    <?php
}
