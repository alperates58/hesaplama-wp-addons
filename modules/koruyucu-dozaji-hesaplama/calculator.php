<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koruyucu_dozaji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-koruyucu-dozaji-hesaplama',
        HC_PLUGIN_URL . 'modules/koruyucu-dozaji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-koruyucu-dozaji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/koruyucu-dozaji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-preservative">
        <h3>Koruyucu Dozajı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-total">Toplam Ürün Miktarı (kg / L)</label>
            <input type="number" id="hc-pd-total" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-percent">Önerilen / Yasal Yüzde (%)</label>
            <input type="number" id="hc-pd-percent" placeholder="Örn: 0.1" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcKoruyucuDozajıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pd-result">
            <div class="hc-result-label">Gereken Koruyucu Miktarı:</div>
            <div class="hc-result-value" id="hc-pd-val">-</div>
        </div>
    </div>
    <?php
}
