<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kemer_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kemer-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/kemer-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kemer-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kemer-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-belt">
        <h3>Kemer Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-belt-waist">Bel Ölçüsü (cm)</label>
            <input type="number" id="hc-belt-waist" placeholder="Kemerin takılacağı yer">
        </div>
        <p style="text-align:center; font-weight:bold;">VEYA</p>
        <div class="hc-form-group">
            <label for="hc-belt-pants">Pantolon Bedeni (W - İnç)</label>
            <input type="number" id="hc-belt-pants" placeholder="Örn: 32">
        </div>
        <button class="hc-btn" onclick="hcKemerÖlçüsüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-belt-result">
            <div class="hc-result-label">Önerilen Kemer Boyu:</div>
            <div class="hc-result-value" id="hc-belt-val">-</div>
            <p style="font-size: 0.85em; margin-top: 10px; color: #666;">*Kemer boyu genellikle toka başından orta deliğe kadar olan mesafedir.</p>
        </div>
    </div>
    <?php
}
