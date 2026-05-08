<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekonomik_katma_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eva',
        HC_PLUGIN_URL . 'modules/ekonomik-katma-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eva-css',
        HC_PLUGIN_URL . 'modules/ekonomik-katma-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eva">
        <h3>Ekonomik Katma Değer (EVA) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eva-ebit">Faiz ve Vergi Öncesi Kar (EBIT) (TL)</label>
            <input type="number" id="hc-eva-ebit">
        </div>

        <div class="hc-form-group">
            <label for="hc-eva-tax">Vergi Oranı (%)</label>
            <input type="number" id="hc-eva-tax" value="25">
        </div>

        <div class="hc-form-group">
            <label for="hc-eva-capital">Yatırılmış Toplam Sermaye (TL)</label>
            <input type="number" id="hc-eva-capital" placeholder="Özsermaye + Borç">
        </div>

        <div class="hc-form-group">
            <label for="hc-eva-wacc">Sermaye Maliyeti (WACC) (%)</label>
            <input type="number" id="hc-eva-wacc" step="0.1" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcEVAHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-eva-result">
            <div class="hc-result-value" id="hc-eva-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Ekonomik Katma Değer (EVA)</p>
        </div>
    </div>
    <?php
}
