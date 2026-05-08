<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiyat_kazanc_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pe-ratio',
        HC_PLUGIN_URL . 'modules/fiyat-kazanc-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pe-ratio-css',
        HC_PLUGIN_URL . 'modules/fiyat-kazanc-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pe-ratio">
        <h3>Fiyat Kazanç Oranı (F/K) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pe-price">Hisse Fiyatı (TL)</label>
            <input type="number" id="hc-pe-price" step="0.01" placeholder="Güncel Hisse Fiyatı">
        </div>

        <div class="hc-form-group">
            <label for="hc-pe-eps">Hisse Başına Kar (TL)</label>
            <input type="number" id="hc-pe-eps" step="0.01" placeholder="Yıllık EPS">
        </div>
        
        <button class="hc-btn" onclick="hcPEHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pe-ratio-result">
            <div class="hc-result-value" id="hc-pe-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Fiyat Kazanç Oranı (F/K)</p>
        </div>
    </div>
    <?php
}
