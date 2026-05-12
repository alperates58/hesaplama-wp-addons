<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-water-js',
        HC_PLUGIN_URL . 'modules/kahve-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coffee-water-css',
        HC_PLUGIN_URL . 'modules/kahve-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-water">
        <h3>Kahve Su Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-csw-coffee">Kahve Miktarı (Gram)</label>
            <input type="number" id="hc-csw-coffee" placeholder="g" value="15">
        </div>

        <div class="hc-form-group">
            <label for="hc-csw-ratio">Oran (1:X)</label>
            <input type="number" id="hc-csw-ratio" placeholder="Örn: 16" value="16" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcKahveSuOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-coffee-water-result">
            <div class="hc-result-item">
                <span>Gereken Su Miktarı:</span>
                <strong class="hc-result-value" id="hc-csw-res-val">-</strong>
            </div>
            <div class="hc-result-note">İpucu: 1:16 oranı çoğu demleme yöntemi için dengeli bir başlangıç noktasıdır.</div>
        </div>
    </div>
    <?php
}
