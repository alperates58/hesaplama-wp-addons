<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_western_blot_normalizasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wb-norm',
        HC_PLUGIN_URL . 'modules/western-blot-normalizasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wb-norm-css',
        HC_PLUGIN_URL . 'modules/western-blot-normalizasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wb-norm">
        <h3>Western Blot Normalizasyon</h3>
        <div class="hc-form-group">
            <label for="hc-wn-target">Hedef Protein Yoğunluğu:</label>
            <input type="number" id="hc-wn-target" placeholder="50000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wn-control">Yükleme Kontrolü (Aktin/GAPDH) Yoğunluğu:</label>
            <input type="number" id="hc-wn-control" placeholder="100000">
        </div>
        <button class="hc-btn" onclick="hcWbNormHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wb-norm-result">
            <strong>Normalize Edilmiş Oran:</strong>
            <div id="hc-wn-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
