<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pizza_hamuru_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-hydro-js',
        HC_PLUGIN_URL . 'modules/pizza-hamuru-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-hydro-css',
        HC_PLUGIN_URL . 'modules/pizza-hamuru-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-hydro">
        <h3>Pizza Hamuru Hidrasyonu</h3>
        
        <div class="hc-form-group">
            <label for="hc-ph-flour">Un Miktarı (Gram)</label>
            <input type="number" id="hc-ph-flour" value="1000" step="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-ph-ratio">Su Oranı (Hidrasyon %)</label>
            <input type="number" id="hc-ph-ratio" value="65" min="50" max="90">
        </div>

        <button class="hc-btn" onclick="hcPizzaHidrasyonHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pizza-hydro-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <strong id="hc-ph-res-water">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gereken Tuz (%3):</span>
                <strong id="hc-ph-res-salt">-</strong>
            </div>
            <div class="hc-result-note">Hidrasyon, un ağırlığının yüzdesi olarak hesaplanan su miktarıdır.</div>
        </div>
    </div>
    <?php
}
