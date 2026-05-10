<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bel_boy_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wthr',
        HC_PLUGIN_URL . 'modules/bel-boy-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wthr-css',
        HC_PLUGIN_URL . 'modules/bel-boy-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wthr">
        <h3>Bel Boy Oranı (WHtR)</h3>
        <div class="hc-form-group">
            <label for="hc-wthr-waist">Bel Çevresi (cm):</label>
            <input type="number" id="hc-wthr-waist" placeholder="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-wthr-height">Boy (cm):</label>
            <input type="number" id="hc-wthr-height" placeholder="175">
        </div>
        <button class="hc-btn" onclick="hcWthrHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-wthr-result">
            <strong>Bel-Boy Oranı: <span id="hc-wthr-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-wthr-res-desc" style="margin-top:10px; font-weight:bold;"></div>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">İdeal oran 0.50 ve altıdır. Bel çevreniz boyunuzun yarısından az olmalıdır.</p>
        </div>
    </div>
    <?php
}
