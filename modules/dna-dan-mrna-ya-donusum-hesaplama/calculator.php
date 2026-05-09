<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dna_dan_mrna_ya_donusum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dna-dan-mrna-ya-donusum-hesaplama',
        HC_PLUGIN_URL . 'modules/dna-dan-mrna-ya-donusum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dna-dan-mrna-ya-donusum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dna-dan-mrna-ya-donusum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dna-dan-mrna-ya-donusum-hesaplama">
        <h3>DNA'dan mRNA'ya Dönüşüm (Transkripsiyon)</h3>
        <div class="hc-form-group">
            <label for="hc-dna-seq">DNA Dizisi (5' → 3')</label>
            <textarea id="hc-dna-seq" rows="4" placeholder="Örn: ATGC..."></textarea>
        </div>
        <button class="hc-btn" onclick="hcDNAMRNADonustur()">Dönüştür</button>
        <div class="hc-result" id="hc-dna-mrna-result">
            <div class="hc-result-label">mRNA Dizisi:</div>
            <div class="hc-dna-output" id="hc-mrna-val">-</div>
            <div class="hc-result-note">
                Not: Coding strand (anlamlı iplik) girişi yapıldığı varsayılmıştır (T → U dönüşümü).
            </div>
        </div>
    </div>
    <?php
}
