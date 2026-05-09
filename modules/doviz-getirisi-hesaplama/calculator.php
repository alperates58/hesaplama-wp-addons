<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doviz_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-curr-yield',
        HC_PLUGIN_URL . 'modules/doviz-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-curr-yield-css',
        HC_PLUGIN_URL . 'modules/doviz-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-curr-yield">
        <h3>Döviz Yatırım Getirisi</h3>
        
        <div class="hc-form-group">
            <label for="hc-cy-amount">Yatırılan Tutar (Döviz)</label>
            <input type="number" id="hc-cy-amount" value="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-cy-start">Alış Kuru (TL)</label>
            <input type="number" id="hc-cy-start" step="0.0001" value="30.00">
        </div>

        <div class="hc-form-group">
            <label for="hc-cy-end">Güncel/Satış Kuru (TL)</label>
            <input type="number" id="hc-cy-end" step="0.0001" value="35.50">
        </div>
        
        <button class="hc-btn" onclick="hcDovizGetiriHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-curr-yield-result">
            <div class="hc-result-item">
                <span>Kar/Zarar (TL):</span>
                <strong id="hc-cy-res-profit">-</strong>
            </div>
            <div class="hc-result-value" id="hc-cy-res-perc">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Getiri Oranı</p>
        </div>
    </div>
    <?php
}
