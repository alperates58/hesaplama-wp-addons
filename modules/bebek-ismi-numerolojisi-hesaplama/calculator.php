<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_ismi_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-ismi-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/bebek-ismi-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-ismi-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bebek-ismi-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baby-numerology">
        <h3>Bebek İsmi Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bin-name">Bebek İsmi (Düşünülen):</label>
            <input type="text" id="hc-bin-name" class="hc-input" placeholder="Örn: Arda">
        </div>
        <button class="hc-btn" onclick="hcBabyNumerologyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bebek-ismi-numerolojisi-hesaplama-result">
            <div class="hc-result-label">İsmin Numerolojik Sayısı:</div>
            <div class="hc-result-value" id="hc-res-bin-val">-</div>
            <div id="hc-res-bin-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
