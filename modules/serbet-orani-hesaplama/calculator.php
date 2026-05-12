<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbet_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-syrup-ratio-js',
        HC_PLUGIN_URL . 'modules/serbet-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-syrup-ratio-css',
        HC_PLUGIN_URL . 'modules/serbet-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-syrup-ratio">
        <h3>Tatlı Şerbeti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sr-type">Tatlı Türü</label>
            <select id="hc-sr-type">
                <option value="1">Standart (1:1 - Revani, Şekerpare)</option>
                <option value="1.25">Yoğun (1.25:1 - Baklava, Kadayıf)</option>
                <option value="0.75">Hafif (0.75:1 - Meyveli Tatlılar)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sr-water">Su Miktarı (Su Bardağı)</label>
            <input type="number" id="hc-sr-water" value="3" min="1" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcSerbetHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-syrup-ratio-result">
            <div class="hc-result-item">
                <span>Gereken Şeker:</span>
                <strong class="hc-result-value" id="hc-sr-res-val">-</strong>
            </div>
            <div class="hc-result-note">Limon suyu: Kaynamaya başladıktan sonra birkaç damla eklenmesi önerilir.</div>
        </div>
    </div>
    <?php
}
