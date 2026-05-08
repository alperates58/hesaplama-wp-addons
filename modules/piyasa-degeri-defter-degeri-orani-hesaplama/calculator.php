<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piyasa_degeri_defter_degeri_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pb-ratio',
        HC_PLUGIN_URL . 'modules/piyasa-degeri-defter-degeri-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pb-ratio-css',
        HC_PLUGIN_URL . 'modules/piyasa-degeri-defter-degeri-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pb-ratio">
        <h3>Piyasa Değeri / Defter Değeri (PD/DD) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pb-mcap">Piyasa Değeri (TL)</label>
            <input type="number" id="hc-pb-mcap" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-pb-equity">Toplam Özsermaye (Defter Değeri) (TL)</label>
            <input type="number" id="hc-pb-equity" placeholder="Bilanço Özkaynaklar">
        </div>
        
        <button class="hc-btn" onclick="hcPBHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pb-ratio-result">
            <div class="hc-result-value" id="hc-pb-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">PD/DD Oranı</p>
        </div>
    </div>
    <?php
}
