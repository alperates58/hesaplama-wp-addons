<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_verme_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wl-percent',
        HC_PLUGIN_URL . 'modules/kilo-verme-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wl-percent-css',
        HC_PLUGIN_URL . 'modules/kilo-verme-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wl-percent">
        <h3>Kilo Verme Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-wlp-start">Başlangıç Kilosu (kg):</label>
            <input type="number" id="hc-wlp-start" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-wlp-current">Mevcut Kilo (kg):</label>
            <input type="number" id="hc-wlp-current" placeholder="90">
        </div>
        <button class="hc-btn" onclick="hcWlpHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-wl-percent-result">
            <strong>Kayıp Oranı: %<span id="hc-wlp-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-wlp-res-diff" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
