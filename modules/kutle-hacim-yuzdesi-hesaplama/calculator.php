<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutle_hacim_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutle-hacim-yuzdesi-hesaplama',
        HC_PLUGIN_URL . 'modules/kutle-hacim-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutle-hacim-yuzdesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutle-hacim-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mass-vol">
        <h3>Kütle / Hacim Yüzdesi (% w/v)</h3>
        <div class="hc-form-group">
            <label for="hc-mv-mass">Çözünen Kütlesi (g)</label>
            <input type="number" id="hc-mv-mass" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-mv-vol">Çözelti Hacmi (mL)</label>
            <input type="number" id="hc-mv-vol" placeholder="Örn: 200">
        </div>
        <button class="hc-btn" onclick="hcKütleHacimYüzdesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mv-result">
            <div class="hc-result-label">Kütle / Hacim Yüzdesi:</div>
            <div class="hc-result-value" id="hc-mv-val">-</div>
        </div>
    </div>
    <?php
}
