<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-scoop-js',
        HC_PLUGIN_URL . 'modules/kahve-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coffee-scoop-css',
        HC_PLUGIN_URL . 'modules/kahve-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-scoop">
        <h3>Kahve Ölçüsü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cs-grams">Gereken Kahve Miktarı (Gram)</label>
            <input type="number" id="hc-cs-grams" placeholder="g" value="20">
        </div>

        <button class="hc-btn" onclick="hcKahveOlcusuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-coffee-scoop-result">
            <div class="hc-result-item">
                <span>Standart Ölçü Kaşığı:</span>
                <strong id="hc-cs-res-scoop">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yemek Kaşığı:</span>
                <strong id="hc-cs-res-tbsp">-</strong>
            </div>
            <div class="hc-result-note">Not: 1 standart kahve ölçü kaşığı (scoop) yaklaşık 10g kahve alır.</div>
        </div>
    </div>
    <?php
}
