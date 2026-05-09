<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tek_kullanim_elektrik_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-single-use',
        HC_PLUGIN_URL . 'modules/tek-kullanim-elektrik-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-single-use-css',
        HC_PLUGIN_URL . 'modules/tek-kullanim-elektrik-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-single-use">
        <h3>Tek Kullanım Elektrik Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-su-power">Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-su-power" placeholder="Örn: 2000" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-su-time">Kullanım Süresi (Dakika)</label>
            <input type="number" id="hc-su-time" placeholder="Örn: 30" min="1">
        </div>
        <button class="hc-btn" onclick="hcSingleUseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-single-use-result">
            <div class="hc-result-item">
                <span>Tek Kullanım Maliyeti:</span>
                <span class="hc-result-value" id="hc-res-su-total">0 TL</span>
            </div>
            <p class="hc-su-note">2026 Projeksiyon Fiyatı: 3.50 ₺/kWh</p>
        </div>
    </div>
    <?php
}
