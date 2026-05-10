<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_sayi_arasi_fark_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-diff',
        HC_PLUGIN_URL . 'modules/iki-sayi-arasi-fark-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-num-diff-css',
        HC_PLUGIN_URL . 'modules/iki-sayi-arasi-fark-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-diff">
        <h3>İki Sayı Arası Fark</h3>
        <div class="hc-form-group">
            <label for="hc-df-s1">1. Sayı:</label>
            <input type="number" id="hc-df-s1" step="any" placeholder="örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-df-s2">2. Sayı:</label>
            <input type="number" id="hc-df-s2" step="any" placeholder="örn: 85">
        </div>
        <button class="hc-btn" onclick="hcNumDiffHesapla()">Farkı Hesapla</button>
        <div class="hc-result" id="hc-diff-result">
            <strong>Sayısal Fark:</strong>
            <div id="hc-df-res-val" class="hc-result-value">-</div>
            <p id="hc-df-res-msg" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
