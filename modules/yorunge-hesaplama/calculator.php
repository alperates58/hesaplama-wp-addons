<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yorunge_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orbit-calc',
        HC_PLUGIN_URL . 'modules/yorunge-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orbit-calc-css',
        HC_PLUGIN_URL . 'modules/yorunge-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orbit-calc">
        <h3>Yörünge Hızı ve Periyodu</h3>
        <div class="hc-form-group">
            <label for="hc-oc-m">Merkezi Cismin Kütlesi (M) [kg]</label>
            <input type="number" id="hc-oc-m" value="5.972e24" step="1e20">
            <small>Varsayılan: Dünya</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-oc-r">Yörünge Yarıçapı (r) [km]</label>
            <input type="number" id="hc-oc-r" value="7000" step="1">
            <small>Merkezden olan mesafe</small>
        </div>
        <button class="hc-btn" onclick="hcOrbitHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orbit-calc-result">
            <div class="hc-result-item">
                <span>Yörünge Hızı (v):</span>
                <span class="hc-result-value" id="hc-res-oc-v">0 km/s</span>
            </div>
            <div class="hc-result-item">
                <span>Yörünge Periyodu (T):</span>
                <span id="hc-res-oc-t">0 dk</span>
            </div>
        </div>
    </div>
    <?php
}
