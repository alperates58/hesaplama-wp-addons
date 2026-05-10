<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_hava_yolu_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-map-calc',
        HC_PLUGIN_URL . 'modules/ortalama-hava-yolu-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-map-calc-css',
        HC_PLUGIN_URL . 'modules/ortalama-hava-yolu-basinci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-map-calc">
        <h3>Ortalama Hava Yolu Basıncı (MAP) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-map-pip">Tepe İnspiratuar Basınç (PIP - cmH2O):</label>
            <input type="number" id="hc-map-pip" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label for="hc-map-peep">PEEP (cmH2O):</label>
            <input type="number" id="hc-map-peep" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-map-ti">İnspirasyon Süresi (Ti - sn):</label>
            <input type="number" id="hc-map-ti" placeholder="Örn: 1.0" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-map-te">Ekspirasyon Süresi (Te - sn):</label>
            <input type="number" id="hc-map-te" placeholder="Örn: 2.0" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcMapHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-map-calc-result">
            <strong>Ortalama Hava Yolu Basıncı (MAP):</strong>
            <div id="hc-map-res-val" class="hc-result-value">-</div>
            <span>cmH2O</span>
        </div>
    </div>
    <?php
}
