<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_antibiyotik_stok_cozeltisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-antibiyotik-stok-cozeltisi-hesaplama',
        HC_PLUGIN_URL . 'modules/antibiyotik-stok-cozeltisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-antibiyotik-stok-cozeltisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/antibiyotik-stok-cozeltisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-antibiyotik-stok-cozeltisi-hesaplama">
        <h3>Antibiyotik Stok Çözeltisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-anti-stock-conc">Stok Konsantrasyonu (mg/mL)</label>
            <input type="number" id="hc-anti-stock-conc" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-anti-target-conc">Hedef Konsantrasyon (µg/mL)</label>
            <input type="number" id="hc-anti-target-conc" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-anti-target-vol">Hedef Hacim (mL)</label>
            <input type="number" id="hc-anti-target-vol" placeholder="Örn: 1000" step="any">
        </div>
        <button class="hc-btn" onclick="hcAntibiyotikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-anti-result">
            <div class="hc-result-label">Gereken Stok Hacmi:</div>
            <div class="hc-result-value" id="hc-anti-value">-</div>
            <div class="hc-result-note" id="hc-anti-note"></div>
        </div>
    </div>
    <?php
}
