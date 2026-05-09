<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_besiyeri_hazirlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-besiyeri-hazirlama-hesaplama',
        HC_PLUGIN_URL . 'modules/besiyeri-hazirlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-besiyeri-hazirlama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/besiyeri-hazirlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-besiyeri-hazirlama-hesaplama">
        <h3>Besiyeri Hazırlama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-by-vol">Hedef Hacim (mL)</label>
            <input type="number" id="hc-by-vol" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-by-conc">Konsantrasyon (g/L)</label>
            <input type="number" id="hc-by-conc" placeholder="Örn: 25 (LB Broth için)" step="any">
        </div>
        <button class="hc-btn" onclick="hcBesiyeriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-by-result">
            <div class="hc-result-label">Tartılması Gereken Miktar:</div>
            <div class="hc-result-value" id="hc-by-val">-</div>
            <div class="hc-result-note" id="hc-by-note"></div>
        </div>
    </div>
    <?php
}
