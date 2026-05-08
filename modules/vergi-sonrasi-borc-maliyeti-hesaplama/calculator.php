<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vergi_sonrasi_borc_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aftertax-debt',
        HC_PLUGIN_URL . 'modules/vergi-sonrasi-borc-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aftertax-debt-css',
        HC_PLUGIN_URL . 'modules/vergi-sonrasi-borc-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aftertax-debt">
        <h3>Vergi Sonrası Borç Maliyeti</h3>
        
        <div class="hc-form-group">
            <label for="hc-atd-rate">Borçlanma Faiz Oranı (Yıllık %)</label>
            <input type="number" id="hc-atd-rate" value="50" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-atd-tax">Kurumlar Vergisi Oranı (%)</label>
            <input type="number" id="hc-atd-tax" value="25">
        </div>
        
        <button class="hc-btn" onclick="hcAfterTaxDebtHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-aftertax-debt-result">
            <div class="hc-result-value" id="hc-atd-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vergi Sonrası Efektif Borç Maliyeti</p>
        </div>
    </div>
    <?php
}
