<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilesik_kesirden_tam_sayili_kesre_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mixed-frac',
        HC_PLUGIN_URL . 'modules/bilesik-kesirden-tam-sayili-kesre-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mixed-frac-css',
        HC_PLUGIN_URL . 'modules/bilesik-kesirden-tam-sayili-kesre-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mixed">
        <h3>Bileşik Kesri Tam Sayılıya Çevir</h3>
        
        <div class="hc-fraction-input">
            <div class="hc-frac-parts">
                <input type="number" id="hc-mf-num" placeholder="Pay" step="1">
                <hr>
                <input type="number" id="hc-mf-den" placeholder="Payda" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcTamSayiliKesirHesapla()">Dönüştür</button>

        <div class="hc-result" id="hc-mf-result">
            <div class="hc-result-item">
                <span>Tam Sayılı Kesir:</span>
                <span class="hc-result-value highlight" id="hc-res-mf-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
