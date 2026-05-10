<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_k_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-k-factor',
        HC_PLUGIN_URL . 'modules/k-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-k-factor-css',
        HC_PLUGIN_URL . 'modules/k-faktoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kfact">
        <h3>Sac Büküm K-Faktörü Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-kf-thick">Malzeme Kalınlığı (T - mm):</label>
            <input type="number" id="hc-kf-thick" step="0.1" placeholder="2.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kf-radius">Büküm İç Yarıçapı (R - mm):</label>
            <input type="number" id="hc-kf-radius" step="0.1" placeholder="2.0">
        </div>
        <button class="hc-btn" onclick="hcKFactorHesapla()">K-Faktörü Tahmin Et</button>
        <div class="hc-result" id="hc-k-factor-result">
            <strong>Hesaplanan K-Faktörü:</strong>
            <div id="hc-kf-res-val" class="hc-result-value">-</div>
            <p id="hc-kf-msg" style="margin-top:10px; font-size:0.85rem; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
