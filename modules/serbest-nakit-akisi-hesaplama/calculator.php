<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_nakit_akisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-nakit-akisi-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-nakit-akisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-nakit-akisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-nakit-akisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-nakit-akisi">
        <h3>Serbest Nakit Akışı Hesaplama (FCF)</h3>
        <div class="hc-form-group">
            <label for="hc-fcf-operating">İşletme Faaliyetlerinden Nakit Akışı (₺)</label>
            <input type="number" id="hc-fcf-operating" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fcf-capex">Yatırım Harcamaları (CapEx - ₺)</label>
            <input type="number" id="hc-fcf-capex" placeholder="Örn: 300.000">
        </div>
        <button class="hc-btn" onclick="hcFcfHesapla()">FCF Hesapla</button>
        <div class="hc-result" id="hc-fcf-result">
            <div class="hc-result-item">
                <span>Serbest Nakit Akışı (FCF):</span>
                <strong class="hc-result-value" id="hc-fcf-value">-</strong>
            </div>
            <p class="hc-small-text">FCF, işletmenin hissedarlarına dağıtabileceği veya borç ödemede kullanabileceği nakit miktarıdır.</p>
        </div>
    </div>
    <?php
}
