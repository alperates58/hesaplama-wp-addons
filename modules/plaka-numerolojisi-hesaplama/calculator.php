<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_plaka_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plaka-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/plaka-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plaka-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/plaka-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plate-numerology">
        <h3>Plaka Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pn-plate">Araç Plakası:</label>
            <input type="text" id="hc-pn-plate" class="hc-input" placeholder="Örn: 34ABC123">
        </div>
        <button class="hc-btn" onclick="hcPlateNumerologyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-plaka-numerolojisi-hesaplama-result">
            <div class="hc-result-label">Plakanızın Numerolojik Sayısı:</div>
            <div class="hc-result-value" id="hc-res-pn-plate-val">-</div>
            <div id="hc-res-pn-plate-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
