<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surekli_bilesik_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surekli-bilesik-faiz-hesaplama',
        HC_PLUGIN_URL . 'modules/surekli-bilesik-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surekli-bilesik-faiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surekli-bilesik-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surekli-bilesik-faiz">
        <h3>Sürekli Bileşik Faiz Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sbf-capital">Anapara (₺)</label>
            <input type="number" id="hc-sbf-capital" placeholder="Örn: 100.00" step="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbf-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-sbf-rate" placeholder="Örn: 40" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbf-time">Süre (Yıl)</label>
            <input type="number" id="hc-sbf-time" placeholder="Örn: 1" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcSurekliBilesikFaizHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sbf-result">
            <div class="hc-result-item">
                <span>Gelecek Değer:</span>
                <strong class="hc-result-value" id="hc-sbf-fv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Faiz Getirisi:</span>
                <strong id="hc-sbf-interest">-</strong>
            </div>
        </div>
    </div>
    <?php
}
