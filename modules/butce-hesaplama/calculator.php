<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_butce_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-budget',
        HC_PLUGIN_URL . 'modules/butce-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-budget-css',
        HC_PLUGIN_URL . 'modules/butce-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-budget">
        <h3>Aylık Bütçe Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Aylık Gelirler (TL)</label>
            <input type="number" id="hc-bu-salary" placeholder="Maaş / Ana Gelir">
            <input type="number" id="hc-bu-extra" placeholder="Ek Gelirler">
        </div>

        <div class="hc-form-group">
            <label>Aylık Giderler (TL)</label>
            <input type="number" id="hc-bu-rent" placeholder="Kira / Kredi">
            <input type="number" id="hc-bu-bills" placeholder="Faturalar (Elek, Su, İnternet)">
            <input type="number" id="hc-bu-food" placeholder="Mutfak / Market">
            <input type="number" id="hc-bu-transport" placeholder="Ulaşım / Yakıt">
            <input type="number" id="hc-bu-other" placeholder="Diğer Giderler">
        </div>
        
        <button class="hc-btn" onclick="hcButceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-budget-result">
            <div class="hc-result-item">
                <span>Toplam Gelir:</span>
                <strong id="hc-bu-res-income">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Gider:</span>
                <strong id="hc-bu-res-expense">-</strong>
            </div>
            <div class="hc-result-value" id="hc-bu-res-balance">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Kalan Aylık Tasarruf / Bakiye</p>
        </div>
    </div>
    <?php
}
