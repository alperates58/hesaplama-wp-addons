<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enflasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enflasyon',
        HC_PLUGIN_URL . 'modules/enflasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enflasyon-css',
        HC_PLUGIN_URL . 'modules/enflasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enf">
        <h3>Enflasyon Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-e-old">Eski Fiyat / Endeks (Başlangıç)</label>
            <input type="number" id="hc-e-old" placeholder="Örn: 100" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-e-new">Yeni Fiyat / Endeks (Bitiş)</label>
            <input type="number" id="hc-e-new" placeholder="Örn: 145" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcEnflasyonHesapla()">Enflasyonu Hesapla</button>
        <div class="hc-result" id="hc-e-result">
            <div class="hc-result-item">
                <span>Dönemlik Enflasyon:</span>
                <strong class="hc-result-value" id="hc-e-res-ratio">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Paranın Değer Kaybı:</span>
                <strong id="hc-e-res-loss">-</strong>
            </div>
        </div>
    </div>
    <?php
}
