<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_binom_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-binom-katsayisi-hesaplama', HC_PLUGIN_URL . 'modules/binom-katsayisi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-binom-katsayisi-hesaplama-css', HC_PLUGIN_URL . 'modules/binom-katsayisi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-binom-katsayisi-hesaplama">
        <h3>Binom Katsayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bkh-n">Toplam Eleman Sayısı (n)</label>
            <input type="number" id="hc-bkh-n" placeholder="örn. 10" min="0" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bkh-k">Seçilecek Eleman Sayısı (k)</label>
            <input type="number" id="hc-bkh-k" placeholder="örn. 3" min="0" step="1" />
        </div>
        <button class="hc-btn" onclick="hcBinomKatsayisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-binom-katsayisi-hesaplama-result"></div>
    </div>
    <?php
}
