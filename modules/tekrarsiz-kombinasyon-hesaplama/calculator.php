<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekrarsiz_kombinasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-comb-no-rep',
        HC_PLUGIN_URL . 'modules/tekrarsiz-kombinasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-comb-no-rep-css',
        HC_PLUGIN_URL . 'modules/tekrarsiz-kombinasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-comb-no-rep">
        <h3>Kombinasyon C(n, r)</h3>
        <div class="hc-form-group">
            <label for="hc-cnr-n">Toplam Eleman Sayısı (n)</label>
            <input type="number" id="hc-cnr-n" value="10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cnr-r">Seçilecek Eleman Sayısı (r)</label>
            <input type="number" id="hc-cnr-r" value="3" min="0">
        </div>
        <button class="hc-btn" onclick="hcCombNoRepHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-comb-no-rep-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value" id="hc-res-cnr-val">0</span>
            </div>
            <p class="hc-cnr-note">Formül: n! / (r! * (n-r)!) (Sıralama önemli değildir)</p>
        </div>
    </div>
    <?php
}
