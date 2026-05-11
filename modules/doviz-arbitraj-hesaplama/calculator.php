<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doviz_arbitraj_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-doviz-arbitraj-hesaplama',
        HC_PLUGIN_URL . 'modules/doviz-arbitraj-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-doviz-arbitraj-hesaplama-css',
        HC_PLUGIN_URL . 'modules/doviz-arbitraj-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-doviz-arbitraj">
        <h3>Döviz Arbitraj (Çapraz Kur) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-da-usd-try">USD / TRY Kuru</label>
            <input type="number" id="hc-da-usd-try" placeholder="Örn: 32.50" step="0.0001">
        </div>
        <div class="hc-form-group">
            <label for="hc-da-eur-try">EUR / TRY Kuru</label>
            <input type="number" id="hc-da-eur-try" placeholder="Örn: 35.10" step="0.0001">
        </div>
        <button class="hc-btn" onclick="hcDovizArbitrajHesapla()">Arbitraj / Çapraz Kur Hesapla</button>
        <div class="hc-result" id="hc-da-result">
            <div class="hc-result-item">
                <span>EUR / USD Çapraz Kuru (Hesaplanan):</span>
                <strong class="hc-result-value" id="hc-da-cross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>100 USD Karşılığı EUR:</span>
                <strong id="hc-da-conv-usd-eur">-</strong>
            </div>
            <div class="hc-result-item">
                <span>100 EUR Karşılığı USD:</span>
                <strong id="hc-da-conv-eur-usd">-</strong>
            </div>
        </div>
    </div>
    <?php
}
