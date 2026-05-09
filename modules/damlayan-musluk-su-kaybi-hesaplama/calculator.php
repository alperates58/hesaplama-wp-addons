<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_damlayan_musluk_su_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-musluk-kayip',
        HC_PLUGIN_URL . 'modules/damlayan-musluk-su-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-musluk-kayip-css',
        HC_PLUGIN_URL . 'modules/damlayan-musluk-su-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-musluk-kayip">
        <h3>Damlayan Musluk Su Kaybı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-drip-rate">Dakikadaki Damla Sayısı</label>
            <input type="number" id="hc-drip-rate" placeholder="Örn: 30" min="1" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-faucet-count">Musluk Sayısı</label>
            <input type="number" id="hc-faucet-count" placeholder="Örn: 1" min="1" value="1">
        </div>
        <button class="hc-btn" onclick="hcMuslukKayipHesapla()">Kayıp Miktarını Hesapla</button>
        <div class="hc-result" id="hc-musluk-kayip-result">
            <div class="hc-result-item">
                <span>Günlük Su Kaybı:</span>
                <span class="hc-result-value" id="hc-res-drip-daily">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Su Kaybı:</span>
                <span id="hc-res-drip-monthly">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Su Kaybı:</span>
                <span id="hc-res-drip-yearly">0 m³</span>
            </div>
        </div>
    </div>
    <?php
}
