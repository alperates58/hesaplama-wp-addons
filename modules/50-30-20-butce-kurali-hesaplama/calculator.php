<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_50_30_20_butce_kurali_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-503020',
        HC_PLUGIN_URL . 'modules/50-30-20-butce-kurali-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-503020-css',
        HC_PLUGIN_URL . 'modules/50-30-20-butce-kurali-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-503020">
        <h3>50/30/20 Bütçe Planlama</h3>
        
        <div class="hc-form-group">
            <label for="hc-50-income">Aylık Net Gelir (TL)</label>
            <input type="number" id="hc-50-income" placeholder="Ele geçen toplam maaş">
        </div>
        
        <button class="hc-btn" onclick="hc503020Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-503020-result">
            <div class="hc-result-item">
                <span class="label-needs">İhtiyaçlar (%50):</span>
                <strong id="hc-50-res-needs">-</strong>
            </div>
            <div class="hc-result-item">
                <span class="label-wants">İstekler (%30):</span>
                <strong id="hc-50-res-wants">-</strong>
            </div>
            <div class="hc-result-item">
                <span class="label-savings">Birikim & Borç (%20):</span>
                <strong id="hc-50-res-savings">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666; margin-top: 15px;">
                İhtiyaçlar: Kira, faturalar, mutfak, ulaşım.<br>
                İstekler: Hobiler, dışarıda yemek, abonelikler.<br>
                Birikim: Borç ödeme, yatırım, acil durum fonu.
            </p>
        </div>
    </div>
    <?php
}
