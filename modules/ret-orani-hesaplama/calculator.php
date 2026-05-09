<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ret_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reject-rate',
        HC_PLUGIN_URL . 'modules/ret-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reject-rate-css',
        HC_PLUGIN_URL . 'modules/ret-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reject-rate">
        <h3>Ret Oranı (%) Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-rr-total">Toplam Üretim / Çıktı</label>
            <input type="number" id="hc-rr-total" value="1000" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rr-reject">Hatalı / Ret Edilen Adet</label>
            <input type="number" id="hc-rr-reject" value="25" min="0">
        </div>
        <button class="hc-btn" onclick="hcRejectRateHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-reject-rate-result">
            <div class="hc-result-item">
                <span>Ret Oranı:</span>
                <span class="hc-result-value" id="hc-res-rr-val">%0</span>
            </div>
            <div class="hc-result-item">
                <span>Başarı Oranı:</span>
                <span id="hc-res-rr-success">%0</span>
            </div>
        </div>
    </div>
    <?php
}
