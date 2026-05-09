<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agar_plak_hazirlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agar-plak-hazirlama-hesaplama',
        HC_PLUGIN_URL . 'modules/agar-plak-hazirlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agar-plak-hazirlama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/agar-plak-hazirlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-agar-plak-hazirlama-hesaplama">
        <h3>Agar Plak Hazırlama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-agar-vol">Hedef Hacim (mL)</label>
            <input type="number" id="hc-agar-vol" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-agar-conc">Konsantrasyon (g/L)</label>
            <input type="number" id="hc-agar-conc" placeholder="Örn: 28 (LB Agar için)" step="any">
        </div>
        <button class="hc-btn" onclick="hcAgarPlakHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-agar-result">
            <div class="hc-result-label">Gerekli Toz Miktarı:</div>
            <div class="hc-result-value" id="hc-agar-value">-</div>
            <div class="hc-result-note" id="hc-agar-note"></div>
        </div>
    </div>
    <?php
}
