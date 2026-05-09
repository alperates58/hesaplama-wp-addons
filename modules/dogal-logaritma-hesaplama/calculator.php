<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dogal_logaritma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dogal-logaritma-hesaplama', HC_PLUGIN_URL . 'modules/dogal-logaritma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dogal-logaritma-hesaplama-css', HC_PLUGIN_URL . 'modules/dogal-logaritma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dogal-logaritma-hesaplama">
        <h3>Doğal Logaritma Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-dlog-x">Sayı (x &gt; 0)</label><input type="number" id="hc-dlog-x" placeholder="örn. 7.389" step="any" min="0.000001" /></div>
        <button class="hc-btn" onclick="hcDogalLogaritmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogal-logaritma-hesaplama-result"></div>
    </div>
    <?php
}
