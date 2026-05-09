<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birikim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-savings',
        HC_PLUGIN_URL . 'modules/birikim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-savings-css',
        HC_PLUGIN_URL . 'modules/birikim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-savings">
        <h3>Birikim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-s-initial">Başlangıç Tutarı (TL)</label>
            <input type="number" id="hc-s-initial" value="10000">
        </div>

        <div class="hc-form-group">
            <label for="hc-s-monthly">Aylık Tasarruf Tutarı (TL)</label>
            <input type="number" id="hc-s-monthly" value="2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-s-rate">Yıllık Beklenen Getiri (%)</label>
            <input type="number" id="hc-s-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-s-years">Süre (Yıl)</label>
            <input type="number" id="hc-s-years" value="5">
        </div>
        
        <button class="hc-btn" onclick="hcSavingsHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-savings-result">
            <div class="hc-result-item">
                <span>Yatırılan Toplam Anapara:</span>
                <strong id="hc-s-res-principal">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Faiz Getirisi:</span>
                <strong id="hc-s-res-interest">-</strong>
            </div>
            <div class="hc-result-value" id="hc-s-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Dönem Sonu Toplam Birikim</p>
        </div>
    </div>
    <?php
}
