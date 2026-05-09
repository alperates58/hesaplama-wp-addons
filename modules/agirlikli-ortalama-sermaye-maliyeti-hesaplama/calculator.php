<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlikli_ortalama_sermaye_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wacc',
        HC_PLUGIN_URL . 'modules/agirlikli-ortalama-sermaye-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wacc-css',
        HC_PLUGIN_URL . 'modules/agirlikli-ortalama-sermaye-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wacc">
        <h3>Ağırlıklı Ortalama Sermaye Maliyeti (WACC)</h3>
        
        <div class="hc-form-group">
            <label for="hc-wacc-equity">Özsermaye Piyasa Değeri (TL)</label>
            <input type="number" id="hc-wacc-equity" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-wacc-re">Özsermaye Maliyeti (%)</label>
            <input type="number" id="hc-wacc-re" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wacc-debt">Toplam Borç (TL)</label>
            <input type="number" id="hc-wacc-debt" placeholder="Yıllık Faizli Borçlar">
        </div>

        <div class="hc-form-group">
            <label for="hc-wacc-rd">Borçlanma Maliyeti (Faiz) (%)</label>
            <input type="number" id="hc-wacc-rd" value="50" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wacc-tax">Kurumlar Vergisi Oranı (%)</label>
            <input type="number" id="hc-wacc-tax" value="25">
        </div>
        
        <button class="hc-btn" onclick="hcWACCHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-wacc-result">
            <div class="hc-result-value" id="hc-wacc-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Ağırlıklı Ortalama Sermaye Maliyeti (WACC)</p>
        </div>
    </div>
    <?php
}
