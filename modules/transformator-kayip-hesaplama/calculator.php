<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transformator_kayip_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-transformer-loss',
        HC_PLUGIN_URL . 'modules/transformator-kayip-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-transformer-loss-css',
        HC_PLUGIN_URL . 'modules/transformator-kayip-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transformer-loss">
        <h3>Trafo Kayıp Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-tl-iron">Demir Kayıpları (Pi) [Watt]</label>
            <input type="number" id="hc-tl-iron" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-tl-copper">Tam Yükte Bakır Kayıpları (Pcu) [Watt]</label>
            <input type="number" id="hc-tl-copper" value="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-tl-load">Yük Oranı (k) [%]</label>
            <input type="number" id="hc-tl-load" value="100" max="100">
        </div>
        <button class="hc-btn" onclick="hcTransformerLossHesapla()">Kaybı Hesapla</button>
        <div class="hc-result" id="hc-transformer-loss-result">
            <div class="hc-result-item">
                <span>Toplam Kayıp:</span>
                <span class="hc-result-value" id="hc-res-tl-val">0 W</span>
            </div>
            <p class="hc-tl-note">P_toplam = Pi + (k² * Pcu)</p>
        </div>
    </div>
    <?php
}
