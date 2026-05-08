<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_milyoner_olma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-millionaire',
        HC_PLUGIN_URL . 'modules/milyoner-olma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-millionaire-css',
        HC_PLUGIN_URL . 'modules/milyoner-olma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-millionaire">
        <h3>Milyoner Olma Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ms-target">Hedef Tutar (TL)</label>
            <input type="number" id="hc-ms-target" value="1000000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ms-initial">Mevcut Birikim (TL)</label>
            <input type="number" id="hc-ms-initial" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-ms-monthly">Aylık Ek Birikim (TL)</label>
            <input type="number" id="hc-ms-monthly" placeholder="Kenara ayırdığınız tutar">
        </div>

        <div class="hc-form-group">
            <label for="hc-ms-rate">Beklenen Yıllık Getiri (%)</label>
            <input type="number" id="hc-ms-rate" value="45" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcMilyonerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-millionaire-result">
            <div class="hc-result-value" id="hc-ms-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hedefe Ulaşmak İçin Gereken Süre (Ay)</p>
        </div>
    </div>
    <?php
}
