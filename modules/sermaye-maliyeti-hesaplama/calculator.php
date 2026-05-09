<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sermaye_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cost-cap',
        HC_PLUGIN_URL . 'modules/sermaye-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cost-cap-css',
        HC_PLUGIN_URL . 'modules/sermaye-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cost-cap">
        <h3>Ağırlıklı Ortalama Sermaye Maliyeti (WACC)</h3>
        
        <div class="hc-form-group">
            <label>Özsermaye (Equity)</label>
            <input type="number" id="hc-cc-equity" placeholder="Özsermaye Tutarı">
            <input type="number" id="hc-cc-re" placeholder="Özsermaye Maliyeti (%)" value="40">
        </div>

        <div class="hc-form-group">
            <label>Borç (Debt)</label>
            <input type="number" id="hc-cc-debt" placeholder="Toplam Borç Tutarı">
            <input type="number" id="hc-cc-rd" placeholder="Borçlanma Faizi (%)" value="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-cc-tax">Vergi Oranı (%)</label>
            <input type="number" id="hc-cc-tax" value="25">
        </div>
        
        <button class="hc-btn" onclick="hcCostCapHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cost-cap-result">
            <div class="hc-result-value" id="hc-cc-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Ağırlıklı Ortalama Sermaye Maliyeti (WACC)</p>
        </div>
    </div>
    <?php
}
