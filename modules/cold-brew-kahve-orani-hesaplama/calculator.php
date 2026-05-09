<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cold_brew_kahve_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cold-brew',
        HC_PLUGIN_URL . 'modules/cold-brew-kahve-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cold-brew-css',
        HC_PLUGIN_URL . 'modules/cold-brew-kahve-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cold-brew">
        <h3>Cold Brew Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-cb-type">Demleme Türü</label>
            <select id="hc-cb-type">
                <option value="concentrate">Konsantre (1:4)</option>
                <option value="standard" selected>İçime Hazır (1:8)</option>
                <option value="light">Hafif (1:12)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cb-coffee">Kahve Miktarı (gr)</label>
            <input type="number" id="hc-cb-coffee" value="100" min="1">
        </div>
        <button class="hc-btn" onclick="hcColdBrewHesapla()">Su Miktarını Gör</button>
        <div class="hc-result" id="hc-cold-brew-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <span class="hc-result-value" id="hc-res-cb-water">0 ml</span>
            </div>
            <p class="hc-cb-note">İdeal demleme süresi: Oda sıcaklığında 12-16 saat, buzdolabında 18-24 saattir.</p>
        </div>
    </div>
    <?php
}
