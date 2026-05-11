<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_72_kurali_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-72-kurali',
        HC_PLUGIN_URL . 'modules/72-kurali-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-72-kurali-css',
        HC_PLUGIN_URL . 'modules/72-kurali-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-72k">
        <h3>72 Kuralı (Parayı İkiye Katlama)</h3>
        <div class="hc-form-group">
            <label for="hc-72-rate">Yıllık Beklenen Getiri / Faiz Oranı (%)</label>
            <input type="number" id="hc-72-rate" placeholder="Örn: 24">
        </div>
        <button class="hc-btn" onclick="hc72KuraliHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-72-result">
            <div class="hc-result-item">
                <span>İkiye Katlama Süresi:</span>
                <strong class="hc-result-value" id="hc-72-res-total">-</strong>
            </div>
            <p class="hc-small-text">Bu kural, bileşik faiz ile paranın ne kadar sürede 2 katına çıkacağını hızlıca tahmin etmek için kullanılır.</p>
        </div>
    </div>
    <?php
}
