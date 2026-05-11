<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ek_odemeli_konut_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ek-odemeli-konut-kredisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ek-odemeli-konut-kredisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ek-odemeli-konut-kredisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ek-odemeli-konut-kredisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ek-odemeli-konut-kredisi">
        <h3>Ek Ödemeli Konut Kredisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eokk-amount">Kalan Anapara Borcu (₺)</label>
            <input type="number" id="hc-eokk-amount" placeholder="Örn: 1.500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eokk-rate">Aylık Faiz Oranı (%)</label>
            <input type="number" id="hc-eokk-rate" placeholder="Örn: 2.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-eokk-term">Kalan Vade (Ay)</label>
            <input type="number" id="hc-eokk-term" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-eokk-extra">Yapılacak Ek Ödeme (₺)</label>
            <input type="number" id="hc-eokk-extra" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcEkOdemeliKonutKredisiHesapla()">Tasarrufu Hesapla</button>
        <div class="hc-result" id="hc-eokk-result">
            <div class="hc-result-item">
                <span>Yeni Kalan Vade:</span>
                <strong id="hc-eokk-new-term">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vade Kısalması:</span>
                <strong id="hc-eokk-term-reduction">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Faiz Tasarrufu:</span>
                <strong class="hc-result-value" id="hc-eokk-savings">-</strong>
            </div>
        </div>
    </div>
    <?php
}
