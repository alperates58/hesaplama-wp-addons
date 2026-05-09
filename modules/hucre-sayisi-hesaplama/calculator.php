<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hucre_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hucre-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/hucre-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hucre-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hucre-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hucre-sayisi-hesaplama">
        <h3>Toplam Hücre Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cell-conc">Konsantrasyon (hücre/mL)</label>
            <input type="number" id="hc-cell-conc" placeholder="Örn: 1000000 (10^6)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cell-vol">Toplam Hacim (mL)</label>
            <input type="number" id="hc-cell-vol" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcHucreSayisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cell-count-result">
            <div class="hc-result-label">Toplam Hücre Sayısı:</div>
            <div class="hc-result-value" id="hc-cell-count-val">-</div>
            <div class="hc-result-note">Toplam = Konsantrasyon * Hacim</div>
        </div>
    </div>
    <?php
}
