<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gubre_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gubre-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/gubre-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gubre-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gubre-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gubre-miktari-hesaplama">
        <h3>Gübre Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fert-area">Uygulama Alanı (da - dekar)</label>
            <input type="number" id="hc-fert-area" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-fert-need">Saf Madde İhtiyacı (kg/da)</label>
            <input type="number" id="hc-fert-need" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-fert-percent">Gübre Besin İçeriği (%)</label>
            <input type="number" id="hc-fert-percent" placeholder="Örn: 26 (CAN), 46 (Üre)" step="any">
        </div>
        <button class="hc-btn" onclick="hcGubreMiktariHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fert-result">
            <div class="hc-result-label">Toplam Gübre Miktarı:</div>
            <div class="hc-result-value" id="hc-fert-val">-</div>
            <div class="hc-result-note" id="hc-fert-note"></div>
        </div>
    </div>
    <?php
}
