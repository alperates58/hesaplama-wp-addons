<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_masa_ortusu_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tablecloth-size',
        HC_PLUGIN_URL . 'modules/masa-ortusu-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tablecloth-size-css',
        HC_PLUGIN_URL . 'modules/masa-ortusu-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tablecloth-size">
        <h3>Masa Örtüsü Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-table-w">Masa Genişliği (cm)</label>
            <input type="number" id="hc-table-w" placeholder="Örn: 90">
        </div>
        <div class="hc-form-group">
            <label for="hc-table-l">Masa Uzunluğu (cm)</label>
            <input type="number" id="hc-table-l" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-table-drop">Sarkma Payı (cm)</label>
            <input type="number" id="hc-table-drop" value="25">
        </div>
        <button class="hc-btn" onclick="hcTableclothSizeHesapla()">Ölçüyü Hesapla</button>
        <div class="hc-result" id="hc-tablecloth-size-result">
            <div class="hc-result-item">
                <span>Gereken Örtü:</span>
                <span class="hc-result-value" id="hc-res-tc-size">0 x 0 cm</span>
            </div>
        </div>
    </div>
    <?php
}
