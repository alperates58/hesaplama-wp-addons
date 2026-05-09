<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bakteri_buyumesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bakteri-buyumesi-hesaplama',
        HC_PLUGIN_URL . 'modules/bakteri-buyumesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bakteri-buyumesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bakteri-buyumesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bakteri-buyumesi-hesaplama">
        <h3>Bakteri Büyümesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bac-n0">Başlangıç Bakteri Sayısı (N₀)</label>
            <input type="number" id="hc-bac-n0" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bac-time">Toplam Süre (dakika)</label>
            <input type="number" id="hc-bac-time" placeholder="Örn: 120" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bac-gen">Nesil Süresi (dakika/nesil)</label>
            <input type="number" id="hc-bac-gen" placeholder="Örn: 20 (E. coli için)" step="any">
        </div>
        <button class="hc-btn" onclick="hcBakteriBuyumesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bac-result">
            <div class="hc-result-label">Son Bakteri Sayısı (N):</div>
            <div class="hc-result-value" id="hc-bac-val">-</div>
            <div class="hc-result-note" id="hc-bac-note"></div>
        </div>
    </div>
    <?php
}
