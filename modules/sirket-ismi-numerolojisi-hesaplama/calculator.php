<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sirket_ismi_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sirket-ismi-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/sirket-ismi-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sirket-ismi-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sirket-ismi-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-company-numerology">
        <h3>Şirket İsmi Numerolojisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cn-name">Şirket/Marka İsmi:</label>
            <input type="text" id="hc-cn-name" class="hc-input" placeholder="Örn: Teknoloji A.Ş.">
        </div>
        <button class="hc-btn" onclick="hcCompanyNumerologyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sirket-ismi-numerolojisi-hesaplama-result">
            <div class="hc-result-label">Şirketin Numerolojik Sayısı:</div>
            <div class="hc-result-value" id="hc-res-cn-val">-</div>
            <div id="hc-res-cn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
