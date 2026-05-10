<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikroskop_buyutme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mic-mag',
        HC_PLUGIN_URL . 'modules/mikroskop-buyutme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mic-mag-css',
        HC_PLUGIN_URL . 'modules/mikroskop-buyutme-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mic-mag">
        <h3>Mikroskop Büyütme Gücü</h3>
        <div class="hc-form-group">
            <label for="hc-mm-ocular">Oküler Lens Büyütmesi (X):</label>
            <input type="number" id="hc-mm-ocular" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-mm-obj">Objektif Lens Büyütmesi (X):</label>
            <input type="number" id="hc-mm-obj" placeholder="40">
        </div>
        <button class="hc-btn" onclick="hcMicMagHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mic-mag-result">
            <strong>Toplam Büyütme:</strong>
            <div id="hc-mm-res-val" class="hc-result-value">-</div>
            <span>X</span>
        </div>
    </div>
    <?php
}
