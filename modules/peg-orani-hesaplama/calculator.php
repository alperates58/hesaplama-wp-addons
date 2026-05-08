<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_peg_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-peg',
        HC_PLUGIN_URL . 'modules/peg-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-peg-css',
        HC_PLUGIN_URL . 'modules/peg-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-peg">
        <h3>PEG Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pg-pe">Fiyat Kazanç Oranı (F/K)</label>
            <input type="number" id="hc-pg-pe" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-pg-growth">Beklenen Yıllık Kar Büyümesi (%)</label>
            <input type="number" id="hc-pg-growth" step="0.1" value="15">
        </div>
        
        <button class="hc-btn" onclick="hcPEGHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-peg-result">
            <div class="hc-result-value" id="hc-pg-res-val">
                -
            </div>
            <p id="hc-pg-interpretation" style="text-align:center; font-weight: bold; margin-top: 10px;"></p>
            <p style="text-align:center; font-size: 0.85em; color: #666; margin-top: 10px;">
                PEG < 1.0: Ucuz / İskontolu<br>
                PEG = 1.0: Dengeli / Adil Değer<br>
                PEG > 1.0: Pahalı / Primli
            </p>
        </div>
    </div>
    <?php
}
