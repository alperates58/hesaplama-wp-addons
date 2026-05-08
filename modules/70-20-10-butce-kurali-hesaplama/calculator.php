<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_70_20_10_butce_kurali_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-702010',
        HC_PLUGIN_URL . 'modules/70-20-10-butce-kurali-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-702010-css',
        HC_PLUGIN_URL . 'modules/70-20-10-butce-kurali-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-702010">
        <h3>70/20/10 Bütçe Planlama</h3>
        
        <div class="hc-form-group">
            <label for="hc-70-income">Aylık Net Gelir (TL)</label>
            <input type="number" id="hc-70-income" placeholder="Aylık toplam gelir">
        </div>
        
        <button class="hc-btn" onclick="hc702010Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-702010-result">
            <div class="hc-result-item">
                <span class="label-life">Yaşam Giderleri (%70):</span>
                <strong id="hc-70-res-life">-</strong>
            </div>
            <div class="hc-result-item">
                <span class="label-savings">Birikim & Borç (%20):</span>
                <strong id="hc-70-res-savings">-</strong>
            </div>
            <div class="hc-result-item">
                <span class="label-extra">Yatırım/Bağış (%10):</span>
                <strong id="hc-70-res-extra">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666; margin-top: 15px;">
                Yaşam Giderleri: Kira, mutfak, faturalar, giyim.<br>
                Birikim: Acil durum fonu, emeklilik birikimi.<br>
                Yatırım/Bağış: Hisse senedi, eğitim veya sosyal sorumluluk.
            </p>
        </div>
    </div>
    <?php
}
