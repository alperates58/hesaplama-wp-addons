<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiyat_artis_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-price-increase',
        HC_PLUGIN_URL . 'modules/fiyat-artis-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-price-increase-css',
        HC_PLUGIN_URL . 'modules/fiyat-artis-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-price-inc">
        <h3>Fiyat Artış Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-pi-old">Eski Fiyat (TL):</label>
            <input type="number" id="hc-pi-old" step="0.01" placeholder="100.00">
        </div>
        <div class="hc-form-group">
            <label for="hc-pi-new">Yeni Fiyat (TL):</label>
            <input type="number" id="hc-pi-new" step="0.01" placeholder="125.00">
        </div>
        <button class="hc-btn" onclick="hcPriceIncreaseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-price-inc-result">
            <strong>Artış Oranı:</strong>
            <div id="hc-pi-res-val" class="hc-result-value">-</div>
            <p id="hc-pi-res-diff" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
