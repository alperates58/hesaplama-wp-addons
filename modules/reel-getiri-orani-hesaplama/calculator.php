<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reel_getiri_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reel-getiri',
        HC_PLUGIN_URL . 'modules/reel-getiri-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reel-getiri-css',
        HC_PLUGIN_URL . 'modules/reel-getiri-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reel-g">
        <h3>Reel Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rg-nominal">Nominal Getiri Oranı (%)</label>
            <input type="number" id="hc-rg-nominal" placeholder="Örn: 60">
        </div>
        <div class="hc-form-group">
            <label for="hc-rg-inflation">Enflasyon Oranı (%)</label>
            <input type="number" id="hc-rg-inflation" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcReelGetiriHesapla()">Reel Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-rg-result">
            <div class="hc-result-item">
                <span>Reel Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-rg-res-total">-</strong>
            </div>
            <p class="hc-small-text">Reel getiri, paranın enflasyon karşısında değer kazanıp kazanmadığını gösteren gerçek orandır.</p>
        </div>
    </div>
    <?php
}
