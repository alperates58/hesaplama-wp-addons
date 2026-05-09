<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genetik_uzaklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-genetik-uzaklik-hesaplama',
        HC_PLUGIN_URL . 'modules/genetik-uzaklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-genetik-uzaklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/genetik-uzaklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-genetik-uzaklik-hesaplama">
        <h3>Genetik Uzaklık (p-distance) Hesaplama</h3>
        <p style="font-size: 0.85em; margin-bottom: 15px; opacity: 0.8;">İki dizi arasındaki farklılık oranını hesaplar.</p>
        <div class="hc-form-group">
            <label for="hc-gd-seq1">1. Dizi</label>
            <textarea id="hc-gd-seq1" rows="3" placeholder="Örn: ATGC..."></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-gd-seq2">2. Dizi</label>
            <textarea id="hc-gd-seq2" rows="3" placeholder="Örn: ATCC..."></textarea>
        </div>
        <button class="hc-btn" onclick="hcGenetikUzaklikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gd-result">
            <div class="hc-result-label">Genetik Uzaklık (d):</div>
            <div class="hc-result-value" id="hc-gd-val">-</div>
            <div class="hc-result-note" id="hc-gd-note"></div>
        </div>
    </div>
    <?php
}
