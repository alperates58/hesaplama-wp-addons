<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kar_payi_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kar-payi-vergi',
        HC_PLUGIN_URL . 'modules/kar-payi-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kar-payi-vergi-css',
        HC_PLUGIN_URL . 'modules/kar-payi-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kar-payi-vergisi-hesaplama">
        <h3>Kar Payı Vergisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kp-gross">Brüt Kar Payı Tutarı (TL)</label>
            <input type="number" id="hc-kp-gross" placeholder="Dağıtılmasına karar verilen tutar">
        </div>
        
        <button class="hc-btn" onclick="hcKarPayiVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kar-payi-result">
            <div class="hc-result-item">
                <span>Stopaj Kesintisi (%10):</span>
                <strong id="hc-kp-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Elde Edilen Net Kar Payı:</span>
                <strong id="hc-kp-res-net">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kp-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Ödenecek Temettü</p>
        </div>
    </div>
    <?php
}
