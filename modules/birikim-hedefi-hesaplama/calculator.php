<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birikim_hedefi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-savings-goal',
        HC_PLUGIN_URL . 'modules/birikim-hedefi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-savings-goal-css',
        HC_PLUGIN_URL . 'modules/birikim-hedefi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-savings-goal">
        <h3>Birikim Hedefi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sg-target">Hedeflenen Toplam Tutar (TL)</label>
            <input type="number" id="hc-sg-target" value="1000000">
        </div>

        <div class="hc-form-group">
            <label for="hc-sg-years">Ulaşılacak Süre (Yıl)</label>
            <input type="number" id="hc-sg-years" value="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-sg-rate">Beklenen Yıllık Getiri (%)</label>
            <input type="number" id="hc-sg-rate" value="45" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcSavingsGoalHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-savings-goal-result">
            <div class="hc-result-value" id="hc-sg-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Biriktirmeniz Gereken Tutar</p>
        </div>
    </div>
    <?php
}
