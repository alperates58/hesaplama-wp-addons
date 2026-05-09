<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hammadde_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hammadde-miktar',
        HC_PLUGIN_URL . 'modules/hammadde-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hammadde-miktar-css',
        HC_PLUGIN_URL . 'modules/hammadde-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hammadde-miktar">
        <h3>Hammadde İhtiyaç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hm-target">Gereken Net Madde Miktarı (kg/g)</label>
            <input type="number" id="hc-hm-target" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hm-purity">Ticari Hammadde Saflığı (%)</label>
            <input type="number" id="hc-hm-purity" placeholder="Örn: 98" step="any">
        </div>
        <button class="hc-btn" onclick="hcHMHesapla()">Hammadde Miktarını Hesapla</button>
        <div class="hc-result" id="hc-hm-result">
            <div class="hc-result-label">Alınması Gereken Ticari Miktar:</div>
            <div class="hc-result-value" id="hc-hm-val">-</div>
            <div class="hc-result-note">Miktar = Net Miktar / (Saflık / 100)</div>
        </div>
    </div>
    <?php
}
