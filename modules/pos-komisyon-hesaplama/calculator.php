<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pos_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pos-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/pos-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pos-komisyon-css',
        HC_PLUGIN_URL . 'modules/pos-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pos-komisyon-hesaplama">
        <h3>POS Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pos-price">İşlem Tutarı (TL)</label>
            <input type="number" id="hc-pos-price" placeholder="Örn: 1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-pos-rate">POS Komisyon Oranı (%)</label>
            <input type="number" id="hc-pos-rate" step="0.01" value="2.50">
        </div>

        <div class="hc-form-group">
            <label for="hc-pos-val">Valör Süresi (Gün)</label>
            <select id="hc-pos-val">
                <option value="0">Ertesi Gün (Hemen Ödeme)</option>
                <option value="30">30 Gün</option>
                <option value="45">45 Gün</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcPOSHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pos-result">
            <div class="hc-result-item">
                <span>Banka Kesintisi:</span>
                <strong id="hc-pos-res-kom">-</strong>
            </div>
            <div class="hc-result-value" id="hc-pos-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Hakediş (TL)</p>
        </div>
    </div>
    <?php
}
