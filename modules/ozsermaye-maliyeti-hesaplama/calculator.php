<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ozsermaye_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coe',
        HC_PLUGIN_URL . 'modules/ozsermaye-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coe-css',
        HC_PLUGIN_URL . 'modules/ozsermaye-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coe">
        <h3>Özsermaye Maliyeti (CAPM) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-coe-rf">Riskiz Faiz Oranı (%)</label>
            <input type="number" id="hc-coe-rf" value="35" step="0.1">
            <small>Örn: Devlet Tahvili getirisi</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-coe-beta">Beta Katsayısı (β)</label>
            <input type="number" id="hc-coe-beta" value="1.0" step="0.01">
            <small>Şirketin pazar riski</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-coe-mrp">Pazar Risk Primi (%)</label>
            <input type="number" id="hc-coe-mrp" value="10" step="0.1">
            <small>Piyasa beklenen getirisi - Risksiz faiz</small>
        </div>
        
        <button class="hc-btn" onclick="hcCOEHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-coe-result">
            <div class="hc-result-value" id="hc-coe-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Beklenen Özsermaye Getirisi / Maliyeti</p>
        </div>
    </div>
    <?php
}
