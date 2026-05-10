<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_mesafe_sure_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-run-dist-time',
        HC_PLUGIN_URL . 'modules/kosu-mesafe-sure-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-dist-time-css',
        HC_PLUGIN_URL . 'modules/kosu-mesafe-sure-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-run-dist-time">
        <h3>Mesafe & Süre Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-rdt-dist">Mesafe (km):</label>
            <input type="number" id="hc-rdt-dist" step="0.1" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label>Koşu Temposu (dk:sn / km):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-rdt-min" placeholder="5" style="flex:1;">
                <input type="number" id="hc-rdt-sec" placeholder="30" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRunDistTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-run-dist-time-result">
            <strong>Tahmini Toplam Süre:</strong>
            <div id="hc-rdt-res-val" class="hc-result-value">-</div>
            <span>Saat : Dakika : Saniye</span>
        </div>
    </div>
    <?php
}
