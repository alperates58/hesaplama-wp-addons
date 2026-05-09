<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekrarsiz_permutasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-perm-no-rep',
        HC_PLUGIN_URL . 'modules/tekrarsiz-permutasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-perm-no-rep-css',
        HC_PLUGIN_URL . 'modules/tekrarsiz-permutasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-perm-no-rep">
        <h3>Permütasyon P(n, r)</h3>
        <div class="hc-form-group">
            <label for="hc-pnr-n">Toplam Eleman Sayısı (n)</label>
            <input type="number" id="hc-pnr-n" value="10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pnr-r">Seçilecek Eleman Sayısı (r)</label>
            <input type="number" id="hc-pnr-r" value="3" min="0">
        </div>
        <button class="hc-btn" onclick="hcPermNoRepHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-perm-no-rep-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value" id="hc-res-pnr-val">0</span>
            </div>
            <p class="hc-pnr-note">Formül: n! / (n-r)! (Sıralama önemlidir)</p>
        </div>
    </div>
    <?php
}
