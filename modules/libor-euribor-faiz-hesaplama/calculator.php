<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_libor_euribor_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-libor-euribor-faiz-hesaplama',
        HC_PLUGIN_URL . 'modules/libor-euribor-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-libor-euribor-faiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/libor-euribor-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-libor-euribor">
        <h3>Libor / Euribor Faiz Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-le-principal">Anapara Tutarı (Döviz)</label>
            <input type="number" id="hc-le-principal" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-le-rate">Referans Oran (Libor/Euribor %)</label>
            <input type="number" id="hc-le-rate" placeholder="Örn: 3.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-le-spread">Ek Faiz / Spread (+ %)</label>
            <input type="number" id="hc-le-spread" placeholder="Örn: 1.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-le-days">Gün Sayısı</label>
            <input type="number" id="hc-le-days" placeholder="Örn: 90">
        </div>
        <button class="hc-btn" onclick="hcLiborEuriborHesapla()">Faiz Hesapla</button>
        <div class="hc-result" id="hc-le-result">
            <div class="hc-result-item">
                <span>Uygulanan Toplam Oran:</span>
                <strong id="hc-le-res-total-rate">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hesaplanan Faiz Tutarı:</span>
                <strong class="hc-result-value" id="hc-le-res-interest">-</strong>
            </div>
            <p class="hc-small-text">Uluslararası standartlarda yıl 360 gün olarak alınmıştır.</p>
        </div>
    </div>
    <?php
}
