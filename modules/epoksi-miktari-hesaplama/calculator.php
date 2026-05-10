<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_epoksi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-epoxy-calc',
        HC_PLUGIN_URL . 'modules/epoksi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-epoxy-calc-css',
        HC_PLUGIN_URL . 'modules/epoksi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-epoxy-calc">
        <h3>Epoksi Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ec-area">Uygulama Alanı (m²):</label>
            <input type="number" id="hc-ec-area" step="0.1" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ec-thick">Hedef Kalınlık (mm):</label>
            <input type="number" id="hc-ec-thick" step="0.1" placeholder="2.0">
            <small>Örn: 2 mm kalınlık için ~2.2 kg/m² gider.</small>
        </div>
        <button class="hc-btn" onclick="hcEpoxyCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-epoxy-calc-result">
            <strong>Gereken Toplam Epoksi:</strong>
            <div id="hc-ec-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
            <p style="margin-top:10px; font-size:0.8rem; opacity:0.8;">Yoğunluk 1.1 kg/L baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
