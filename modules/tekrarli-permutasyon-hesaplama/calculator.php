<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekrarli_permutasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-perm-rep',
        HC_PLUGIN_URL . 'modules/tekrarli-permutasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-perm-rep-css',
        HC_PLUGIN_URL . 'modules/tekrarli-permutasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-perm-rep">
        <h3>Tekrarlı Permütasyon</h3>
        <div class="hc-form-group">
            <label for="hc-pr-n">Toplam Eleman Sayısı (n)</label>
            <input type="number" id="hc-pr-n" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pr-counts">Tekrar Sayıları (Virgül ile, örn: 2, 2)</label>
            <input type="text" id="hc-pr-counts" placeholder="Örn: 2, 3">
        </div>
        <button class="hc-btn" onclick="hcPermRepHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-perm-rep-result">
            <div class="hc-result-item">
                <span>Sonuç:</span>
                <span class="hc-result-value" id="hc-res-pr-val">0</span>
            </div>
            <p class="hc-pr-note">Formül: n! / (n1! * n2! * ...)</p>
        </div>
    </div>
    <?php
}
