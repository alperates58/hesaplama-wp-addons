<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_numarasi_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-numarasi-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ev-numarasi-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-numarasi-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ev-numarasi-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-house-numerology">
        <h3>Ev Numarası Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hn-number">Ev/Daire Numarası:</label>
            <input type="text" id="hc-hn-number" class="hc-input" placeholder="Örn: 15 veya 24A">
        </div>
        <button class="hc-btn" onclick="hcHouseNumerologyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ev-numarasi-numerolojisi-hesaplama-result">
            <div class="hc-result-label">Evinizin Numerolojik Sayısı:</div>
            <div class="hc-result-value" id="hc-res-hn-val">-</div>
            <div id="hc-res-hn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
