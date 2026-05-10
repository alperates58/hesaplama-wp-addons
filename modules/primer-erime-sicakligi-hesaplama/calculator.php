<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_primer_erime_sicakligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-primer-tm',
        HC_PLUGIN_URL . 'modules/primer-erime-sicakligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-primer-tm-css',
        HC_PLUGIN_URL . 'modules/primer-erime-sicakligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-primer-tm">
        <h3>Primer Tm Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pt-seq">Primer Dizisi (5' -> 3'):</label>
            <input type="text" id="hc-pt-seq" placeholder="ATGC..." style="text-transform: uppercase;">
        </div>
        <button class="hc-btn" onclick="hcPrimerTmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-primer-tm-result">
            <strong>Tahmini Erime Sıcaklığı (Tm):</strong>
            <div id="hc-pt-res-val" class="hc-result-value">-</div>
            <span>°C</span>
            <small style="display:block; margin-top:10px;">Wallace-Itakura Kuralı (2*(A+T) + 4*(G+C)) kullanılmaktadır.</small>
        </div>
    </div>
    <?php
}
