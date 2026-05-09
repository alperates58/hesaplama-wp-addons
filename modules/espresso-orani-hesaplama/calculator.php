<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_espresso_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-espresso-ratio',
        HC_PLUGIN_URL . 'modules/espresso-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-espresso-ratio-css',
        HC_PLUGIN_URL . 'modules/espresso-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-espresso-ratio">
        <h3>Espresso Oranı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-er-type">İçecek Türü</label>
            <select id="hc-er-type">
                <option value="ristretto">Ristretto (1:1.5)</option>
                <option value="espresso" selected>Espresso (1:2)</option>
                <option value="lungo">Lungo (1:3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-er-coffee">Kahve (gr)</label>
            <input type="number" id="hc-er-coffee" value="18" min="7" max="25">
        </div>
        <button class="hc-btn" onclick="hcEspressoRatioHesapla()">Çıkış Miktarını Gör</button>
        <div class="hc-result" id="hc-espresso-ratio-result">
            <div class="hc-result-item">
                <span>Hedef Çıkış (Yield):</span>
                <span class="hc-result-value" id="hc-res-er-yield">0 gr</span>
            </div>
            <p class="hc-er-note">Not: İdeal demleme süresi genellikle 25-30 saniye arasındadır.</p>
        </div>
    </div>
    <?php
}
