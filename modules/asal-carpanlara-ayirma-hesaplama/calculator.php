<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asal_carpanlara_ayirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prime-factors',
        HC_PLUGIN_URL . 'modules/asal-carpanlara-ayirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-prime-factors-css',
        HC_PLUGIN_URL . 'modules/asal-carpanlara-ayirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-p-factors">
        <h3>Asal Çarpanlara Ayırma</h3>
        
        <div class="hc-form-group">
            <label for="hc-pf-val">Sayı</label>
            <input type="number" id="hc-pf-val" placeholder="Örn: 360" step="1">
        </div>

        <button class="hc-btn" onclick="hcAsalCarpanHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pf-result">
            <div class="hc-result-item">
                <span>Asal Çarpanlar:</span>
                <span class="hc-result-value highlight" id="hc-res-pf-list">-</span>
            </div>
            <div class="hc-result-item">
                <span>Üslü Gösterim:</span>
                <span class="hc-result-value" id="hc-res-pf-pow">-</span>
            </div>
        </div>
    </div>
    <?php
}
