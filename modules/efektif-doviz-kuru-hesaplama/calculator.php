<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_efektif_doviz_kuru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efektif-doviz-kuru-hesaplama',
        HC_PLUGIN_URL . 'modules/efektif-doviz-kuru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-efektif-doviz-kuru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/efektif-doviz-kuru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-efektif-doviz-kuru">
        <h3>Efektif Döviz Kuru (Döviz Sepeti)</h3>
        <div class="hc-form-group">
            <label for="hc-edk-usd">USD / TRY Kuru</label>
            <input type="number" id="hc-edk-usd" placeholder="Örn: 32.50" step="0.0001">
        </div>
        <div class="hc-form-group">
            <label for="hc-edk-eur">EUR / TRY Kuru</label>
            <input type="number" id="hc-edk-eur" placeholder="Örn: 35.10" step="0.0001">
        </div>
        <button class="hc-btn" onclick="hcEfektifKurHesapla()">Döviz Sepetini Hesapla</button>
        <div class="hc-result" id="hc-edk-result">
            <div class="hc-result-item">
                <span>Döviz Sepeti Değeri (0.5$ + 0.5€):</span>
                <strong class="hc-result-value" id="hc-edk-value">-</strong>
            </div>
            <p class="hc-small-text">Döviz sepeti, TL'nin dış ticaret ağırlıklı değerini takip etmek için standart bir göstergedir.</p>
        </div>
    </div>
    <?php
}
