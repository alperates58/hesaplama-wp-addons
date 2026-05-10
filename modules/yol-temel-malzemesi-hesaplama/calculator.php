<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yol_temel_malzemesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-road-base',
        HC_PLUGIN_URL . 'modules/yol-temel-malzemesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-road-base-css',
        HC_PLUGIN_URL . 'modules/yol-temel-malzemesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-road-base">
        <h3>Yol Temel (Doku) Malzemesi Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-rb-length">Yol Uzunluğu (m):</label>
            <input type="number" id="hc-rb-length" step="0.1" placeholder="100.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rb-width">Yol Genişliği (m):</label>
            <input type="number" id="hc-rb-width" step="0.1" placeholder="4.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rb-thick">Temel Kalınlığı (cm):</label>
            <input type="number" id="hc-rb-thick" step="1" value="20">
        </div>
        <button class="hc-btn" onclick="hcRoadBaseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-road-base-result">
            <strong>Gereken Toplam Malzeme:</strong>
            <div id="hc-rb-res-val" class="hc-result-value">-</div>
            <span>Ton</span>
            <p style="margin-top:10px; font-size:0.8rem;">Yoğunluk 2.1 ton/m³ (sıkıştırılmış) baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
