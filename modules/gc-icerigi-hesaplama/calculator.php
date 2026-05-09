<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gc_icerigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gc-icerigi-hesaplama',
        HC_PLUGIN_URL . 'modules/gc-icerigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gc-icerigi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gc-icerigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gc-icerigi-hesaplama">
        <h3>GC İçeriği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gc-seq">DNA Dizisi</label>
            <textarea id="hc-gc-seq" rows="4" placeholder="Örn: ATGC..."></textarea>
        </div>
        <button class="hc-btn" onclick="hcGCIcerigiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gc-result">
            <div class="hc-result-label">GC Yüzdesi:</div>
            <div class="hc-result-value" id="hc-gc-val">-</div>
            <div class="hc-gc-stats" id="hc-gc-stats"></div>
        </div>
    </div>
    <?php
}
