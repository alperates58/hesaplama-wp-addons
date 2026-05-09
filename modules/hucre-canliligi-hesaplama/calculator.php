<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hucre_canliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hucre-canliligi-hesaplama',
        HC_PLUGIN_URL . 'modules/hucre-canliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hucre-canliligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hucre-canliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hucre-canliligi-hesaplama">
        <h3>Hücre Canlılığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-viab-live">Canlı Hücre Sayısı</label>
            <input type="number" id="hc-viab-live" placeholder="Örn: 180" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-viab-dead">Ölü Hücre Sayısı</label>
            <input type="number" id="hc-viab-dead" placeholder="Örn: 20" min="0">
        </div>
        <button class="hc-btn" onclick="hcCanlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-viab-result">
            <div class="hc-result-label">Canlılık Oranı:</div>
            <div class="hc-result-value" id="hc-viab-val">-</div>
            <div class="hc-result-note" id="hc-viab-note"></div>
        </div>
    </div>
    <?php
}
