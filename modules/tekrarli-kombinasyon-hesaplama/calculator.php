<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekrarli_kombinasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-comb-rep',
        HC_PLUGIN_URL . 'modules/tekrarli-kombinasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-comb-rep-css',
        HC_PLUGIN_URL . 'modules/tekrarli-kombinasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-comb-rep">
        <h3>Tekrarlı Kombinasyon</h3>
        <div class="hc-form-group">
            <label for="hc-cr-n">Toplam Eleman Türü (n)</label>
            <input type="number" id="hc-cr-n" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-r">Seçilecek Adet (r)</label>
            <input type="number" id="hc-cr-r" value="3" min="1">
        </div>
        <button class="hc-btn" onclick="hcCombRepHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-comb-rep-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value" id="hc-res-cr-val">0</span>
            </div>
            <p class="hc-cr-note">Formül: C(n+r-1, r)</p>
        </div>
    </div>
    <?php
}
