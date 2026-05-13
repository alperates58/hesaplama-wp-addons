<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_memnuniyet_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-memnuniyet-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/memnuniyet-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-memnuniyet-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/memnuniyet-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-memnuniyet-orani-hesaplama">
        <h3>Müşteri Memnuniyet Oranı (CSAT)</h3>
        <div class="hc-form-group">
            <label for="hc-csat-satisfied">Memnun Müşteri Sayısı</label>
            <input type="number" id="hc-csat-satisfied" min="0" placeholder="Örn: 85">
        </div>
        <div class="hc-form-group">
            <label for="hc-csat-total">Toplam Cevap Sayısı</label>
            <input type="number" id="hc-csat-total" min="1" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcCsatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-memnuniyet-orani-hesaplama-result">
            <span class="hc-label">Memnuniyet Oranı:</span>
            <div class="hc-result-value" id="hc-csat-res-val">%0</div>
            <div class="hc-csat-progress">
                <div id="hc-csat-bar" class="hc-csat-bar"></div>
            </div>
        </div>
    </div>
    <?php
}
